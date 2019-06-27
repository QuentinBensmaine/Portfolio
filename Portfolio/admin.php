<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style/style.css" />
    <link href="style/icon.png" rel="icon" type="image/jpg">
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+QingKe+HuangYou" rel="stylesheet">
</head>
<body>
<?php
$param = parse_ini_file("bd.ini");
$dbh = new PDO($param['url'], $param['user'], $param['password']);
?>
<h1>Expériences</h1>
    <div id="form" class="trav">
        <form action="addexp.php" method="POST">
            <input name="company" type="text" placeholder="Expérience">
            <input name="descript" type="text" placeholder="Description" id="descript">
            <input name="date_d" type="date">
            <input name="date_f" type="date">
            <button type="submit" id="go" class="btn"><span>Ajouter</span></button>        
        </form>
        <form action="deletexp.php" method="POST">
            <select name="exp">
            <?php
                $tab = "SELECT company FROM exp;";
                $sql = $dbh->prepare($tab);
                $sql->execute();
                $tabulation = [];
                while($ligne = $sql->fetch(PDO::FETCH_NUM)){
                    foreach($ligne as $val){
                        echo "<option name='$val'>$val</option>";
                    }
                }
                ?>
            </select>
            <button type="submit" id="go" class="btn"><span>Suppr</span></button>        
        </form>
    </div>
    <h1>Compétences</h1>
    <div id="form" class="comp">
        <form action="modifcomp.php" method="POST">
            <select name="comp">
            <?php
                $tab = "SELECT nom_comp FROM competences;";
                $sql = $dbh->prepare($tab);
                $sql->execute();
                $tabulation = [];
                while($ligne = $sql->fetch(PDO::FETCH_NUM)){
                    foreach($ligne as $val){
                        echo "<option name='$val'>$val</option>";
                    }
                }
                ?>
                </select>
            <input name="percent" type="number" min="50" max="100" step="5" placeholder="50%">
            <button type="submit" id="go" class="btn"><span>Modifier</span></button>        
        </form>
        <form action="addcomp.php" method="POST">
            <input name="comp" type="text" placeholder="Compétence">
            <input name="percent" type="number" min="50" max="100" step="5" placeholder="50%">
            <button type="submit" id="go" class="btn"><span>Ajouter</span></button>        
        </form>
        <form action="deletecomp.php" method="POST">
            <select name="comp">
            <?php
                $tab = "SELECT nom_comp FROM competences;";
                $sql = $dbh->prepare($tab);
                $sql->execute();
                $tabulation = [];
                while($ligne = $sql->fetch(PDO::FETCH_NUM)){
                    foreach($ligne as $val){
                        echo "<option name='$val'>$val</option>";
                    }
                }
                ?>
            </select>
            <button type="submit" id="go" class="btn"><span>Suppr</span></button>        
        </form>
    </div>
    <h1>Diplômes</h1>
    <div id="form" class="trav">
        <form action="adddiplome.php" method="POST">
            <input name="diplome" type="text" placeholder="Diplôme">
            <input name="descript" type="text" placeholder="Description" id="descript">
            <input name="date" type="date">
            <button type="submit" id="go" class="btn"><span>Ajouter</span></button>        
        </form>
        <form action="deletedipl.php" method="POST">
            <select name="dipl">
            <?php
                $tab = "SELECT title FROM diplomes;";
                $sql = $dbh->prepare($tab);
                $sql->execute();
                $tabulation = [];
                while($ligne = $sql->fetch(PDO::FETCH_NUM)){
                    foreach($ligne as $val){
                        echo "<option name='$val'>$val</option>";
                    }
                }
                ?>
            </select>
            <button type="submit" id="go" class="btn"><span>Suppr</span></button>        
        </form>
    </div>
    <h1>Messages</h1>
    <div id="form" class="trav">
    <table>
        <tr>
          <th>Pseudo</th>
        <?php
        $tab = "SELECT pseudo FROM message;";
        $sql = $dbh->prepare($tab);
        $sql->execute();
        $tabulation = [];
        while($ligne = $sql->fetch(PDO::FETCH_NUM)){
            foreach($ligne as $val){
                echo "<td> $val </td>";
            }
        }
        ?>
        </tr>
        <tr>
        <th>Message</th>
        <?php
        $tab = "SELECT msg FROM message;";
        $sql = $dbh->prepare($tab);
        $sql->execute();
        $tabulation = [];
        while($ligne = $sql->fetch(PDO::FETCH_NUM)){
            foreach($ligne as $val){
                echo "<td> $val </td> ";
            }
        }
        ?>
        </tr>
    </table>
    <form action="delmess.php" method="postl">
    <button type="submit" id="go" class="btn trash"><span>Delete</span></button>
    </form>
</div>
</body>
</html>