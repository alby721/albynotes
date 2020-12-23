<?php
include('layouts/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/notes/config.php');

if (isset($_GET['username'])) {
    $case = "ritornodamail";
} else {
    $case = "";
}
if ($case === "ritornodamail") {

    // se arrivo da mail per validare account

    //Recupero le variabili
    $username = $_GET['username'];
    $email = $_GET['email'];

    //Imposto il validate come true
    $sql = "UPDATE utenti SET 
    validate = 1, 
    updated_at = CURRENT_TIMESTAMP()
    WHERE 
    user = '" . $username . "' AND email = '" . $email . "'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
            <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                <h4>
                    <div>Congratulazioni!</div>
                    Il tuo account è stato attivato.
                </h4>
                <div>
                    <h6>Ora puoi effettuare il <a href="index.php">login</a>.</h6>
                </div>
            </div>
        </div>

    <?php
    } else {
        echo "Errore durante la modifica: " . mysqli_error($conn);
    }

    ?>


<?php
} else {
    ?>

    <!-- se arrivo da registrazione -->
    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
            <h4>
                <span> Clicca sul link che hai ricevuto nella mail per confermare il tuo account!
                </span>
            </h4>
            <div>
                <h6>Può volerci qualche minuto prima che la mail arrivi a destinazione. <br>
                    Se non ricevi la mail entro cinque minuti scrivi a <a href="mailto:<?php echo $appmail; ?>"><?php echo $appmail; ?></a></h6>
            </div>
        </div>
    </div>

<?php
}
?>
<?php include('layouts/footer.php') ?>