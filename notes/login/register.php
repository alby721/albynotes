<?php
include('layouts/header.php');
if (isset($_GET['error'])) {
    if ($_GET['error'] == "email") {
        $error = 'email';
        $focus = 'email';
    } elseif ($_GET['error'] == "username") {
        $error = "username";
        $focus = 'username';
    } elseif ($_GET['error'] == "password") {
        $error = "password";
        $focus = 'password';
    }
} else {
    $error = "";
    $focus = 'email';
}
?>

<div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
    <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
        <div class="app-logo"></div>
        <h4>
            <div>Benvenuto,</div>
            <span>Ci vorranno solamente <span class="text-success">pochi secondi</span> per creare un account</span>
        </h4>
        <div>
            <form action="utility.php" method="post">
                <input type="hidden" name="action" value="register">
                <div class="form-row pt-4">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="email" class=""><span class="text-danger">*</span> Email</label>
                            <input <?php if ($focus == "email") {
                                        echo "autofocus";
                                    } ?> name="email" id="email" type="email" class="form-control">
                            <?php
                            if ($error == "email") {
                                ?>
                                <div style="color:red;padding-left:10px;">Email già presente in archivio</div>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="username" class=""><span class="text-danger">*</span> Username</label>
                            <input <?php if ($focus == "username") {
                                        echo "autofocus";
                                    } ?> name="username" id="username" type="username" class="form-control">
                            <?php
                            if ($error == "username") {
                                ?>
                                <div style="color:red;padding-left:10px">Username già utilizzato</div>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="password" class=""><span class="text-danger">*</span> Password</label>
                            <input <?php if ($focus == "password") {
                                        echo "autofocus";
                                    } ?> name="password" id="password" type="password" class="form-control">
                            <?php
                            if ($error == "password") {
                                ?>
                                <div style="color:red;padding-left:10px">Le password non corrispondono!</div>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="passwordrep" class=""><span class="text-danger">*</span> Ripeti Password</label>
                            <input name="passwordrep" id="passwordrep" type="password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mt-3 position-relative form-check">
                    <input name="check" id="exampleCheck" type="checkbox" required class="form-check-input">
                    <label for="exampleCheck" class="form-check-label">Accetta <a href="/privacy/" target="_blank">Termini e Condizioni</a>.</label>
                </div>
                <div class="mt-4 d-flex align-items-center">
                    <h5 class="mb-0">Hai già un account? <a href="index.php" class="text-primary">Entra</a></h5>
                    <div class="ml-auto">
                        <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg" type="submit" onclick=validatePwD() >Avanti</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Controllo password -->
<script>

    function validatePwD() {
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        //Copyright April 2004 Sani, A. I. (MCSE, MCSA, CCNA)
        //sanijean@yahoo.co.uk
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
/*
        //Initialise variables
        var errorMsg = "";
        var space = " ";
        fieldname = document.getElementById("password").name;
        fieldvalue = document.getElementById("password").value;
        fieldlength = fieldvalue.length;
        //It must not contain a space
        if (fieldvalue.indexOf(space) > -1) {
            errorMsg += "\nLa password non può includere spazi.\n";
        }

        //It must contain at least one number character
        if (!(fieldvalue.match(/\d/))) {
            errorMsg += "\nLa password deve includere almeno un numero.\n";
        }
        //It must start with at least one letter     
        if (!(fieldvalue.match(/^[a-zA-Z]+/))) {
            errorMsg += "\nLa password deve iniziare con una lettera.\n";
        }
        //It must contain at least one upper case character     
        if (!(fieldvalue.match(/[A-Z]/))) {
            errorMsg += "\nLa password deve contenere almeno un carattere maiuscolo.\n";
        }
        //It must contain at least one lower case character
        if (!(fieldvalue.match(/[a-z]/))) {
            errorMsg += "\nLa password deve includere almeno un carattere minuscolo.\n";
        }
        //It must contain at least one special character
        if (!(fieldvalue.match(/\W+/))) {
            errorMsg += "\nLa password deve includere almeno un carattere speciale - #,@,%,!\n";
        }
        //It must be at least 7 characters long.
        if (!(fieldlength >= 7)) {
            errorMsg += "\nLa password deve avere almeno 7 caratteri.\n";
        }
        //If there is aproblem with the form then display an error
        if (errorMsg != "") {
            msg = "______________________________________________________\n\n";
            msg += "La password ha bisogno delle seguenti caratteristiche per poter esere accettata:\n";
            msg += "______________________________________________________\n";
            errorMsg += alert(msg + errorMsg + "\n\n");
            fieldname.focus();
            return false;
        }
        return true;
    }*/
</script>
<script>
// Sicuro di voler eliminare?

function validatePwD(){
    //Initialise variables
    var errorMsg = "";
        var space = " ";
        fieldname = document.getElementById("password").name;
        fieldvalue = document.getElementById("password").value;
        fieldlength = fieldvalue.length;
        //It must not contain a space
        if (fieldvalue.indexOf(space) > -1) {
            errorMsg += "<br>La password <strong>non può includere spazi</strong>.<br>";
        }

        //It must contain at least one number character
        if (!(fieldvalue.match(/\d/))) {
            errorMsg += "<br>La password deve includere <strong>almeno un numero</strong>.<br>";
        }
        //It must start with at least one letter     
        if (!(fieldvalue.match(/^[a-zA-Z]+/))) {
            errorMsg += "<br>La password deve <strong>iniziare con una lettera</strong>.<br>";
        }
        //It must contain at least one upper case character     
        if (!(fieldvalue.match(/[A-Z]/))) {
            errorMsg += "<br>La password deve contenere almeno <strong>un carattere maiuscolo</strong>.<br>";
        }
        //It must contain at least one lower case character
        if (!(fieldvalue.match(/[a-z]/))) {
            errorMsg += "<br>La password deve includere almeno <strong>un carattere minuscolo</strong>.<br>";
        }
        //It must contain at least one special character
        if (!(fieldvalue.match(/\W+/))) {
            errorMsg += "<br>La password deve includere almeno <strong>un carattere speciale - #,@,%,!</strong><br>";
        }
        //It must be at least 7 characters long.
        if (!(fieldlength >= 7)) {
            errorMsg += "<br>La password deve avere almeno <strong>7 caratteri</strong>.<br>";
        }
        if (errorMsg != "") {

    event.preventDefault(); // prevent form submit

    Swal.fire({
      title: 'Errore password!!!',
      html: "La password deve rispettare queste caratteristiche: <br>" + errorMsg,
      type: 'error',
      confirmButtonColor: '#d33',
      confirmButtonText: 'Ok',
    })
        }
    
 }
</script>


<?php include('layouts/footer.php') ?>