<?php include('layouts/header.php') ?>
<?php include('../config.php') ?>

<div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
    <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
        <div class="app-logo"></div>
        <?php
        //Se validate = no dico di controllare la password
        if (isset($_GET['validate'])) {
            if ($_GET['validate'] == "no") {
                ?>
                <div class="p-1 mb-4 text-center" style="background-color:#ffa3a3;border-radius:15px;">
                    Non hai confermato il tuo account. <br>
                    <strong>Controlla nella posta</strong>, dovresti avere una mail da <?php echo $appname; ?>. <br>
                    Clicca sul link per confermare l'account ed effettuare il primo login.
                </div>
            <?php
        }
    }
    ?>
        <h4 class="mb-0">
            <span class="d-block">Welcome,</span>
            <span>Insert your data to access notes.</span></h4>
        <h6 class="mt-3">Don't have an account? <a href="register.php" class="text-primary">Register</a></h6>
        <div class="divider row"></div>
        <div>
            <form class="" action="utility.php" method="POST">
                <input type="hidden" name="action" value="login">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="" class="">Email or Username</label>
                            <input autofocus name="email" id="email" placeholder="" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="" class="">Password</label>
                            <input name="password" id="password" placeholder="" type="password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="position-relative form-check">
                    <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                    <label for="exampleCheck" class="form-check-label">Remember me</label></div>
                <div class="divider row">

                </div>
                <div class="d-flex align-items-center">
                    <div class="ml-auto">
                        <a href="reset_password.php" class="btn-lg btn btn-link">Lost Password?</a>
                        <button class="btn btn-primary btn-lg" type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('layouts/footer.php') ?>