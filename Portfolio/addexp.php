<?php
$param = parse_ini_file('bd.ini');

    try{
        $dbh = new PDO($param['url'], $param['user'], $param['password']);
    }catch(PDOException $e){
        echo("Erreur de connexion");
        exit;
    }

    if(isset($_POST['company'])) {
        $company=$_POST['company'];
    } else {
        $company="";
    }
    
    if(isset($_POST['descript'])) {
        $descript=$_POST['descript'];
    } else {
        $descript="";
    }

    if(isset($_POST['date_d'])) {
        $date_d=$_POST['date_d'];
    } else {
        $date_d="";
    }

    if(isset($_POST['date_f'])) {
        $date_f=$_POST['date_f'];
    } else {
        $date_f="";
    }

    if (empty($company) OR  empty($date_d)) {
        echo '<font color="red">Attention, veuillez remplir les champs !</font>';
        echo "<form action='admin.php' method='get'>
        <input type='submit' value='Retour'>
    </form>";
        return;
    }
    else {
        $query = "INSERT INTO exp(company,date_d, date_f, text) VALUES(?,?,?,?)"; 
        $sql = $dbh->prepare($query);
        $sql->execute([$company,$date_d,$date_f,$descript]);
        $dbh = null;
        echo('Diplôme ajouté !');
        echo "<form action='admin.php' method='post'>
            <input type='submit' value='Retour'>
        </form>";
        exit;
    }
?>