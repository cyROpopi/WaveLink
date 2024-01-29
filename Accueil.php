<!DOCTYPE html>
<html lang="en">
<head>
    <link rel='stylesheet' href='_inc/style/Accueil.css'>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    use Classes\Header;
    spl_autoload_register(static function(string $fqcn) {
        // $fqcn contient Model\Thread\Message par exemple
        // remplaçons les \ par des / et ajoutons .php à la fin.
        // on obtient Model/Thread/Message.php
        $path = str_replace('\\', '/', $fqcn).'.php';
        require_once('_inc/'.$path);
    });
    $header = new Header();
    echo $header->render();
    ?>
    <main>
    <div id='playlist'>
        <h2>Playlist</h2>
        <ul>
            <?php

            ?>
        </ul>
    </div>
    <div>
        <p>dzdz</p>
    </div>
    </main>
</body>
</html>