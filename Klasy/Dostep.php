<?php

namespace Klasy;

use PDO;
use Config\Ustawienia;
use Config\Database;
use Klasy\Sesja;

/**
 *
 */
class Dostep
{
    public function logowanieFormularz()
    {
        require './widoki/logowanie.php';
        // echo '
        //   <form action="'.Ustawienia::get('appURL').'logowanie/" method="POST">
        //       <input type="text" name="login" placeholder="Login">
        //       <input type="password" name="haslo" placeholder="Hasło">
        //       <input type="submit">
        //   </form>
        // ';
    }

    public function rejestracjaFormularz()
    {
        require './widoki/rejestracja.php';
        // echo '
        //   <form action="'.Ustawienia::get('appURL').'rejestracja/" method="POST">
        //       <input type="text" name="login" placeholder="Login">
        //       <input type="password" name="haslo" placeholder="Hasło">
        //       <input type="password" name="haslo-powtorz" placeholder="Powtórz hasło">
        //       <input type="text" name="imie" placeholder="Imię">
        //       <input type="text" name="nazwisko" placeholder="Nazwisko">
        //       <input type="submit">
        //   </form>
        // ';
    }

    public function rejestracja()
    {

        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $hasloPowtorz = $_POST['haslo-powtorz'];
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $email = $_POST['email'];

        // TODO: Sprawdzić czy dane są poprawne

        $bazaDanych = new Database();
        $bazaDanych->connect();
        // NIE DODAJE NOWEGO STUDENTA DO BAZY DANYCH
        $zapytanie = 'INSERT INTO `uzytkownik` (`login`, `haslo`, `imie`, `nazwisko`,`email`)
         VALUES (:login, :haslo, :imie, :nazwisko, :email)';
        $obiektZapytania = $bazaDanych->pdo->prepare($zapytanie);
        $obiektZapytania->bindValue(':login', $login, \PDO::PARAM_STR);
        $obiektZapytania->bindValue(':haslo', md5($login . md5($haslo)), \PDO::PARAM_STR);
        $obiektZapytania->bindValue(':imie', $imie, \PDO::PARAM_STR);
        $obiektZapytania->bindValue(':nazwisko', $nazwisko, \PDO::PARAM_STR);
        $obiektZapytania->bindValue(':email', $email, \PDO::PARAM_STR);
        //d($obiektZapytania);
        $obiektZapytania->execute();

        \header('Location: ' . Ustawienia::get('appURL'));
    }

    public function logowanie()
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        // dump($_POST);
       // var_dump($_POST);
        // d($_POST);

        $bazaDanych = new Database();
        $bazaDanych->connect();

        $zapytanie = 'SELECT * FROM `uzytkownik` WHERE `login` = :login AND `haslo` = :haslo';
        $obiektZapytania = $bazaDanych->pdo->prepare($zapytanie);
        $obiektZapytania->bindValue(':login', $login, \PDO::PARAM_STR);
        $obiektZapytania->bindValue(':haslo', $haslo, \PDO::PARAM_STR);
        //  $obiektZapytania->bindValue(':haslo', md5($login.md5($haslo)), \PDO::PARAM_STR);




        if (!$obiektZapytania->execute()) {
            // TODO: Wypisać komunikat użytkownikowi że nie udało się zalogować
            header('Location: ' . Ustawienia::get('appURL') . 'formularz-logowania/');
            exit();
        }

        $daneZBazy = $obiektZapytania->fetchAll(\PDO::FETCH_ASSOC);
        // Jeśli liczba odszukany w bazie uzytkowników jest różna od 1
        // (np. 0 gdy nikogo nie dopasowaliśmy po loginie i haśle)
        // to błąd - złe dane do logowania
        if (count($daneZBazy) !== 1) {
            //// TODO: Wypisać komunikat użytkownikowi że nie udało się zalogować (złe dane)
            header('Location: ' . Ustawienia::get('appURL') . 'formularz-logowania/');
            exit();
        }

        Sesja::set('id', $daneZBazy[0]['id']);
        Sesja::set('imie', $daneZBazy[0]['imie']);
        Sesja::set('nazwisko', $daneZBazy[0]['nazwisko']);
        Sesja::set('admin', $daneZBazy[0]['admin']);

        $zapytanie = 'UPDATE `uzytkownik` SET `ostatnie_logowanie` = \'' . date('Y-m-d H:i:s') . '\' WHERE id = ' . $daneZBazy[0]['id'];
        $bazaDanych->query($zapytanie);

        \header('Location: ' . Ustawienia::get('appURL'));
    }

    public function wylogowanie()
    {
        // W klasie Sesja w funkcji unset($name)
        // argument o nazwie $name ma mieć wartość 'id'
        Sesja::unset('id');
        // argument o nazwie $name ma mieć wartość 'imie'
        Sesja::unset('imie');
        // argument o nazwie $name ma mieć wartość 'nazwisko'
        Sesja::unset('nazwisko');
        // argument o nazwie $name ma mieć wartość 'admin'
        Sesja::unset('admin');

        header('Location: ' . Ustawienia::get('appURL'));
        exit();

        dump($_SESSION);
        var_dump($_SESSION);
        d($_SESSION);
    }
}
