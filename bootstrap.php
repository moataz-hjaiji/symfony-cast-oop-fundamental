 <?php

$configuration = array(
    'db_dsn'  => 'mysql:host=localhost;dbname=oo_battle',
    'db_user' => 'root',
    'db_pass' => null,
);

spl_autoload_register(function ($className){
    $path = __DIR__."/lib/".str_replace('\\',"/",$className).".php";
    if(file_exists($path)){
        require $path;
    }
});

