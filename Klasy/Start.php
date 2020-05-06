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

        if (Sesja::get('id') !== null) {
            echo '
              <a href="'.Ustawienia::get('appURL').'prace-domowe/">Prace domowe</a>
              <a href="'.Ustawienia::get('appURL').'moje-prace/">Moje prace</a>
            ';
        }
    }
}
