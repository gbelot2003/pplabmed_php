<?php

    $FILES_DIR = '/var/www/html/app/public/img/histo/';
    $FILES_URL = '/img/histo/';

    //header("Access-Control-Allow-Origin: *");

    function checkAccess() {
        // Insert your own rules here if you want to check access
        // Return `true` if user has access to uploading an image to server and `false` otherwise
        return true;
    }

    if (!checkAccess())
        die("!Access denied.");

    $src = $_POST['src']; /// img/histo/5ac-wallpaper_04.jpg
    $url = $_POST['url']; // imagene desde amazon

    $path = pathinfo($url);
    $file_ext = $path['extension'];
    $path2 = pathinfo($src);
    $file_name = $path2['filename'];

    $n = 0;
    $dst_file = $file_name . '.' . $file_ext;

    file_put_contents($FILES_DIR . $dst_file, file_get_contents($url));
    die($FILES_URL . $dst_file);

?>