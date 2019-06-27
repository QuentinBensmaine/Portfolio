<?php
$param = parse_ini_file('bd.ini');

    try{
        $dbh = new PDO($param['url'], $param['user'], $param['password']);
    }catch(PDOException $e){
        echo("Erreur de connexion");
        exit;
    }

    if(isset($_POST['diplome'])) {
        $diplome=$_POST['diplome'];
    } else {
        $diplome="";
    }
    
    if(isset($_POST['descript'])) {
        $description=$_POST['descript'];
    } else {
        $description="";
    }

    if(isset($_POST['date'])) {
        $date=$_POST['date'];
    } else {
        $date="";
    }

    if (empty($diplome) OR  empty($date)) {
        echo '<font color="red">Attention, veuillez remplir les champs !</font>';
        echo "<form action='admin.php' method='get'>
        <input type='submit' value='Retour'>
    </form>";
        return;
    }
    else {
        $query = "INSERT INTO diplomes(title, descript, datee) VALUES(?,?,?)"; 
        $sql = $dbh->prepare($query);
        $sql->execute([$diplome,$description,$date]);
        $dbh = null;
        echo('Diplôme ajouté !');
        echo "<form action='admin.php' method='post'>
            <input type='submit' value='Retour'>
        </form>";
        exit;
    }
?>