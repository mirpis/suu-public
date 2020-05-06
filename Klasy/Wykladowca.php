<?php

namespace Klasy;

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
    }

    /**
     * Lista prac domowych jakie muszą zrobić użytkownicy.
     */
    public function listaPracDomowych()
    {
        // TODO: Wypisanie na ekranie listy elementów z tabeli praca_domowa
        // - klasa Database do pobrania danych, echo 'tresc strony';
        // Jak pobrać dane można zobaczyć w logowaniu - SELECT * FROM itd.
    }

    /**
     * Formularz dodawania nowej pracy domowej.
     */
    public function nowaPracaDomowaFormularz()
    {
        // TODO: Wypisanie formularza dodawania nowej pracy domowej
        // (musi zawierać datę zadania oraz tytuł - nieobowiązkowy) - echo 'tresc strony';
        // Przykład formularza jest w rejestracji albo logowaniu
    }

    /**
     * Dodanie nowej pracy domowej.
     */
    public function nowaPracaDomowa()
    {
        $dataZadania = $_POST['data-zadania'];
        $tytul = $_POST['tytul'];

        // TODO: Dodanie nowej pracy domowej do bazy danych (do tabeli praca_domowa)
        //  - klasa Database - podobnie jak przy rejestracji INSERT INTO itd.

        // TODO: Przekierowanie na stronę z pracami domowymi - funkcja header();
    }

    /**
     * Usunięcie pracy domowej.
     */
    public function usunPracaDomowa()
    {
        // TODO: Usunięcie z bazy danych pracy domowej
        // Trzeba uważać, ponieważ praca domowa może mieć przesłane rozwiązania - wtedy nie można jej usunąć
    }
}
