<?php
include('layouts/header.php');
include('../config.php');
if (isset($_GET['error'])) {
    if ($_GET['error'] == "email") {
        $error = 'email';
        $focus = 'email';
    } elseif ($_GET['error'] == "username") {
        $error = "username";
        $focus = 'username';
    }elseif($_GET['error'] == "password"){
        $error = "password";
        $focus = 'password';
    }
}else{
    $error="";
    $focus = 'email';
}
?>

<div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
    <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
        <div class="app-logo"></div>
        <div>
            Si è verificato un errore. <br>
            Se il problema persiste scrivi a: <a href="mailto:<?php echo $appmail; ?>"><?php echo $appmail; ?></a> <br>
        </div>
        <div class=pt-5>
            <a href="index.php" class="btn btn-primary">Torna al login</a>
        </div>
    </div>
</div>
<?php include('layouts/footer.php') ?>