<?php

$persoMail = 'thderonne@gmail.com';

if (isset($_POST['envoyer'])) {
    if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,}$#i", $_POST['mail'])){
        echo "<p>L'adresse mail entrée est incorrecte.</p>";
    } else {
        $userMail = $_POST['mail'];
        $userName = $_POST['nom'];

        $entetes_du_mail = [];
        $entetes_du_mail[] = 'MIME-Version: 1.0';
        $entetes_du_mail[] = 'Content-type: text/html; charset=UTF-8';
        $entetes_du_mail[] = 'From: Nom de votre site <' . $persoMail . '>';
        $entetes_du_mail[] = 'Reply-To: Nom de votre site <' . $persoMail . '>';

        $entetes_du_mail = implode("\r\n", $entetes_du_mail);

        $sujet = '=?UTF-8?B?Formulaire de contact de ' . $nom . '?=';

        $message = htmlentities($_POST['message'], ENT_QUOTES, 'UTF-8');

        $message = nl2br($message);
        if(mail($persoMail, $sujet, $message, $entetes_du_mail)){
      
            echo "<p>Le mail à été envoyé avec succès !</p>";
          
          }else{
            
            echo "<p>Une erreur est survenue, le mail n'a pas été envoyé.</p>";
          
          }
    }
}

?>