<?php

// angiv modtagere af formmailen
// flere modtagere kan tilføjes som
// $modtagere[1] = "adresse1@domain.dk"
// $modtagere[2] = "adresse2@domain.dk"
// osv.

$modtagere[0] = "steensigk@gmail.com";
//$modtagere[1] = "";
//$modtagere[2] = "";

// succes og fejlsider
$succes = "succes.html";
$fejl = "fejl.html";

// tesktbokse er
// navn
// emailadresse
// telefonnummer
// emne
// besked

// disse skal være "name" på de forskellige tekstbokse på html-siden
// f.eks. <input type="text" name="navn"></input>

// lav liste over modtagere
$mail_modtagere = implode(",", $modtagere);

// klargør parametre
$navn = $_POST['navn'];
$emailadresse = "fra: " . $_POST['emailadresse'];
$emne = "Besked fra " . $navn . ": " . $_POST['emne'];
$besked = $_POST['besked'];
$telefon = $_POST['telefon'];


// send mail
$mail_status = mail($mail_modtagere, $emne, $besked, $emailadresse);


//vælger hvilken side du blir sendt til efter sendt eller ikke sendt mail.
if ($mail_status) {
	header("Location: " . $succes);
} else {
	header("Location: " . $fejl);
}

?>