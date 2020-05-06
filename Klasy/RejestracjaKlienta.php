<?php
namespace Klasy;
//session_start();

use PDO;
use Config\Ustawienia;
use Config\Database;

class RejestracjaKlienta
{
   public function ekranRejestracji()
   {
     require './widoki/rejestracja.php';
   }

   public function rejestracja()
   {
     // Sprawdzic dane z formularza
     $p = $_POST;
     if (! $this->jest($p['email']) ||
         ! $this->jest($p['login']) ||
         ! $this->jest($p['haslo1'])||
         ! $this->jest($p['haslo2'])||
         $p['haslo1'] !== $p['haslo2']
      ) {
       Wiadomosc::blad('Brak wymaganych danych!');
       header('Location: ' . Ustawienia::get('appURL') . 'zarejestruj');
       exit();
     }
     // dodac wpis do bazy
     $baza = new Database();
     $baza->connect();d();exit();
     $zapytanie = 'INSERT INTO `klienci` (`email`, `login`, `haslo`) VALUES (?, ?, ?)';
     $wynikZapytania = $baza->query($zapytanie, [
       $p['email'], $p['login'], $p['haslo1']
     ]);
     // sprawdzić czy udało sie dodac
     /*
     JEŚLI WYNIK ZAPYTANIA TO LAST_INSERT_ID:
        -1 - BŁĄD (ZADZIAŁA ELSE)
        >0 - UDAŁO SIĘ DODAĆ
    JESLI WYNIK TO FETCH_ALL:
      FETCH ALL ZAWSZE ZWROCI TABLICE WIEC ZAWSZE IF NIŻEJ BEDZIE TRUE
      - CHYBA ŻE BĘDZIE BŁĄD ZAPYTANIA (ZAWSZE ZADZIAŁA IF A NIE ELSE)
    JEŚLI WYNIK TO TRUE/FALSE: return $result;
      TRUE TO 1 - CZYLI IF PONIZEJ BEDZIE TRUE
      FALSE TO 0 CZYLI IF PONIZEJ BEDZIE FALSE (ZADZIAŁA ELSE)
     */
     if ($wynikZapytania > 0) {
       Wiadomosc::sukces('Pomyślnie zarejestrowano!');
       header('Location: ' . Ustawienia::get('appURL') . 'home');
     } else {
       Wiadomosc::blad('Wystąpił błąd podczas dodawania użytkownika!');
       header('Location: ' . Ustawienia::get('appURL') . 'zarejestruj');// http:localhost/zarejestruj
     }

    //  // Wysłanie jednej zmiennej oznacza wysłanie wszustkich do tablicy $_POST
    //   if (isset($_POST['email']))
    //  {
    //       //Udana walidacja? Załóżmy, że tak!
    //      $wszystko_OK=true;
    //
    //      //Sprawdź poprawność loginu
    //      $login = $_POST['login'];
    //      //Sprawdzenie długości loginu
    //      if((strlen($login)<3) || (strlen($login)>20))
    //      {
    //        $wszystko_OK=false;
    //        $_SESSION['e_login']="Login musi posiadać od 3 do 20 znaków";
    //      }
    //      //Sprawdź czy wszystkie znaki są alfa numeryczne
    //      if(ctype_alnum($login)==false)
    //      {
    //        $wszystko_OK=false;
    //        $_SESSION['e_login']="login może składać się tylko z liter i cyfr (bez polskich znaków)";
    //      }
    //
    //    // Sprawdź poprawność adresu email
    //    $email = $_POST['email'];
    //    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
    // //  filter_var() - filter variable - filtowanie zmiennych
    // //  SANITIZE - sanityzacja - wyczyszczenie źródła z potencjalnie grożnych zapisów
    //
    //
    // // VALIDATE - VALIDACJA - sprawdzenie poprawności wprowadzonych danych do formularza .
    //   // $emailB - email Bezpieczny
    //    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
    //         // JEŻELI  $emailB  po VALIDACJI JEST NIE POPRAWNY   LUB   $emailB  JEST  RÓŻNY  OD $email  Z FORMULARZA
    //       // (bo ktoś zamiast literki "l"  literkę "ł" i ta literka "ł" została usunięta podczast SANITYZACJI)
    //        //  TO POKAŻ KOMUNIKAT O BŁĘDZIE:
    //    {
    //      $wszystko_OK=false;
    //      $_SESSION['e_email']="Podaj poprawny adres e-mail!";
    //    }
    //
    //   //Sprawdź poprawność hasła
    //     $haslo1 = $_POST['haslo1'];
    //     $haslo2 = $_POST['haslo2'];
    //
    //     if ((strlen($haslo1)<8) || (strlen($haslo1)>20))// WYSTARCZY SPRAWDZIĆ  'haslo1' BO OBA MUSZĄ BYĆ JEDNAKOWE
    //     {
    //       $wszystko_OK=false;
    //       $_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
    //     }
    //
    //     if ($haslo1!=$haslo2)
    //     {
    //       $wszystko_OK=false;
    //       $_SESSION['e_haslo']="Podane hasła nie są identyczne!";
    //     }
    //
    //         $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);//HASZOWANIE: password_hash  bo MD5 "ZŁAMANE"
    //   // password_hash() - KORZYSTA Z ALGORYTMU bcrypt I UŻYWA soli (ang.salt)
    //   // Sól (salt) = dodatkowe znaki doklejone do początku hasła (znaki te utrudniają atak:  tęczowymi tablicami)
    //             // np: 38f  a7b94fab4a51690eb5d901597ba6089a
    //       //      (sól) (reszta to orginalny hash
    //
    //
    //   // ŻEBY WYGENEROWAĆ I PODEJRZEĆ CIĄG ZNAKÓW ZAHASZOWANEGO JAKIEGOŚ NORMALNEGO HASŁA W BAZIE DANYCH NALEŻY:
    //   // WYBRAĆ W BAZIE DANYCH  JEDNO ZE  ZWYKŁYCH HASEŁ,
    //   //  TUTAJ WPISAĆ: echo $haslo_hash; exit();
    //   //   echo $haslo_hash; exit();
    //   // NASTĘPNIE DO OKIENKA hasło W FORMULARZU NA STRONIE WPISAĆ ZWYKŁE  HASŁO (wystarczy tylko hasło)
    //   // , KLIKNĄĆ  "ZAREJESTRUJ SIĘ"  I NA STRONIE  GŁÓWNEJ POKARZE  SIĘ  ZHASZOWANE  HASŁO  KTÓRE
    //   //  MOŻNA  SKOPIOWAĆ I  WKLEIĆ  DO  BAZY DANYCH  ZAMIAST  ZWYKŁEGO HASŁA.
    //
    //   //Czy zaakceptowano regulamin?
    //     if (!isset($_POST['regulamin']))
    //     {
    //       $wszystko_OK=false;
    //       $_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
    //     }
    //
    //     //Bot or not? Oto jest pytanie!
    //     $sekret = "6LcuSaIUAAAAAERxUb5NreQC9ej8L8IKqqQuAlBT";
    //     // POWYŻEJ TAJNY KLUCZ Z: Google reCAPTCHA
    //
    //     $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
    //     // file_get_contents() - POBIERZ ZAWARTOŚĆ PLIKU DO ZMIENNEJ
    //
    //     $odpowiedz = json_decode($sprawdz);
    //     // JOSON - JavaScript Object Notation - LEKKI FORMAT WYMIANY DANYCH KOMPUTEROWYCH, BAZUJĄCY NA PODZBIORZE
    //     // JĘZYKA "JavaScript". POMIMO NAZWY KOJARZĄCEJ SIĘ Z "JSem" WIELE JĘZYKÓW PROGRAMOWANIA OBSŁUGUJE TEN FORMAT PRZESYŁU
    //
    //     if ($odpowiedz->success==false)
    //     {
    //       $wszystko_OK=false;
    //       $_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
    //     }
    //
    //     //Zapamiętaj wprowadzone dane
    //     $_SESSION['login'] = $login; //fr - formularz rejstracji
    //     $_SESSION['fr_email'] = $email;
    //     $_SESSION['fr_haslo1'] = $haslo1;
    //     $_SESSION['fr_haslo2'] = $haslo2;
    //     if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
    //
    //     require_once "Ustawienia.php";
    //     mysqli_report(MYSQLI_REPORT_STRICT);// RAPORTOWANIE BŁĘDÓW PRZEZ RZUCANIE WYJĄTKÓW
    //
    //     try // try - SPRÓBÓJ
    //     {
    //       //$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
    //       $dbc_h = new PDO(Ustawienia::get('dsn'), 'root', '') or die ("Nie udało sie połączyć z bazą");
    //       if ($polaczenie->connect_errno!=0)
    //       {
    //         throw new Exception(danych()); // throw new Exception - RZUĆ NOWYM WYJĄTKIEM
    //       }
    //         else
    //           {
    //           //Czy email już istnieje?
    //           $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
    //                                                                                          // email='$email' BO: $email = $_POST['email'];
    //
    //           if (!$rezultat) throw new Exception($polaczenie->error);
    //
    //           $ile_takich_maili = $rezultat->num_rows;
    //           if($ile_takich_maili>0)
    //           {
    //             $wszystko_OK=false;
    //             $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
    //           }
    //
    //           //Czy login jest już zarezerwowany?
    //           $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$login'");
    //                                                                         // user='$login' BO: $login = $_POST['login'];
    //           if (!$rezultat) throw new Exception($polaczenie->error);
    //
    //           $ile_takich_loginow = $rezultat->num_rows;
    //           if($ile_takich_loginow>0)
    //           {
    //             $wszystko_OK=false;
    //             $_SESSION['e_login']="Istnieje już gracz o takim loginie! Wybierz inny.";
    //           }
    //
    //
    //           if ($wszystko_OK==true)// TUTAJ NA KOŃCU ZAKŁADAMY ŻE WSZYSTKO SIĘ UDAŁO. ALE  NIE SPEŁNIENIE
    //           // DOWOLNEGO Z  "ifa" z powyższych  PRZESTAWI TĄ  FLAGĘ  NA : "FALSE"  $wszystko_OK=false  I REJESTRACJA  NIE UDA SIĘ
    //           {
    //             // wszystkie testy zaliczone, dodajemy gracza do bazy
    //
    //             if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$login', '$haslo_hash', '$email')"))
    //             {
    //               $_SESSION['udanarejestracja']=true;
    //               //header('Location: witamy.php');
    //               header('Location: ' . Ustawienia::get('appURL') . 'zarejestrowany');
    //             }
    //             else
    //             {
    //               throw new PDOException($polaczenie->error);
    //             }
    //
    //           }
    //
    //           //$polaczenie->close();
    //       }
    //
    //   }
    //   catch(PDOException $e) // catch - ZŁAP (WYJĄTKI)
    //   {
    //     echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
    //     $e->getMessage(); // PRZY PUBLIKOWANIU W INTERNECIE TA LINIA W KOMENTARZ
    //   }
    // }
  }

  public function jest($zmienna) {
    return isset($zmienna) && $zmienna !== '';
  }
}
?>
