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
              <td>'.$pracaDomowa['temat'].'</td>
              <td><a href="'.Ustawienia::get('appURL').'/dodaj-rozwiazanie-formularz/'.$pracaDomowa['id'].'/">Dodaj rozwiązanie</a></td>
            </tr>';
        }

        echo '<a href="'.Ustawienia::get('appURL').'/">Strona główna</a>';

        echo '
          <table border=1>
            <thead>
              <tr>
                <td>Data zadania</td>
                <td>Tytuł</td>
                <td>Akcje</td>
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

        $idUzytkownika = Sesja::get('id');
// d($idUzytkownika);
        $bazaDanych = new Database();
        $bazaDanych->connect();

        $zapytanie = "SELECT
          `praca_domowa`.*,
          roz.tresc,
          roz.data_przeslania
        FROM `praca_domowa`
        RIGHT JOIN `rozwiazanie` roz ON roz.`praca_domowa_id` = `praca_domowa`.`id`
        WHERE `roz`.uzytkownik_id = :id"; // :id to BINDA

        $praceDomowe = $bazaDanych->query($zapytanie, [":id" => $idUzytkownika]);
// d($praceDomowe);

        // TODO: Wypisać na ekran prace - funkcja echo

        $wierszePracDomowych = '';

        foreach ($praceDomowe as $pracaDomowa) {
          $wierszePracDomowych .= '
            <tr>
              <td>'.$pracaDomowa['id'].'</td>
              <td>'.$pracaDomowa['data_zadania'].'</td>
              <td>'.$pracaDomowa['temat'].'</td>
              <td>'.$pracaDomowa['data_przeslania'].'</td>
              <td>'.$pracaDomowa['tresc'].'</td>
            </tr>
          ';
        }

        echo '
          <table border=1>
            <thead>
              <tr>
                <td>Id pracy domowej</td>
                <td>Data zadania</td>
                <td>Temat</td>
                <td>Data przesłania</td>
                <td>Treść</td>
              </tr>
            </thead>
            <tbody>
              '.$wierszePracDomowych.'
            </tbody>
          </table>
        ';
    }

    /**
     * Formularz dodawania rozwiązania.
     */
    public function dodajRozwiazanieFormularz()
    {
        $idPracyDomowej = $_GET['id'];
//d($_GET);
        $db = new Database();
        $db->connect();
        //                                                              BINDA
        // $pracaDomowa = $db->query('SELECT * FROM praca_domowa where id = ?', [$idPracyDomowej]);
        $pracaDomowa = $db->query('SELECT * FROM praca_domowa where id = :id', [":id" => $idPracyDomowej]);
        $pracaDomowa = $pracaDomowa[0];

        // TODO: Wyświetlenie formularza dodawania rozwiązania
        // Identyfikator pracy domowej musi się pojawić w formularzu:
        // NIEWIDOCZNE DLA UŻYTKOWNIKA:id-pracy-domowej do której będzie napisana:moja_praca
        // <input type="hidden" name="id-pracy-domowej" value="'.$idPracyDomowej.'">
        // Wykorzystać funkcję echo do wypisania formularza
        //
        echo '
          <form action="'.Ustawienia::get('appURL').'dodaj-rozwiazanie/" method="POST">
              <input type="hidden" name="id-pracy-domowej" value="'.$idPracyDomowej.'">
              <input type="text" name="temat" value="'.$pracaDomowa['temat'].'" readonly disabled>
              <textarea name="tresc" placeholder="Treść" rows=5 cols=10></textarea>
              <input type="submit">
          </form>
        ';
    }

    /**
     * Dodanie rozwiązania pracy domowej.
     */
    public function dodajRozwiazanie()
    {
        $idUzytkownika = Sesja::get('id'); // Użytkownik nie widzi tej wartości

        $idPracyDomowej = $_POST['praca_domowa_id']; // To przesyłamy z formularza z ukrytego pola

        $tresc = $_POST['tresc'];
//d($_POST);
        $dataPrzeslania = date('Y-m-d H:i:s');

        // TODO: Utworzyć w tabeli rozwiazanie nowego rozwiązania na podstawie danych zebranych powyżej
        // Będzie to działało na podobnej zasadzie jak rejestracja, tylko na innej tabeli
        // Klasa Database do wstawienia danych do bazy - jak to zrobić można podpatrzeć w rejestracji

        // TODO: Przekierowanie na stronę z moimi zadaniami -
        // funkcja header - przykład jest np. w logowaniu

        $bazaDanych = new Database();
        $bazaDanych->connect();

        $zapytanie = 'INSERT INTO `rozwiazanie` (
          `uzytkownik_id`, `praca_domowa_id`, `tresc`, `data_przeslania`
        ) VALUES (?, ?, ?, ?)';

        $wynikZapytania = $bazaDanych->query($zapytanie, [$idUzytkownika, $idPracyDomowej, $tresc, $dataPrzeslania]);

        if ($wynikZapytania > 0) {
          Wiadomosc::sukces('Pomyślnie dodano rozwiązanie!');
          header('Location: ' . Ustawienia::get('appURL') . 'moje-prace');
        } else {
          Wiadomosc::blad('Wystąpił błąd podczas dodawania rozwiązania!');
          header('Location: ' . Ustawienia::get('appURL') . 'dodaj-rozwiazanie-formularz');// http:localhost/zarejestruj
        }
    }
}
