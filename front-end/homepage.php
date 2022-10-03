<?php
//cosa fare?
//form di login
//ricerca
require '../vendor/autoload.php';

use League\Plates\Engine;

$templates = new Engine('./templates_html');
session_start();

echo $templates->render('popup_login');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>

<body>
    <?php
    echo $templates->render('login');
    echo $templates->render('logout');
    echo $templates->render('ricerca');
    try {
        if ($_SESSION['response_code'] == 200) {
            echo $templates->render('hidepublic', []);
        } else if ($_SESSION['response_code'] != 200) {
            echo $templates->render('hideprivate', []);
        }
    } catch (Exception $e) {
    }
    ?>
</body>

</html>