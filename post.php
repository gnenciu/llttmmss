<?php

// echo "Sunt in fisierul post.php";
//  echo "<pre>";
//  print_r ($_POST); die;
// print_r($_FILES);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$cheie= $_SESSION['token'];
if( !isset ($_POST['hash'] )  || $cheie !== $_POST['hash']  ){
    echo 'Eroare CSRF';die;}
include_once("connect.php");
$nume='';
$email = '';
$mesaj='';

?>

<?php
    if(isset($error) && $error===true){
        echo '<div class="alert alert-danger" role="alert">'.
        $mess_error.'<br><br><a class="alert-link" href="connect.php"> << Introduceti datele corect!</a>
        </div>';
        //include("formular.php");
    }
    else{
        //salvare date
        $sql = "INSERT INTO vizitatori (nume, email, mesaj)
        VALUES ('".$nume."', '".$email."', '".$mesaj."')";
        if (mysqli_query($con, $sql)) {
            $mesaj_success = "Datele au fost introduse cu succes!";
            $db_eroare = false;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
    mysqli_close($con);
?>
