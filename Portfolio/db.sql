DROP DATABASE IF EXISTS projet_uf_db;

CREATE DATABASE projet_uf_db;

USE projet_uf_db;

CREATE TABLE message (
  id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  mail VARCHAR(50) NOT NULL,
  pseudo VARCHAR(20) NULL,
  msg TEXT NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE exp (
  id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  company VARCHAR(50) NOT NULL,
  date_d DATE NOT NULL,
  date_f DATE,
  text VARCHAR(1000),
  image VARCHAR(50),
  PRIMARY KEY (id)
);

CREATE TABLE diplomes (
  id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  title VARCHAR(50) NOT NULL,
  descript VARCHAR(1000),
  datee DATE NOT NULL,
  image VARCHAR(50),
  PRIMARY KEY (id)
);

CREATE TABLE login_admin (
  id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  pseudo VARCHAR(20) NOT NULL,
  Password VARCHAR(64) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE competences (
  id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  nom_comp VARCHAR(30) NOT NULL,
  pourcentage VARCHAR(10) NOT NULL,
  PRIMARY KEY (id)
)

ENGINE = INNODB;

INSERT INTO diplomes (title, descript,datee,image) VALUES ("Baccalauréat Général", "BACCALAUREAT MENTION TRES BIEN, MENTION ANGLAIS EUROPEEN (2018) Lycée du Val d’Argens Le Muy 16,06/20 ; Filière scientifique branche science de l’ingénieur, spécialisation Informatique et Science du Numérique, option anglais européen (histoire).", "2018-07-07", "style/bac.png");
INSERT INTO exp (company, date_d, date_f, text, image) VALUES("Drop'in Dracénie", "2018-07-01", "2018-08-01", "EMPLOYE POLYVALENT : Accueil des clients, surveillance du parc aquatique, travaux pour l’agrandissement du parc.", "D:\wamp64\www\Portfolio\style\dropin.png");
INSERT INTO competences (nom_comp, pourcentage) VALUES ("HTML5", "90%");
INSERT INTO competences (nom_comp, pourcentage) VALUES ("CSS3", "70%");
INSERT INTO competences (nom_comp, pourcentage) VALUES ("Java", "70%");
INSERT INTO competences (nom_comp, pourcentage) VALUES ("JavaScript", "75%");
INSERT INTO competences (nom_comp, pourcentage) VALUES ("C", "65%");
INSERT INTO competences (nom_comp, pourcentage) VALUES ("Python", "70%");
INSERT INTO competences (nom_comp, pourcentage) VALUES ("PHP", "65%");
INSERT INTO competences (nom_comp, pourcentage) VALUES ("Anglais", "90%");
INSERT INTO competences (nom_comp, pourcentage) VALUES ("Espagnol", "65%");
INSERT INTO competences (nom_comp, pourcentage) VALUES ("Suite Office", "80%");
INSERT INTO login_admin (pseudo, Password) VALUES ("moi", "admin");
