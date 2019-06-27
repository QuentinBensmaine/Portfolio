<?php
$param = parse_ini_file('bd.ini');

try{
    $dbh = new PDO($param['url'], $param['user'], $param['password']);
}catch(PDOException $e){
    echo("Erreur de connexion");
    exit;
}

$query = "DELETE FROM message"; 
$sql = $dbh->prepare($query);
$sql->execute();
$dbh = null;
echo('Compétence supprimée !');
echo "<form action='admin.php' method='get'>
<input type='submit' value='Retour'>
</form>";
exit;
?>