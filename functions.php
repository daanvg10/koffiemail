<?php

function dbconnect()
{
    $server ="localhost";
    $username ="koffiemail_22";
    $password = "7RfqrMVnQ";
    $database = "koffiemail_22";

    $connection = mysqli_connect($server, $username, $password, $database);

    if (!$connection) {
        die("connection failed: " . mysqli_connect_error()); 
    }

        return $connection;
}

function showHeader()
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="sweetalert2.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>KoffieMail</title>
    </head>
        <div class="divje">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header-titel">Koffiemail</div>
                        <div class="header-sub-titel">Stuur een koffiemail naar een klant, zodat ze alvast hun drankje kunnen kiezen!</div>
                    </div>
                </div>
            </div>
        </div>
    <?php
}

?>