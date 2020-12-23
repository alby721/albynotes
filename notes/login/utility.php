<?php

$path = substr( $_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) ).'/';

include($path . '/notes/config.php');

$conn = new mysqli($servername, $username, $passworddb, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_POST['action'] == "login") {
    /*------------------------------------------------------
                        LOGIN
    -------------------------------------------------------*/

    ///Prendo le variabili dal login
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = 0;

    $q = $dbh->prepare("SELECT * FROM utenti WHERE email = :email OR user =:email");
    $q->bindParam(':email', $email);
    $q->execute(); // eseguo la query
    $q->setFetchMode(PDO::FETCH_ASSOC);
    if ($q) {
        while ($row = $q->fetch()) {

            if (!(password_verify($password, $row["password"]))) {
                echo "Password sbagliata";
                die();
                header("location: index.php");
                die();
            }


            //Se non ha confermato la password rimando all'index
            if ($row['validate'] == 0) {
                header("location: index.php?validate=no");
                die();
            }

            //Ricordami
            if ($_POST["remember"] == '1' || $_POST["remember"] == 'on') {
                $hour = time() + 3600 * 24 * 30;
                setcookie('username', $email, $hour);
                setcookie('password', $password, $hour);
            }
            //creo la sessione
            session_start();
            //Salvo i dati...
            $_SESSION['id'] = $row["id"];
            $_SESSION['level'] = $row["level"];
            $_SESSION['username'] = $user;
            $_SESSION['password'] = $password;

            if ($_SESSION['level'] <> 3) {
                header("location: /notes/");
                die();
            } else {
                header("location: /notes/");
                die();
            }
        }
    } else     // output data of each row
    {
        echo "ERRORE";
        die();
        header("location: index.php");
    }
    $conn->close();
} elseif ($_POST['action'] == "register") {
    /*------------------------------------------------------
                        REGISTER
    -------------------------------------------------------*/
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordrep = $_POST['passwordrep'];


    //Controllo che le password inserite siano uguali
    if (!($password === $passwordrep)) {
        header("location: /notes/login/register.php?error=password");
        die();
    }

    //Controllo che i dati inseriti non siano già presenti in archivio
    //Email
    $q = $dbh->prepare("SELECT * FROM utenti WHERE email = :email");
    $q->bindParam(':email', $email);
    $q->execute(); // eseguo la query
    $q->setFetchMode(PDO::FETCH_ASSOC);
    if ($q) {
        while ($row = $q->fetch()) {
            header("location: register.php?error=email");
            die();
        }
    }


    //Username
    $q = $dbh->prepare("SELECT * FROM utenti WHERE user = :username");
    $q->bindParam(':username', $username);
    $q->execute(); // eseguo la query
    $q->setFetchMode(PDO::FETCH_ASSOC);
    if ($q) {
        while ($row = $q->fetch()) {
            header("location: /notes/login/register.php?error=username");
            die();
        }
    }

    //Inserisco il nuovo utente nel DB
    $password = password_hash($password, PASSWORD_DEFAULT);
    $q = $dbh->prepare("INSERT INTO utenti (user,email,password,level,validate,image,note,created_at,updated_at) 
    VALUES (
    :username, 
    :email, 
    :password,
    2,
    0,
    '',
    '',
    CURRENT_TIMESTAMP(), 
    CURRENT_TIMESTAMP()
    )");
    $q->bindParam(':username', $username);
    $q->bindParam(':email', $email);
    $q->bindParam(':password', $password);
    $res = $q->execute(); // eseguo la query

    if ($res) {

        //Invio la mail di conferma dell'account
        $to = $email;
        $subject = "Registrazione a " . $appname;

        $message = "
        <html>
            <head>
                <title>Email da " . $appname . "</title>
            </head>
            <body>
                Grazie per esserti iscritto su <strong>" . $appname . "</strong>.<br>
                Per iniziare a inserire i tuoi eventi clicca qui: 
                <a href='" . $appwebsite . "/notes/login/register_confirm.php?username=" . $_POST["username"] . "&email=" . $_POST["email"] . "'>Entra in " . $appname . "</a><br/>
                I tuoi dati per entrare nella sezione riservata al caricamento di eventi:<br/>
                Email: " . $email . "<br/>
                Password: La password che hai scelto<br/><br/>
                Per informazioni e dubbi scrivi a <a href='mailto:" . $appmail . "'>" . $appmail . "</a><br>
                <br/><br/><br/>
                </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: ' . $appmail . '' . "\r\n";
        echo ("to: " . $to .
            "subject: " . $subject .
            "message: " . $message .
            "headers: " . $headers);

        if (mail($to, $subject, $message, $headers)) {
            header("location: /notes/login/register_confirm.php");
            die();
        } else {
            header("location: /notes/login/error.php?error=sendmail");
            echo "Si è verificato un errore. Per ulteriori informazioni scrivi a " . $appmail;
            die();
        }

        header("location: /notes/login/register_confirm.php");
    } else {
        header("location: /notes/login/error.php?error=" . $conn->error);
        die();
    }
} elseif ($_POST['action'] == "reset-password") {

    /*------------------------------------------------------
                            RESET PASSOWORD
    -------------------------------------------------------*/
    echo "CIUAO";
    //Genero una password provvisoria
    function randomPassword()
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    $newpass = randomPassword();
    $password = password_hash($newpass, PASSWORD_DEFAULT);

    //Inserisco la nuova password nel DB
    $sql = "UPDATE utenti SET 
    `password` = :password, 
    updated_at = CURRENT_TIMESTAMP() 
    WHERE email = :email";
    $q = $dbh->prepare($sql);
    $q->bindParam(':password', $password);
    $q->bindParam(':email', $email);
    $res = $q->execute(); // eseguo la query

    if ($res) {
        //Invio la nuova password all'utente
        $to = $email;
        $subject = "Recupero password da " . $appname;

        $message = "
        <html>
            <head>
                <title>Email da " . $appname . "</title>
            </head>
            <body>
                Hai richiesto il recupero della tua password su <strong>" . $appname . "</strong>.<br>
                La nuova password è: " . $newpass . "<br>
                Questa password è stata generata automaticamente. Ti consigliamo di aggiornarla al più presto. <br>
                Per informazioni e dubbi scrivi a <a href='mailto:" . $appmail . "'>" . $appmail . "</a><br>
                <br/><br/><br/>
                </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: ' . $appmail . '' . "\r\n";
        echo ("to: " . $to .
            "subject: " . $subject .
            "message: " . $message .
            "headers: " . $headers);


        if (mail($to, $subject, $message, $headers)) {
            header("location: /notes/login/register_confirm.php");
            die();
        } else {
            echo "Si è verificato un errore. Per ulteriori informazioni scrivi a " . $appmail;
        }
        header("location: index.php");
    } else {
        echo "Errore durante la modifica: " . mysqli_error($conn);
        header("location: error.php");
    }
}
