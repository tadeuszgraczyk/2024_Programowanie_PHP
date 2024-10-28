<?php
/* --- Programowanie obiektowe --- */

/*
  Od PHP5 można pisać kod w stylu proceduralnym lub obiektowym. Programowanie obiektowe składa się z klas, które mogą przechowywać "właściwości" oraz "metody". Obiekty mogą być tworzone na podstawie klas.
*/

class User {
    // Właściwości to zmienne, które należą do klasy.
    // Modyfikatory dostępu: public, private, protected
    // public - dostępne z dowolnego miejsca
    // private - dostępne tylko wewnątrz klasy
    // protected - dostępne tylko wewnątrz klasy i w klasach dziedziczących
    private $name;
    public $email;
    public $password;

    // Konstruktor jest wywoływany, gdy tworzony jest obiekt na podstawie klasy.
    // Przekazujemy właściwości do konstruktora z zewnątrz.
    public function __construct($name, $email, $password) {
        // Przypisujemy właściwości przekazane z zewnątrz do właściwości utworzonych wewnątrz klasy.
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    // Metody to funkcje należące do klasy.
    // function setName() {
    //   $this->name = $name;
    // }

    function getName() {
        return $this->name;
    }

    function login() {
        return "Użytkownik $this->name jest zalogowany.<br>";
    }

    // Destruktor jest wywoływany, gdy obiekt jest niszczony lub na końcu skryptu.
    function __destruct() {
        echo "Nazwa użytkownika to {$this->name}.<br>";
    }
}

// Tworzenie nowego użytkownika
$user1 = new User('Brad', 'brad@gmail.com', '123456');
echo $user1->getName();
echo '<hr>';
echo $user1->login();
echo '<hr>';
// Dodanie wartości do właściwości
// $user1->name = 'Brad';
echo '<pre>';
var_dump($user1);
echo '</pre>';
// echo $user1->name;

/* ----------- Dziedziczenie ---------- */

/*
  Dziedziczenie to możliwość tworzenia nowej klasy na podstawie istniejącej klasy.
  Osiąga się to przez tworzenie nowej klasy, która rozszerza istniejącą klasę.
*/

class employee extends User {
    public function __construct($name, $email, $password, $title) {
        parent::__construct($name, $email, $password);
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }
}
echo '<hr>';
$employee1 = new employee('John','johndoe@gmail.com','123456','Manager');
echo $employee1->getTitle();
