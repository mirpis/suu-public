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
    public function lista()
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
    }

    /**
     * Dodanie rozwiązania pracy domowej.
     */
    public function dodajRozwiazanie()
    {
        $idUzytkownika = Sesja::get('id');
        $idPracyDomowej = $_POST['id-pracy-domowej'];
        $tresc = $_POST['tresc'];
        $dataPrzeslania = date('Y-m-d H:i:s');

        // TODO: Utworzyć w tabeli rozwiazanie nowego rozwiązania na podstawie danych zebranych powyżej
        // Będzie to działało na podobnej zasadzie jak rejestracja, tylko na innej tabeli
        // Klasa Database do wstawienia danych do bazy - jak to zrobić można podpatrzeć w rejestracji

        // TODO: Przekierowanie na stronę z moimi zadaniami -
        // funkcja header - przykład jest np. w logowaniu
    }
}
