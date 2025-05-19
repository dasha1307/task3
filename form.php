<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Подключение к базе данных
$host = 'localhost';
$dbname = 'u68800';
$user = 'u68800';
$pass = '3971335';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

// Валидация данных
$errors = [];
$data = $_POST;

// Проверка ФИО
if (empty($data['fullname'])) {
    $errors['fullname'] = 'Поле обязательно для заполнения';
} elseif (!preg_match('/^[a-zA-Zа-яА-Я\s]{1,150}$/u', $data['fullname'])) {
    $errors['fullname'] = 'Только буквы и пробелы (макс. 150 символов)';
}

// Проверка телефона
if (empty($data['phone'])) {
    $errors['phone'] = 'Поле обязательно для заполнения';
} elseif (!preg_match('/^[+\d\s\-]{6,20}$/', $data['phone'])) {
    $errors['phone'] = 'Некорректный формат';
}

// Проверка email
if (empty($data['email'])) {
    $errors['email'] = 'Поле обязательно для заполнения';
} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Некорректный email';
}

// Проверка даты
if (empty($data['birthdate'])) {
    $errors['birthdate'] = 'Поле обязательно для заполнения';
} elseif (!strtotime($data['birthdate'])) {
    $errors['birthdate'] = 'Некорректная дата';
}

// Проверка пола
if (empty($data['gender'])) {
    $errors['gender'] = 'Выберите пол';
} elseif (!in_array($data['gender'], ['male', 'female'])) {
    $errors['gender'] = 'Недопустимое значение';
}

// Проверка языков
if (empty($data['languages'])) {
    $errors['languages'] = 'Выберите хотя бы один язык';
} else {
    $allowedLanguages = ['Pascal', 'C', 'C++', 'JavaScript', 'PHP', 'Python', 'Java', 'Haskel', 'Clojure', 'Prolog', 'Scala', 'Go'];
    foreach ($data['languages'] as $lang) {
        if (!in_array($lang, $allowedLanguages)) {
            $errors['languages'] = 'Недопустимый язык';
            break;
        }
    }
}

// Проверка биографии
if (empty(trim($data['bio']))) {
    $errors['bio'] = 'Поле обязательно для заполнения';
}

// Проверка чекбокса
if (!isset($data['agreement'])) {
    $errors['agreement'] = 'Необходимо согласие';
}

// Если есть ошибки
if (!empty($errors)) {
    // Сохраняем данные и ошибки в Cookies на 5 минут
    setcookie('form_errors', json_encode($errors), time() + 300, '/');
    setcookie('form_data', json_encode($data), time() + 300, '/');
    header('Location: index.php');
    exit();
}

// Если ошибок нет - сохраняем в БД
try {
    $pdo->beginTransaction();

    // Вставка в таблицу application
    $stmt = $pdo->prepare("
        INSERT INTO application 
        (fullname, phone, email, birthdate, gender, bio, agreement)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([
        $data['fullname'],
        $data['phone'],
        $data['email'],
        $data['birthdate'],
        $data['gender'],
        trim($data['bio']),
        isset($data['agreement']) ? 1 : 0
    ]);

    // Получаем ID созданной записи
    $applicationId = $pdo->lastInsertId();

    // Вставка в связующую таблицу
    $stmtLang = $pdo->prepare("
        INSERT INTO application_languages 
        (application_id, language_id)
        VALUES (?, (SELECT id FROM languages WHERE name = ?))
    ");
    foreach ($data['languages'] as $lang) {
        $stmtLang->execute([$applicationId, $lang]);
    }

    $pdo->commit();

    // Очищаем Cookies
    setcookie('form_errors', '', time() - 3600, '/');
    setcookie('form_data', '', time() - 3600, '/');

    // Выводим сообщение об успехе
    echo "<h2>Данные успешно сохранены!</h2>";

} catch (PDOException $e) {
    $pdo->rollBack();
    die("Ошибка сохранения: " . $e->getMessage());
}