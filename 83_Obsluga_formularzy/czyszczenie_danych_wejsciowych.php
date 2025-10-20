<?php
/* --- Czyszczenie danych wejściowych --- */

/*
  Dane przesyłane przez formularz nie są domyślnie czyszczone. Możemy ręcznie wyczyścić dane za pomocą odpowiednich metod.
*/

if (isset($_POST['submit'])) {
    $name = $_POST['email'];
    $email = $_POST['email'];

    // htmlspecialchars() - Konwertuje specjalne znaki na encje HTML
    // $name = htmlspecialchars($_POST['name']);
    // $email = htmlspecialchars($_POST['email']);

    // filter_var() - Czyści dane
    // $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // filter_input() - Czyści dane wejściowe
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    // FILTER_SANITIZE_STRING - Przekształca ciąg na taki, który zawiera tylko alfanumeryczne znaki, spacje i znaki _.:/
    // FILTER_SANITIZE_EMAIL - Przekształca ciąg na poprawny adres e-mail
    // FILTER_SANITIZE_URL - Przekształca ciąg na poprawny URL
    // FILTER_SANITIZE_NUMBER_INT - Przekształca ciąg na liczbę całkowitą
    // FILTER_SANITIZE_NUMBER_FLOAT - Przekształca ciąg na liczbę zmiennoprzecinkową
    // FILTER_SANITIZE_FULL_SPECIAL_CHARS - Koduje specjalne znaki na encje HTML, zachowuje spacje i większość innych znaków
} ?>

<!-- Przekazywanie danych przez formularz -->
<!-- php_self może być używane do ochrony przed XSS -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div>
        <label>Imię:
        <input type="text" name="name">
        </label>
    </div>
    <br>
    <?php echo $email; ?>
    <div>
        <label>Email:
        <input type="email" name="email">
        </label>
    </div>
    <br>
    <input type="submit" name="submit" value="Wyślij">
</form>
