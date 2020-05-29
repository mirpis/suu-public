<?php

namespace Klasy;

use Config\Database;
use Config\Ustawienia;
/**
 *
 */
class PracaDomowa
{
    /**
     * Lista prac domowych.
     */
    public function praceDomoweZadane()
    {
        $bazaDanych = new Database();
        $bazaDanych->connect();

        $zapytanie = 'SELECT * FROM `praca_domowa`';
        $praceDomowe = $bazaDanych->query($zapytanie);

        $prace = '';

        foreach ($praceDomowe as $pracaDomowa) {
          $prace .= '
            <tr>
              <td>'.$pracaDomowa['data_zadania'].'</td>
              <td>'.$pracaDomowa['tytul'].'</td>
            </tr>';
        }

        echo '<a href="'.Ustawienia::get('appURL').'/">Strona główna</a>';

        echo '
          <table border=1>
            <thead>
              <tr>
                <td>Data zadania</td>
                <td>Tytuł</td>
              </tr>
            </thead>

            <tbody>
              '.$prace.'
            </tbody>
          </table>
        ';
    }

    /**
     * Lista prac domowych obecnie zalogowanego użytkownika.
     *
     */
    public function listaMoichPrac()
    {
        // TODO: Pobrać z bazy wszystkie prace przypisane
        // do obecnie zalogowanego użytkownika (poprzez jego id z sesji)
        // Wykorzystać klasę Database, Sesja

        // TODO: Wypisać na ekran prace - funkcja echo

        $idUzytkownika = Sesja::get('id');
        // $idPracyDomowej = $_POST['id-pracy-domowej'];
        // $dataZadania = $_POST['data_zadania'];
        // $tresc = $_POST['temat'];

        $bazaDanych = new Database();
        $bazaDanych->connect();

        $zapytanie = 'SELECT * FROM `praca_domowa` WHERE id = uzytkownik_id';

        \header('Location: '.Ustawienia::get('appURL'));
    }

    /**
     * Formularz dodawania rozwiązania.
     */
    public function dodajRozwiazanieFormularz()
    {
        $idPracyDomowej = $_GET['id'];

        // TODO: Wyświetlenie formularza dodawania rozwiązania
        // Identyfikator pracy domowej musi się pojawić w formularzu:
        // NIEWIDOCZNE DLA UŻYTKOWNIKA:id-pracy-domowej do której będzie napisana:moja_praca
        // <input type="hidden" name="id-pracy-domowej" value="'.$idPracyDomowej.'">
        // Wykorzystać funkcję echo do wypisania formularza
        //
        echo '
          <form action="'.Ustawienia::get('appURL').'dodaj-rozwiazanie/" method="POST">
              <input type="hidden" name="id-pracy-domowej" value="'.$idPracyDomowej.'">
              <input type="text" name="praca_domowa_nr" placeholder="Praca_domowa_nr">
              <input type="text" name="uzytkownik_id" placeholder="Uzytkownik_id">
              <input type="text" name="temat" placeholder="Temat">
              <input type="text" name="tresc" placeholder="Treść">
              <input type="submit">
          </form>
        ';
    }

    /**
     * Dodanie rozwiązania pracy domowej.
     */
    public function dodajRozwiazanie()
    {
        $idUzytkownika = Sesja::get('id');
        $uzytkownik_id = $_POST['uzytkownik_id'];

        $idPracyDomowej = $_POST['id-pracy-domowej'];
        $praca_domowa_nr = $_POST['praca_domowa_nr'];

        $temat = $_POST['temat'];
        $tresc = $_POST['tresc'];

        $dataPrzeslania = date('Y-m-d H:i:s');

        // TODO: Utworzyć w tabeli rozwiazanie nowego rozwiązania na podstawie danych zebranych powyżej
        // Będzie to działało na podobnej zasadzie jak rejestracja, tylko na innej tabeli
        // Klasa Database do wstawienia danych do bazy - jak to zrobić można podpatrzeć w rejestracji

        // TODO: Przekierowanie na stronę z moimi zadaniami -
        // funkcja header - przykład jest np. w logowaniu

        $bazaDanych = new Database();
        $bazaDanych->connect();

        $zapytanie = 'INSERT INTO `praca_domowa` (`uzytkownik_id`, `haslo`, `imie`, `nazwisko`) VALUES (:uzytkownik_id, :haslo, :imie, :nazwisko)';
        $obiektZapytania = $bazaDanych->pdo->prepare($zapytanie);
        $obiektZapytania->bindValue(':login', $login, \PDO::PARAM_STR);
        $obiektZapytania->bindValue(':haslo', md5($login.md5($haslo)), \PDO::PARAM_STR);
        $obiektZapytania->bindValue(':imie', $imie, \PDO::PARAM_STR);
        $obiektZapytania->bindValue(':nazwisko', $nazwisko, \PDO::PARAM_STR);

        $obiektZapytania->execute();

        header('Location: '.Ustawienia::get('appURL').'moje-prace/');


        if ($wynikZapytania > 0) {
            Wiadomosc::sukces('Pomyślnie dodano rozwiązanie!');
            header('Location: ' . Ustawienia::get('appURL') . 'moje-prace');
          } else {
            Wiadomosc::blad('Wystąpił błąd podczas dodawania rozwiązania!');
            header('Location: ' . Ustawienia::get('appURL') . 'dodaj-rozwiazanie-formularz');// http:localhost/zarejestruj
          }
    }
}
