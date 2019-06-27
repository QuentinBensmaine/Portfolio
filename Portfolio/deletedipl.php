<?php
$param = parse_ini_file('bd.ini');

try{
    $dbh = new PDO($param['url'], $param['user'], $param['password']);
}catch(PDOException $e){
    echo("Erreur de connexion");
    exit;
}

if(isset($_POST['dipl'])) {
    $dipl=$_POST['dipl'];
} else {
    $dipl="";
}

if (empty($dipl)) {
    echo '<font color="red">Attention, veuillez remplir les champs !</font>';
    echo "<form action='admin.php' method='get'>
    <input type='submit' value='Retour'>
</form>";
    return;
}
else {
$query = "DELETE FROM diplomes WHERE title = :dipl "; 
$sql = $dbh->prepare($query);
$sql->execute(array(":dipl"=>$dipl));
$dbh = null;
echo('Compétence supprimée !');
echo "<form action='admin.php' method='get'>
<input type='submit' value='Retour'>
</form>";
exit;
}
?>