<?php
$errors = array();
if (isset($_POST['register'])) {

    $handle = fopen('emails.txt','a');
    $nome =  $_POST['nome'];
    if (empty($nome)) {
        array_push($errors, "Nome é obrigatório.");
        $_SESSION['error'] = "Nome é obrigatório.";
    }
    $email =  $_POST['email'];
    if (empty($email)) {
        array_push($errors, "Email é obrigatório.");
        $_SESSION['error'] = "Email é obrigatório.";
    }else{
        setcookie("email", $email);
    }

    $string = $nome .";". $email."\r\n";

    $result = fwrite($handle, $string);
    fclose($handle);
    if ($result<=0) { 
        array_push($errors, "Não foi possível salvar os dados.");
    }

    if (count($errors) == 0) {
        header('location: sucesso.php');
    } else {
        header("location: erro.php");
    }
}

?> 