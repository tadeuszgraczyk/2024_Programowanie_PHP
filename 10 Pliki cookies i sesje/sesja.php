<?php
/* ------------ Sesje ------------ */

/*
  Sesje to sposób przechowywania informacji (w zmiennych), które mogą być używane na wielu stronach.
  W przeciwieństwie do ciasteczek, sesje są przechowywane po stronie serwera.
*/

session_start(); // Musi być wywołane przed dostępem do danych sesji

if (isset($_POST['submit'])) {
    $username = filter_input(
        INPUT_POST,
        'username',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $password = filter_input(
        INPUT_POST,
        'password',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );

    if ($username == 'brad' && $password == 'password') {
        // Ustawienie zmiennej sesji
        $_SESSION['username'] = $username;
        // Przekierowanie użytkownika na inną stronę
        header('Location: /php-crash/extras/dashboard.php');
    } else {
        echo 'Niepoprawna nazwa użytkownika lub hasło';
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div>
        <label>Nazwa użytkownika: </label>
        <input type="text" name="username">
    </div>
    <br>
    <div>
        <label>Hasło: </label>
        <input type="password" name="password">
    </div>
    <br>
    <input type="submit" name="submit" value="Zatwierdź">
</form>
