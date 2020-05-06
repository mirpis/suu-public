<?php
namespace Klasy;

use Config\Database;
/**
 *
 */
class KlientZalogowany
{
  public function powitanie()
  {
    $baza = new Database();
    $baza->connect();
    $zapytanie = 'SELECT p.*, t.nazwa FROM `produkty` p JOIN typ_produktu t ON t.id = p.typ';

    if (isset($_GET['kategoria']))
    {
      $zapytanie .= ' WHERE `typ` = ?';
      // .= ' WHERE `typ` = ?';  jest doklejone do:
      //   $zapytanie = 'SELECT p.*, t.nazwa FROM `produkty` p JOIN typ_produktu t ON t.id = p.typ';

      $produkty = $baza->query($zapytanie, [$_GET['kategoria']]);
    } else {
      $produkty = $baza->query($zapytanie);
    }

     require './widoki/oferta.php';
    //require_once './widoki/menu-boczne.php';
  }

}

?>
