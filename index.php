<?php
header('Location: /notes');
/*
$request = $_SERVER['REQUEST_URI'];

if (substr($request, 0, 2) == "/?") {
    $request = "/";
}
switch ($request) {

        // Home //
    case '/':
        require __DIR__ . '/views/home/index.php';
        break;
    case '':
        require __DIR__ . '/views/home/index.php';
        break;
    case '/index.php':
        require __DIR__ . '/views/home/index.php';
        break;

        // Contatti //
    case '/contatti/':
        require __DIR__ . '/views/contatti/index.php';
        break;
    case (preg_match('/contatti.//', $request) ? true : false):
        require __DIR__ . '/views/contatti/index.php';
        break;
    case '/send':
        require __DIR__ . '/views/contatti/send.php';
        break;

        // Privacy 
    case (preg_match('/privacy.', $request) ? true : false):
        require __DIR__ . '/views/utility/privacy.php';
        break;

        // 404 
    case (preg_match('/404/', $request) ? true : false):
        require __DIR__ . '/views/utility/404.php';
        break;

    default:
        //Controllo il primo parametro dell'url per capire dove devo andare
        $arr = explode("/", $request, 10);
        $id = $arr[1];
        if ($id == "categorie") {
            // Categorie 
            require __DIR__ . '/views/blog/index.php';
        } else if (is_numeric($id)) {
            // Pagina 
            require __DIR__ . '/views/pagine/show.php';
        } else {
            // Articolo 
            require __DIR__ . '/views/blog/show.php';
        }

        //require __DIR__ . '/views/utility/404.php';
        //break;
}
*/