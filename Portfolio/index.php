<?php
$param = parse_ini_file('bd.ini');
try{
    $dbh = new PDO($param['url'], $param['user'], $param['password']);
}catch(PDOException $e){
    echo("Erreur de connexion");
    exit;
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mon Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta title="Portfolio de Quentin Bensmaine">
    <meta description="Je me présente, Quentin Bensmaine, je suis actuellement en
    formation à l'ecole YNOV">
    <meta keyword="Portfolio Quentin Bensmaine">
    <link rel="stylesheet" type="text/css" media="screen" href="style/style.css" />
    <link href="style/icon.png" rel="icon" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+QingKe+HuangYou" rel="stylesheet">
</head>

<body>
    <?php
        $param = parse_ini_file("bd.ini");
        $dbh = new PDO($param['url'], $param['user'], $param['password']);
    ?>
        <section id="Back"></section>
        <!--Fond-->
        <section id="tout">
            <!--Page d'acceuil-->
            <div id="Acceuil" v-if="!See">
                <h2>Bienvenue sur mon portfolio!</h2>
                <p class="nom">Quentin BENSMAINE</p>
                <section class="fonc">
                    <button id="go" class="btn"> <span>Voir</span></button>
                </section>
            </div>
            <!--Fin page d'acceuil-->
            <div id="gen">
                <section id="sidebar" style="display: none">
                    <h1>Quentin Bensmaine</h1>
                    <section id="photo"></section>
                    <div id="contact">
                        <div id="cont" class="mail">
                            <img src="style/mail.png" alt="mail logo" class="logo"><br>
                            quentin.bensmaine@ynov.com
                        </div>
                        <div id="cont" class="tel">
                            <img src="style/phone.png" alt="mail logo" class="logo"><br>
                            0662809309</div>
                        <div id="cont" class="linkedin">
                            <img src="style/linkedin.png" alt="mail logo" class="logo"><br>
                            <a href="https://www.linkedin.com/in/quentin-bensmaine-7900a5170/"
                                target="blank">Linkedin</a>
                        </div>
                    </div>
                </section>
                <div id="back" class="hidden btn">Retour</div>
                <section id="droite" style="display: none">
                    <div id="select">
                        <div id="partie" class="skills">
                            <p>Compétences</p>
                        </div>
                        <div id="partie" class="exp">
                            <p>Expériences professionnelles</p>
                        </div><br>
                        <div id="partie" class="diplomes">
                            <p>Diplômes</p>
                        </div>
                        <div id="partie" class="works">
                            <p>Projets</p>
                        </div>
                    </div>
                    <div id="form">
                        <h1>Contact</h1>
                        <form action='message.php' method='POST'>
                        <input name='mail' type='text'placeholder="Adresse mail" class="texte">
                        <input name='pseudo' type='text' placeholder="Pseudo" class="texte">
                        <input name='msg' type='text'placeholder="Message" class="texte">
                        <input type='submit' id="go" class="btn">
                    </div>
                    <section class="hidden" id="works">
                        <p>Workshop 2019<br>
                            <a href="gullung.com">Site</a></p>
                        <video controls width="100%" height="50%">
                            <source src="INTRO_BOLDAGENCY_V.33.mp4" type="video/mp4">
                        </video>
                        <p>Vous avez <a href="https://github.com/QuentinBensmaine/Projet-ISN">ici</a> un lien vers un de
                            mes
                            projets. C'est un jeu narratif en Java crée sur <a
                                href="https://processing.org/download/">Processing</a>.</p>
                        <img src="style/CAPTURE.png" alt="capture d'écran du code" id="img">
                    </section>
                    <section class="hidden" id="skills">
                        <?php                
                            $tab = "SELECT nom_comp, pourcentage FROM competences;";
                            $sql = $dbh->prepare($tab);
                            $sql->execute();
                            $tabulation = [];
                            while($ligne = $sql->fetch(PDO::FETCH_NUM)){
                                $per = $ligne[1];
                                $val = $ligne[0];
                                echo @"<div class=\"skillbar clearfix \" data-percent=\"$per\">
                                <div class=\"skillbar-title\" style=\"background: #160272;\"><span>$val</span></div>
                                <div class='skillbar-bar' style='background: #320e94;'></div>
                                <div class='skill-bar-percent'>$per</div></div>";
                               }
                        ?>
                    </section>
                    <section class="hidden" id="exp">
                    <?php
                        $tab = "SELECT company, date_d, date_f, text, image FROM exp ORDER BY date_f asc;";
                        $sql = $dbh->prepare($tab);
                        $sql->execute();
                        $tabulation = [];
                        while($ligne = $sql->fetch(PDO::FETCH_NUM)){
                            $date_d = $ligne[1];
                            $company = $ligne[0];
                            $date_f = $ligne[2];
                            $text = $ligne[3];
                            $image = $ligne[4];
                            echo "<img src=\"$image\">";
                            echo "<div class=\"dipl\"><h1>$company</h1> $date_d --- $date_f <br> $text </div>";
                        }
                    ?>
                    </section>
                    <section class="hidden" id="diplomes">
                    <?php
                        $tab = "SELECT title, descript, datee, image FROM diplomes ORDER BY datee asc;";
                        $sql = $dbh->prepare($tab);
                        $sql->execute();
                        $tabulation = [];
                        while($ligne = $sql->fetch(PDO::FETCH_NUM)){
                            $descript = $ligne[1];
                            $title = $ligne[0];
                            $date = $ligne[2];
                            $image = $ligne[3];
                            echo "<img src=\"$image\">";
                            echo "<div class=\"dipl\"><h1>$title</h1> $date <br> $descript </div>";
                        }
                    ?>
                    </section>
                </section>
                <section id="description" style="display:none">
                    <p>Je me présente, Quentin Bensmaine, je suis actuellement en
                        formation à l'ecole <a
                            href="https://www.ynov.com/?gclid=EAIaIQobChMI2tnxrvnl4AIV1oTVCh3fzQg1EAAYASAAEgLMyfD_BwE">
                            YNOV
                        </a> sur le campus d'Aix-en-Provence dans la formation Ingésup. Cette formation
                        me délivrera un
                        Master en informatique avec une spécialisation dans le développement.<br>
                        Je m'intéresse à énormément de différentes choses ce qui fait de moi quelqu'un de polyvalent.
                        Parmi
                        celles-ci se trouve (évidemment) l'informatique et ce qui s'en rapproche comme les nouvelles
                        technologies ou même la robotique, mais je suis surtout passionné par les voyages. J'en ai déjà
                        fait
                        un certain nombre dont plusieurs en Australie, aux Etats-Unis, ainsi qu'en Angleterre.<br>
                        Vous trouverez ci-dessous mon CV téléchargeable</p>
                    <a id="go" class="btn" href='CV.pdf' target='_blank'><span>CV</span></a>
                </section>
            </div>
        </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.js"></script>

</html>