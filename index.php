<?php
error_reporting(E_ALL);
try {
  require 'vendor/autoload.php';
  new \Klasy\Glowna();
} catch (\Exception $e) {
  d($e);
}
