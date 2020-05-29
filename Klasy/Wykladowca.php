<?php

namespace Klasy;

use Config\Database;
use Config\Ustawienia;

/**
 * Klasa ta odpowiada za wszystko, co może zrobić wykładowca w systemie.
 */
class Wykladowca
{
    /**
     * Lista rozwiąń przesłanych przez użytkowników.
     */
    public function listaRozwiazan()
    {
        // TODO: Wypisanie na ekranie listy elementów z tabeli rozwiazanie.
        // - klasa Database do pobrania danych, echo 'tresc strony';
        // Jak pobrać dane można zobaczyć w logowaniu - SELECT * FROM itd.

        $baza= new Database();
        $baza->connect();

        $zapytanie = 'SELECT * FROM `rozwiazanie`';
        $rozwiazania = $baza->query($zapytanie);

        $prace = '';
        foreach ($rozwiazania as $rozwiazanie) {
          $prace .= '
            <tr>
              <td>'.$rozwiazanie['uzytkownik_id'].'</td>
              <td>'.$rozwiazanie['praca_domowa_nr'].'</td>
              <td>'.$rozwiazanie['tresc'].'</td>
              <td>'.$rozwiazanie['data_przeslania'].'</td>
            </tr>';
        }

        echo '<a href="'.Ustawienia::get('appURL').'/">Strona główna</a>';

        echo '
          <table border=1>
            <thead>
              <tr>
                <td>Użytkownik_id</td>
                <td>Praca_domowa_nr</td>
                <td>Treść</td>
                <td>Data_przesłania</td>
              </tr>
            </thead>

            <tbody>
              '.$prace.'
            </tbody>
          </table>
        ';
    }

    /**
     * Lista prac domowych jakie muszą zrobić użytkownicy.
     */
    public function listaPracDomowych()
    {
        // TODO: Wypisanie na ekranie listy elementów z tabeli praca_domowa
        // - klasa Database do pobrania danych, echo 'tresc strony';
        // Jak pobrać dane można zobaczyć w logowaniu - SELECT * FROM itd.

        $bazaDanych = new Database();
        $bazaDanych->connect();

        $zapytanie = 'SELECT * FROM `praca_domowa`';
        $praceDomowe = $bazaDanych->query($zapytanie);

        $prace = '';

        foreach ($praceDomowe as $pracaDomowa) {
          $prace .= '
            <tr>
              <td>'.$pracaDomowa['id'].'</td>
              <td>'.$pracaDomowa['uzytkownik_id'].'</td>
              <td>'.$pracaDomowa['data_zadania'].'</td>
              <td>'.$pracaDomowa['temat'].'</td>
            </tr>';
        }

        echo '<a href="'.Ustawienia::get('appURL').'/">Strona główna</a>';

        echo '
          <table border=1>
            <thead>
              <tr>
                <td>Id</td>
                <td>Użytkownik_id</td>
                <td>Data zadania</td>
                <td>Temat</td>
              </tr>
            </thead>

            <tbody>
              '.$prace.'
            </tbody>
          </table>
        ';
    }

    /**
     * Formularz dodawania nowej pracy domowej.
     */
    public function nowaPracaDomowaFormularz()
    {
        // TODO: Wypisanie formularza dodawania nowej pracy domowej
        // (musi zawierać datę zadania oraz tytuł - nieobowiązkowy) - echo 'tresc strony';
        // Przykład formularza jest w rejestracji albo logowaniu

        echo '
          <form action="'.Ustawienia::get('appURL').'nowa-praca-domowa-formularz/" method="POST">
              <input type="text" name="data zadania" placeholder="Data zadania">
              <input type="text" name="tytul" placeholder="Temat">
              <input type="submit">
          </form>
        ';
    }

    /**
     * Dodanie nowej pracy domowej.
     */
    public function nowaPracaDomowa()
    {
        $dataZadania = $_POST['data-zadania'];
        $temat = $_POST['temat'];

        // TODO: Dodanie nowej pracy domowej do bazy danych (do tabeli praca_domowa)
        //  - klasa Database - podobnie jak przy rejestracji INSERT INTO itd.

        // TODO: Przekierowanie na stronę z pracami domowymi - funkcja header();

        $bazaDanych = new Database();
        $bazaDanych->connect();

        $zapytanie = 'INSERT INTO `praca_domowa` (`data-zadania`, `temat`) VALUES (:data-zadania, :temat)';
        $obiektZapytania = $bazaDanych->pdo->prepare($zapytanie);
        $obiektZapytania->bindValue(':data-zadania', $dataZadania, \PDO::PARAM_STR);
        $obiektZapytania->bindValue(':temat', $temat, \PDO::PARAM_STR);


        $obiektZapytania->execute();

        \header('Location: '.Ustawienia::get('appURL').'prace-domowe');

    }
    /**
     * Usunięcie pracy domowej.
     */
    public function usunPracaDomowa()
    {
        // TODO: Usunięcie z bazy danych pracy domowej
        // Trzeba uważać, ponieważ praca domowa może mieć przesłane rozwiązania
        //  - wtedy nie można jej usunąć
    }
}
