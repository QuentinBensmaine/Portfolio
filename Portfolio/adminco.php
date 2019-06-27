<?php


$param = parse_ini_file('bd.ini');

if(isset($_POST['pseudoadmin'])) {
    $pseudoadmin=$_POST['pseudoadmin'];
} else {
    $pseudoadmin="";
}

if(isset($_POST['mdp'])) {
    $mdp=$_POST['mdp'];
} else {
    $mdp="";
}

try{
    $dbh = new PDO($param['url'], $param['user'], $param['password']);
}catch(PDOException $e){
    echo("Erreur de connexion");
    exit;
}

$pseu = "SELECT pseudo FROM login_admin";   
$req1 = $dbh->prepare($pseu);
$req1->execute();
$res1 = $req1->fetch();
if ($res1["pseudo"] == $pseudoadmin){
    $motdp = "SELECT Password FROM login_admin";
    $req2 = $dbh->prepare($motdp);
    $req2->execute();
    $res2 = $req2->fetch();
    if ($res2["Password"] == $mdp){
        $_SESSION["login"] = $res1["pseudo"];
        include 'admin.php';
    }
    else{
        echo("mauvais mdp");
    }
}
else{
    echo("Mauvais pseudo");
}
$dbh = null;

?>