<?php
$param = parse_ini_file('bd.ini');

try{
    $dbh = new PDO($param['url'], $param['user'], $param['password']);
}catch(PDOException $e){
    echo("Erreur de connexion");
    exit;
}

if(isset($_POST['exp'])) {
    $exp=$_POST['exp'];
} else {
    $exp="";
}

if (empty($exp)) {
    echo '<font color="red">Attention, veuillez remplir les champs !</font>';
    echo "<form action='admin.php' method='get'>
    <input type='submit' value='Retour'>
</form>";
    return;
}
else {
$query = "DELETE FROM exp WHERE company = :exp "; 
$sql = $dbh->prepare($query);
$sql->execute(array(":exp"=>$exp));
$dbh = null;
echo('Compétence supprimée !');
echo "<form action='admin.php' method='get'>
<input type='submit' value='Retour'>
</form>";
exit;
}
?>