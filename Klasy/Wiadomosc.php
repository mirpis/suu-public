<?php
namespace Klasy;

/**
 *
 */
class Wiadomosc
{
  public static function sukces(string $tresc)
  {
    $_SESSION['sukces'][] = $tresc;
  }
  public static function blad(string $tresc)
  {
    $_SESSION['blad'][] = $tresc;
  }
  public static function uwaga(string $tresc)
  {
    $_SESSION['uwaga'][] = $tresc;
  }
}
