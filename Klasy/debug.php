<?php

// declare(strict_types=1);

error_reporting(E_ALL);       //WYSWIETLA WSZYSTKIE INFORMACJE OBŁĘDZIE NAWET NADROBNIEJSZE
ini_set('display_errors', '1'); // WYŚWIETLA WSZYSTKIE INFORMACJE OBŁĘDZIE NAWET NADROBNIEJSZE

function dump($data) //Stwożona globalnie i można jej użyć wszędzie.
// nawet pomiędzy HTML-em np: <?php dump($param) zmknięcie php
{
    echo '<br/><div
  style="
  display: inline-block;
           padding: 1px 10px;
           margin: 5px
           border: 1px dashed gray;
           background: lightgray;
  "
  >
  <pre>';
    print_r($data);
    echo '</pre>
   </div>
   <br/>';
}
