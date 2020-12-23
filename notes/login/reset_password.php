<?php include('layouts/header.php') ?>

<div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
    <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
        <div class="app-logo"></div>
        <h4 class="mb-0">
            <span class="d-block">Hai scordato la password?</span>
        <h6 class="mt-3">Inserisci la tua mail qui sotto, ti invieremo le istruzioni per recuperarla</h6>
        <div class="divider row"></div>
        <div>
            <form class="" action="utility.php" method="POST">
                <input type="hidden" name="action" value="reset-password">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="" class="">Email</label>
                            <input name="email" id="email" placeholder="" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="divider row">

                </div>
                <div class="d-flex align-items-center">
                    <div class="ml-auto">
                        <button class="btn btn-primary btn-lg" type="submit">Recupera password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('layouts/footer.php') ?>