<?php
    $request = str_replace('/php/mvcProject', '', $_SERVER['REQUEST_URI']); // récupère tout après nom de domaine puis enlève les sous dossier
    $uri = parse_url($request, PHP_URL_PATH); // enlève les Get etc..
    $split_uri = explode('/', $uri); // tableau de chaque mot séparé
    $segments = array_filter($split_uri); // supprime les éléments null du tableau (le premier étant du null du au premier /)

    if(count($segments) == 0 || $segments[1] == 'index')
        $controller = 'index';
    else
        $controller = $segments[1];
    $path = 'controllers/'.$controller.'.php';
    if(file_exists($path))
        require $path;
    else
        require 'controllers/404.php';

?>