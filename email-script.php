<?php
if (isset($_POST['verstuurButton'])) { //button om de e-mail te versturen

    $afzenderNaam = $_POST['afzenderNaam']; //de naam van de afzender van de e-mail
    $afzenderEmail = $_POST['afzenderEmail']; //het e-mail van de afzender van de e-mail

    $ontvangerNaam = $_POST['ontvangerNaam']; //de naam van de ontvanger van de e-mail
    $ontvangerEmail = $_POST['ontvangerEmail']; //ontvanger van de e-mail

    $openingszin = $_POST['openingszin']; // openingszin van de e-mail
    $afspraakTijd = $_POST['afspraakTijd']; //de tijd van de afspraak
    $afspraakDatum = $_POST['afspraakDatum']; //de datum van de afspraak
    $onderwerp = $_POST['onderwerp']; //onderwerp van de e-mail
    $slotzin = $_POST['slotzin']; //laatste invoerveld slotzin

    //headers om ervoor te zorgen dat de e-mails niet zo snel in spam komen
    $to = $ontvangerEmail;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: '.$afzenderEmail."\r\n".'Reply-To: '.$afzenderEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
    
    
    //functie om datum correcte volgorde te geven aan de verzonden e-mail
    if(isset($_POST['verstuurButton'])){
        if(!empty($_POST['afspraakDatum'])){
            $afspraakDatum = $_POST['afspraakDatum'];
            echo $afspraakDatum."<br>";
            $afspraakDatum = strtotime($afspraakDatum);
            $afspraakDatum = date('d-m-Y', $afspraakDatum);
            echo $afspraakDatum;
        }
    }

    //samenstellen van de mail die binnenkomt bij de ontvanger
    $openingszin = '<!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="css/style.css">
            <title>Koffiemail</title>
        </head>
        <body>
            <span>'.$message.'</span>
            <div class="container">
                <h1 style="background-color: #1475ac; color: white; text-align: center;"> RenewMyID | Half Elfje 5 Someren </h1> <br>
                    Hallo '.$ontvangerNaam.', <br><br>     
                    '.$openingszin.' <br>
                    Onze afspraak vindt plaats op '.$afspraakDatum.' om '.$afspraakTijd.'. <br><br>
                    '.$slotzin.' <br><br>
                    Met vriendelijke groet, <br><br>  
                    '.$afzenderNaam.' <br><br>
                <img src="koffiemail.laatstestapjes.nl/img/logo.png" width="354" height="120"/>  
            </div>';
    $result = @mail($to, $onderwerp, $openingszin, $headers);

    //allert met een melding en terug gestuurd worden naar de index
    echo '<script>alert("De e-mail is succesvol verstuurd!")</script>';
    echo '<script>window.location.href="index.php";</script>';

}