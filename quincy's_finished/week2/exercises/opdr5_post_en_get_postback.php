<?php
print_r($_REQUEST); //printen wat er wordt verzonden ($_POST) en ontvangen ($_GET).
$error = false; //zet de $error variabele standaard op false.

if(isset($_POST['submit'])){            //Als er op de knop submit wordt gedrukt, dan...
    if($_POST['firstname'] == ''){      //zodra de firstname veld leeg is zal de $error variabele op true gezet worden.
        $error = true;
    }else {                             //anders wordt $name gekoppeld aan wat er in het veld 'firstname' werd ingevuld.
        $name = $_POST['firstname'];
    }
}elseif (isset($_GET['id'])){         //Als er op de link wordt gedrukt, dan...
    $name = $_GET['firstname'];         //wordt de $name gekoppeld met de 'value' van de 'name' in de link.
}

//De onderstaande code zou je in plaats van de code hierboven kunnen gebruiken. $_REQUEST leest $_POST & $_GET tegelijk.

//if(isset($_REQUEST['id'], $_REQUEST['submit'])) {
//    if($_REQUEST['firstname'] == ''){
//        $error = true;
//    }else {
//        $name = $_REQUEST['firstname'];
//    }
//}

?>
<!doctype html>
<html lang="en">
	<head>
		<title>Oefening 5 - POST en GET - Postback</title>
		<meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css"> <!-- "css/style.css" zorgt ervoor dat de juiste .css file wordt opgehaald. -->
	</head>
	<body >
        <h1>Oefening 5 - POST en GET - Postback</h1>

        <p>
            Probeer de opdracht zo te maken dat je vanaf deze pagina zowel met een GET (link)
            als met een POST (formulier) een 'postback' kunt doen.
            De info zal je zelf moeten opvangen in PHP en de benodigde checks zal je zelf moeten
            toevoegen.
        </p>
        <?php if($error == 1){ ?> <!-- Als $error true(1) is, dan... -->
           <error>
               <?php echo 'Vul een geldige naam in';?>
           </error>
        <?php } ?>

        <?php if(!isset($name)){ ?> <!-- Als $name niet bestaat, dan... -->
            <!-- POST gedeelte -->
            <form action="" method="post"> <!-- action moet leeg zijn, want je wilt terugkeren naar de huidige pagina. method is 'post'. -->

                <label for="firstname">Voornaam</label>

                <input type="text" id="firstname" name="firstname" />


                <input type="submit" name="submit" value="Versturen"/>

            </form>
        <?php }else { ?> <!-- Als $name wel bestaat, dan... -->

        <b>
            <?= "Het is gelukt! Jouw naame is: $name";?>
        </b>
         <?php  } ?>
        <p>
            <!-- GET gedeelte -->
            <a href="?id=1&firstname=Quincy">Link naar dezelfde pagina</a>      <!-- De link heeft een vaste 'name' en 'value' -->
        </p>                                                                    <!-- id is de controleur of er geklikt is op de link -->
	</body>                                                                     <!-- firstname is de inhoud van de data die je wilt versturen-->
</html>