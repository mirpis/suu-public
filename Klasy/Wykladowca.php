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

        $baza= new Database();
        $baza->connect();

        $zapytanie = 'SELECT * FROM `rozwiazanie`';
        $rozwiazania = $baza->query($zapytanie);

        $prace = '';
        foreach ($rozwiazania as $rozwiazanie) {
          $prace .= '
            <tr>
              <td>'.$rozwiazanie['uzytkownik_id'].'</td>
              <td>'.$rozwiazanie['praca_domowa_id'].'</td>
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
                <td>Praca_domowa_id</td>
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
                <td>Id pracy domowej</td>
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
          <form action="'.Ustawienia::get('appURL').'nowa-praca-domowa/" method="POST">
              <input type="text" name="data-zadania" placeholder="Data zadania">
              <input type="text" name="temat" placeholder="Temat">
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



        // TODO: Przekierowanie na stronę z pracami domowymi - funkcja header();

        $bazaDanych = new Database();
        $bazaDanych->connect();

        $zapytanie = 'INSERT INTO `praca_domowa` (`data_zadania`, `temat`) VALUES (:data_zadania, :temat)';
        $obiektZapytania = $bazaDanych->pdo->prepare($zapytanie);
        $obiektZapytania->bindValue(':data_zadania', $dataZadania, \PDO::PARAM_STR);
        $obiektZapytania->bindValue(':temat', $temat, \PDO::PARAM_STR);


        $wynikZapytania = $obiektZapytania->execute();


        if ($wynikZapytania > 0) {
          Wiadomosc::sukces('Pomyślnie dodano rozwiązanie!');
          header('Location: ' . Ustawienia::get('appURL') . 'moje-prace');
        } else {
          Wiadomosc::blad('Wystąpił błąd podczas dodawania rozwiązania!');
          header('Location: ' . Ustawienia::get('appURL') . 'dodaj-rozwiazanie-formularz');// http:localhost/zarejestruj
        }
    }
    /**
     * Usunięcie pracy domowej.
     */
    public function usunPracaDomowa()
    {
        // TODO: Usunięcie z bazy danych pracy domowej
        // Trzeba uważać, ponieważ praca domowa może mieć przesłane rozwiązania
        //  - wtedy nie można jej usunąć
        //
        //  Najpierw należy pobrać z linku id pracy domowej (tak jak dla formularza dodawania rozwiązania)
        $idPracyDomowej = $_POST['id'];
        //  Należy się połączyć z bazą danych
        $bazaDanych = new Database();
        $bazaDanych->connect();
        //  Potem trzeba usunąć rozwiązania z bazy powiażane z tą pracą domową
        $zapytanieUsuwaniaRozwiazan = 'DELETE FROM rozwiazanie WHERE praca_domowa_id = :id';


        //  Potem trzeba usunąć samą pracę domową
        $zapytanieUsuwaniaPracyDomowej = 'DELETE FROM praca_domowa WHERE id = :id';


    }

}
