<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
    /*
        execute the file at the path specified by the url
    */
    require_once "auth.php";
    require_once "global.php";
    define("REQ_RES", strtok($_GET["es_path"],'?')); 
    function render_body()
    {
        require_once FILES_ROOT."app/".REQ_RES;
    }
    $path = FILES_ROOT."app/".REQ_RES;
    if(file_exists($path))
    {
        require_once FILES_ROOT."includes.php";
        require_once "authed_layout.php";
    }
    else
    {           
        /*
        if illegal path, set status = 404
        */
        $code = 404;
        $msg = "Not Found";
        require_once "error.php";
    }
?>