<?php

namespace Klasy;

use Config\Ustawienia;
/**
 *
 */
class Start
{
    public function powitanie()
    {
        echo '
          Witaj '.Sesja::get('imie').' '.Sesja::get('nazwisko').'
          <a href="'.Ustawienia::get('appUrl').'formularz-logowania/">Zaloguj</a>
          <a href="'.Ustawienia::get('appUrl').'formularz-rejestracji/">Zarejestruj</a>
          <a href="'.Ustawienia::get('appUrl').'wylogowanie/">Wyloguj</a>
        ';

        if (Sesja::get('id') !== null)
         {
            echo '
              <a href="'.Ustawienia::get('appURL').'prace-domowe-zadane/">Prace domowe zadane</a>
              <a href="'.Ustawienia::get('appURL').'moje-prace/">Moje prace</a>
              <a href="'.Ustawienia::get('appURL').'dodaj-rozwiazanie-formularz/">Dodaj rozwiązanie formularz</a>
              <a href="'.Ustawienia::get('appURL').'dodaj-rozwiazanie/">Dodaj rozwiązanie</a>

              <a href="'.Ustawienia::get('appURL').'lista-rozwazan/">Lista rozwiązań</a>
              <a href="'.Ustawienia::get('appURL').'lista-prac-domowych/">Lista prac domowych</a>
              <a href="'.Ustawienia::get('appURL').'nowa-praca-domowa-formularz/">Nowa praca domowa formularz</a>
              <a href="'.Ustawienia::get('appURL').'nowa-praca-domowa/">Nowa praca domowa</a>
            ';
        }
    }
}
