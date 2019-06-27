<?php 

if(isset($_POST['mail'])) {
    $mail=$_POST['mail'];
} else {
    $mail="";
}

if(isset($_POST['pseudo'])) {
    $pseudo=$_POST['pseudo'];
} else {
    $pseudo="";
}

if(isset($_POST['msg'])) {
    $msg=$_POST['msg'];
} else {
    $msg="";
}

$param = parse_ini_file('bd.ini');
$moi = 'quentin.bensmaine@ynov.com';
$sujet = 'mail portfolio';
$passage_ligne = "\n";
$boundary = "-----=".md5(rand());

$header = "From: \"Expediteur\"<$mail>".$passage_ligne;
$header.= "Reply-to: \"Retour\" <$mail>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

$message = $passage_ligne."--".$boundary.$passage_ligne;
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$msg.$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

if (empty($mail) OR empty($msg)) {
        echo '<font color="red">Attention, seul le champ Pseudo peut rester vide !</font>';
        return;
    }
else {
    try{
        $dbh = new PDO($param['url'], $param['user'], $param['password']);
    }catch(PDOException $e){
        echo("Erreur de connexion");
        exit;
    }
    $query = "INSERT INTO message(mail, pseudo, msg) VALUES(?,?,?)"; 
    $sql = $dbh->prepare($query);
    $sql->execute([$mail,$pseudo,$msg]);
    $dbh = null;
    echo('Message envoyé !');
    mail($moi,$sujet,$message,$header);
    exit;

}
?>
