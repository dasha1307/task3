<?php
// Включаем отображение ошибок для разработки
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Читаем данные из Cookies
$errors = isset($_COOKIE['form_errors']) ? json_decode($_COOKIE['form_errors'], true) : [];
$data = isset($_COOKIE['form_data']) ? json_decode($_COOKIE['form_data'], true) : [];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Анкета</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h1>Анкета</h1>
        <form action="form.php" method="POST">
            
            <!-- Поле ФИО -->
            <div class="form-group">
                <label>ФИО:</label>
                <input 
                    type="text" 
                    name="fullname" 
                    value="<?= isset($data['fullname']) ? htmlspecialchars($data['fullname']) : '' ?>" 
                    required
                >
                <?php if (!empty($errors['fullname'])): ?>
                    <div class="error"><?= $errors['fullname'] ?></div>
                <?php endif; ?>
            </div>

            <!-- Поле Телефон -->
            <div class="form-group">
                <label>Телефон:</label>
                <input 
                    type="tel" 
                    name="phone" 
                    value="<?= isset($data['phone']) ? htmlspecialchars($data['phone']) : '' ?>" 
                    pattern="[+0-9\s\-]+" 
                    required
                >
                <?php if (!empty($errors['phone'])): ?>
                    <div class="error"><?= $errors['phone'] ?></div>
                <?php endif; ?>
            </div>

            <!-- Поле Email -->
            <div class="form-group">
                <label>Email:</label>
                <input 
                    type="email" 
                    name="email" 
                    value="<?= isset($data['email']) ? htmlspecialchars($data['email']) : '' ?>" 
                    required
                >
                <?php if (!empty($errors['email'])): ?>
                    <div class="error"><?= $errors['email'] ?></div>
                <?php endif; ?>
            </div>

            <!-- Поле Дата рождения -->
            <div class="form-group">
                <label>Дата рождения:</label>
                <input 
                    type="date" 
                    name="birthdate" 
                    value="<?= isset($data['birthdate']) ? htmlspecialchars($data['birthdate']) : '' ?>" 
                    required
                >
                <?php if (!empty($errors['birthdate'])): ?>
                    <div class="error"><?= $errors['birthdate'] ?></div>
                <?php endif; ?>
            </div>

            <!-- Поле Пол -->
            <div class="form-group">
                <label>Пол:</label>
                <div class="radio-group">
                    <label>
                        <input 
                            type="radio" 
                            name="gender" 
                            value="male" 
                            <?= isset($data['gender']) && $data['gender'] === 'male' ? 'checked' : '' ?> 
                            required
                        > Мужской
                    </label>
                    <label>
                        <input 
                            type="radio" 
                            name="gender" 
                            value="female" 
                            <?= isset($data['gender']) && $data['gender'] === 'female' ? 'checked' : '' ?>
                        > Женский
                    </label>
                </div>
                <?php if (!empty($errors['gender'])): ?>
                    <div class="error"><?= $errors['gender'] ?></div>
                <?php endif; ?>
            </div>

            <!-- Поле Языки программирования -->
            <div class="form-group">
                <label>Любимые языки:</label>
                <select name="languages[]" multiple required>
                    <?php
                    $languages = ['Pascal', 'C', 'C++', 'JavaScript', 'PHP', 'Python', 'Java', 'Haskel', 'Clojure', 'Prolog', 'Scala', 'Go'];
                    foreach ($languages as $lang) {
                        $selected = isset($data['languages']) && in_array($lang, $data['languages']) ? 'selected' : '';
                        echo "<option value=\"$lang\" $selected>$lang</option>";
                    }
                    ?>
                </select>
                <?php if (!empty($errors['languages'])): ?>
                    <div class="error"><?= $errors['languages'] ?></div>
                <?php endif; ?>
            </div>

            <!-- Поле Биография -->
            <div class="form-group">
                <label>Биография:</label>
                <textarea name="bio" required><?= isset($data['bio']) ? htmlspecialchars($data['bio']) : '' ?></textarea>
                <?php if (!empty($errors['bio'])): ?>
                    <div class="error"><?= $errors['bio'] ?></div>
                <?php endif; ?>
            </div>

            <!-- Чекбокс согласия -->
            <div class="form-group">
                <label class="checkbox-group">
                    <input 
                        type="checkbox" 
                        name="agreement" 
                        <?= isset($data['agreement']) ? 'checked' : '' ?> 
                        required
                    > Согласен с условиями
                </label>
                <?php if (!empty($errors['agreement'])): ?>
                    <div class="error"><?= $errors['agreement'] ?></div>
                <?php endif; ?>
            </div>

            <button type="submit">Сохранить</button>
        </form>
    </div>
</body>
</html>
