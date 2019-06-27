<?php
$param = parse_ini_file('bd.ini');

    try{
        $dbh = new PDO($param['url'], $param['user'], $param['password']);
    }catch(PDOException $e){
        echo("Erreur de connexion");
        exit;
    }

    if(isset($_POST['comp'])) {
        $comp=$_POST['comp'];
    } else {
        $comp="";
    }
    
    if(isset($_POST['percent'])) {
        $percent=$_POST['percent']."%";
    } else {
        $percent="";
    }
    if (empty($comp) OR empty($percent)) {
        echo '<font color="red">Attention, veuillez remplir les champs !</font>';
        echo "<form action='admin.php' method='get'>
        <input type='submit' value='Retour'>
    </form>";
        return;
    }
    else {
        $query = "INSERT INTO competences(nom_comp, pourcentage) VALUES(?,?)"; 
        $sql = $dbh->prepare($query);
        $sql->execute([$comp,$percent]);
        $dbh = null;
        echo('Compétence ajoutée !');
        echo "<form action='admin.php' method='get'>
            <input type='submit' value='Retour'>
        </form>";
        exit;
    }
?>