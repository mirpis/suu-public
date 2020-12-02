<?php

namespace Config;
/**
 *
 */
/**
 * Ustawienia aplikacji
 */
/**
 * ZMIENNĄ const np: const USTAWIENIA    MOŻNA USTAWIĆ RAZ I KONIEC,
 * NIC NIE MOŻNA W NIEJ ZMIENIAĆ
 *
 * ZMIENNĄ static np: private static $ustawienia   MOŻNA ZMIENIAĆ,JEJ PARAMETRY,
 * I ISTNIEJE POMIMO ŻE NIE UTWOŻONO ŻADNEGO OBIEKTU
 */
class Ustawienia
{
  private static $ustawienia = [

    'appName' => "suu",
    'appDir' => '',
    'dbType' => 'mysql',
    'dbName' => 'suu',
    'dsn' => 'mysql:dbname=suu;hostname=localhost;charset=utf8',//'mysql:dbname=id11562510_app;hostname=localhost;charset=utf8',
    'appURL' => 'http://localhost/suu/'//'https://ubraniadospania.000webhostapp.com/app/'
    // ..
  ];
  /**
   * Zwraca parametr z ustawień
   * @param  string $ustawienie Indeks w tablicy ustawień
   * @return mixed ustawienie
   */
  public static function get(string $ustawienie)
   {
    if (isset(self::$ustawienia[$ustawienie]))
     {
      return self::$ustawienia[$ustawienie];
/*
this-> używamy tylko wtedy gdy jest utworzony jakiś Obiekt
self - możemy użyć na rzecz Classy która nie ma utworzonego żadnego Obiektu
*/
     }
    return null;
  }
}
