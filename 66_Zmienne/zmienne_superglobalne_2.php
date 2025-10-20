<?php
/* --- Superglobalne zmienne $_GET & $_POST -- */

/*
  Możemy przekazywać dane przez URL i formularze, używając superglobalnych zmiennych $_GET i $_POST.
*/

if (isset($_POST['submit'])) {
    echo '<h3>' . $_GET['username'] . '</h3>';
//    echo '<h3>' . $_POST['username'] . '</h3>';
} ?>

<!-- Przekazywanie danych przez link -->
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?username=Brad">Link</a>

<br><br>

<!-- Przekazywanie danych przez formularz -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div>
        <label>Imię: </label>
        <input type="text" name="name">
    </div>
    <br>
    <div>
        <label>Hasło: </label>
        <input type="password" name="password">
    </div>
    <br>
    <input type="submit" name="submit" value="Wyślij">
</form>
