<?php
    include("inc/functions.php"); //verbind functions.php met dit bestand

    $connection = dbconnect(); //haal de functie dbconnect op uit functions.php
    
    $getUsersSQL = "SELECT * FROM medewerkers";
    $result = mysqli_query($connection, $getUsersSQL) or die(mysqli_error($connection));

    $medewerkers = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $medewerkers[] = $row;
    }
?>

<body>

    <?php
        showHeader(); //haal de functie showHeader op uit functions.php
    ?>

        <!-- <div class="bevestiging">
            <pop:success>
                <div class="alert-box success form-feedback">Succesvol</div>
            </pop:success>
        </div> -->

    <div class="divje-2"></div>
    <form action="email-script.php" method="post" class="form-signin" id="contact-form">


        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12 mt-4 my-auto">
                    <div class="titel">Afzender</div>
                    <div class="sub-titel">Wie is de afzender en wat is zijn/haar e-mailadres?</div>
                </div>
                <div class="col-lg-3 col-12 my-auto mt-4">
                    <div class="medewerkers">
                        <div class="input-titel">Naam</div>
                            <div class="input-group mb-3">
                            <select class="form-select" name="afzenderNaam" id="inputGroupSelect01">
                                <option selected>Medewerker kiezen...</option>
                                <?php
                                foreach($medewerkers as $medewerker) //een loop om alle medewerkers zijn of haar naam en e-mail uit de database op te halen
                                {
                                    $medewerkerNaam = $medewerker["MedewerkerNaam"];
                                    $medewerkerEmail = $medewerker["MedewerkerEmail"];
                                    ?>
                                    <option value='<?php echo $medewerkerEmail; ?>'><?php echo $medewerkerNaam; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 my-auto mt-4">
                    <div class="input-titel">E-mailadres</div>
                    <div class="input-group mb-3 mt-1">
                        <?php
                            ?>
                            <input type="email" class="form-control" id="form-email" name="afzenderEmail" placeholder="E-mailadres" aria-label="E-mailadres" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                <div class="hline"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12 mt-4 my-auto">
                    <div class="titel">Ontvanger</div>
                    <div class="sub-titel">Wie is de ontvanger en wat is zijn/haar e-mailadres?</div>
                </div>
                <div class="col-lg-3 col-12 mt-4">
                    <div class="input-titel">Naam</div>
                    <div class="input-group mb-3 mt-1">
                        <input type="text" class="form-control" name="ontvangerNaam" placeholder="Naam" aria-label="Naam" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mt-4">
                    <div class="input-titel">E-mailadres</div>
                    <div class="input-group mb-3 mt-1">
                        <input type="email" class="form-control" name="ontvangerEmail" placeholder="E-mailadres" aria-label="E-mailadres" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="hline"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12 mt-4">
                    <div class="titel">Openingszin</div>
                    <div class="sub-titel">Hoe wil je jouw e-mail starten?</div>
                </div>
                <div class="col-lg-7 col-12 mt-4 mb-2">
                    <div class="input-group">
                        <textarea class="form-control" name="openingszin" placeholder="Bedankt voor je interesse in onze diensten! Hierbij de afspraakbevestiging zoals telefonisch besproken." aria-label="With textarea" required>Bedankt voor je interesse in onze diensten! Hierbij de afspraakbevestiging zoals telefonisch besproken. </textarea>
                    </div>
                </div>
                <div class="hline"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12 mt-4">
                    <div class="titel">Afspraak</div>
                    <div class="sub-titel">Belangrijke informatie omtrent de afspraak zelf. Met wie de afspraak <br> is word automatisch ingevuld met de 'afzender' informatie.</div>
                </div>

                <div class="col-lg-3 col-12 mt-4">
                    <div class="input-titel">Datum</div>
                    <div class="input-group mb-3 mt-1">
                        <input type="date" class="form-control" name="afspraakDatum" id="datumAfspraak" min="datumAfspraak" max="2025-12-31" required> <!-- Pop up datum pikker -->
                    </div>
                </div>

                <div class="col-lg-4 col-12 mt-4">
                    <div class="input-titel">Tijdstip</div>
                    <div class="input-group mb-3 mt-1">
                        <input type="time" class="form-control" name="afspraakTijd" value="09:00" required> <!-- Pop up tijd pikker -->
                    </div>
                </div>
                                    
                <div class="col-lg-7 col-12 ms-auto mt-3">
                    <div class="input-titel">Onderwerp</div>
                    <div class="input-group mb-3 mt-1">
                        <input type="text" class="form-control" placeholder="Onderwerp" value="Website bespreken + narrowcasting" name="onderwerp" aria-label="E-mailadres" aria-describedby="basic-addon1" required> 
                    </div>
                </div>
                <div class="hline"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12 mt-4">
                    <div class="titel">Slotzin</div>
                    <div class="sub-titel">Hoe wil je jouw e-mail afsluiten?</div>
                </div>
                <div class="col-lg-7 col-12 mt-4 mb-2">
                    <div class="input-group">
                        <textarea class="form-control" name="slotzin" placeholder="Mocht deze afspraak onverhoopt niet door kunnen gaan neem dan telefonisch contact met ons op. Alvast bedankt! En tot dan... Geef alvast je drankje door, dan zetten wij hem voor je klaar!" aria-label="With textarea" required>Mocht deze afspraak onverhoopt niet door kunnen gaan neem dan telefonisch contact met ons op. Alvast bedankt! En tot dan... Geef alvast je drankje door, dan zetten wij hem voor je klaar!</textarea>
                    </div>
                </div>
                <div class="hline"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col mt-4">
                <p id="texto"></p>
                    <button type="submit" name="verstuurButton">E-mail versturen</button>
                </div>
            </div>
        </div>

    </form>

<!-- Javascript  -->
<script src="sweetalert2.all.min.js"></script>
<script src="jquery-3.6.0.min.js"></script>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery.js"></script>

</body>
</html>
