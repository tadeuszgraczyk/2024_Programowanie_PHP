<?php
/* ----------- Przesyłanie Plików ----------
                 do sprawdzenia
*/

$allowed_ext = array('png', 'jpg', 'jpeg', 'gif');

if(isset($_POST['submit'])) {
    // Sprawdź, czy plik został przesłany
    if(!empty($_FILES['upload']['name'])) {
        $file_name = $_FILES['upload']['name'];
        $file_size = $_FILES['upload']['size'];
        $file_tmp = $_FILES['upload']['tmp_name'];
        $target_dir = "upload/${file_name}";
        // Pobierz rozszerzenie pliku
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));
        // echo $file_ext;

        // Walidacja typu pliku/rozszerzenia
        if(in_array($file_ext, $allowed_ext)) {
            // Walidacja rozmiaru pliku
            if($file_size <= 1000000) { // 1000000 bajtów = 1MB
                // Prześlij plik
                move_uploaded_file($file_tmp, $target_dir);

                // Komunikat o sukcesie
                echo '<p style="color: green;">Plik przesłany!</p>';
            } else {
                echo '<p style="color: red;">Plik jest za duży!</p>';
            }
        } else {
            $message = '<p style="color: red;">Nieprawidłowy typ pliku!</p>';
        }
    } else {
        $message = '<p style="color: red;">Proszę wybrać plik</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przesyłanie Plików</title>
</head>
<body>
<?php echo $message ?? null; ?>
<form action="<?php echo htmlspecialchars(
    $_SERVER['PHP_SELF']
); ?>" method="post" enctype="multipart/form-data">
    Wybierz obraz do przesłania:
    <input type="file" name="upload">
    <input type="submit" value="Wyślij" name="submit">
</form>
</body>
</html>
