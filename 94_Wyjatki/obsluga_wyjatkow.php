<?php

/* ----------- Wyjątki ----------- */

/*
  PHP posiada model obsługi wyjątków podobny do tego w innych językach programowania. Można rzucić wyjątek, który następnie zostanie przechwycony ("caught") w PHP. Kod może być otoczony blokiem try, aby umożliwić przechwycenie potencjalnych wyjątków. Każdy blok try musi mieć przynajmniej jeden odpowiadający mu blok catch lub finally.
*/

function inverse($x) {
    if (!$x) {
        throw new Exception('Dzielenie przez zero.');
    }
    return 1/$x;
}

// echo inverse(0); // Powoduje rzucenie wyjątku i zatrzymuje wykonanie skryptu

// Obsługuje wyjątek
// try {
//   echo inverse(5) . ' ';
//   echo inverse(0) . ' ';
// } catch (Exception $e) {
//   echo 'Przechwycono wyjątek: ',  $e->getMessage(), ' ';
// }

// Blok finally jest wykonywany niezależnie od tego, czy wyjątek zostanie rzucony, czy nie

try {
    echo inverse(5) . ' ';
} catch (Exception $e) {
    echo 'Przechwycono wyjątek: ',  $e->getMessage(), ' ';
} finally {
    echo 'Pierwszy finally ';
}

try {
    echo inverse(0) . ' ';
} catch (Exception $e) {
    echo 'Przechwycono wyjątek: ',  $e->getMessage(), ' ';
} finally {
    echo "Drugi finally ";
}

echo 'Hello World';
