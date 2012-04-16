# Fichier Abonnes.sql
# Creation et remplissage de la table ABONNEES
# L'abonne peut ne pas donner son batiment et son etage, s'il a un interphone 

DROP TABLE ABONNES;

CREATE TABLE ABONNES
( Code varchar(8) PRIMARY KEY,
  Nom varchar(30) NOT NULL,
  Prenom varchar(20) NOT NULL,
  NoRue varchar(50) NOT NULL,
  CodePostal varchar(5) NOT NULL,
  Ville varchar(20) NOT NULL,
  Batiment varchar(15),
  Etage varchar(10),
  Digicode varchar(6),
  Telephone varchar(14),
  Email varchar(50),
  Banque smallint NOT NULL,
  Guichet smallint NOT NULL,
  Compte varchar(15) NOT NULL,
  NbCassettes smallint
);

INSERT INTO ABONNES
VALUES("1Xu123", "Duval", "Jean", "27, rue Jacques Amyot", "75011", "PARIS",
"sur rue", "4", "132B3", "01.23.67.12.21", "jduval@wanadoo.fr", 3004, 1452,
 "000045154", 0 );

INSERT INTO ABONNES
VALUES("25y13p", "de Prees", "Beatrice", "11bis, Bd Beaumarchais", "75004",
 "PARIS", "Figaro", NULL, "4590A", "01.47.12.98.82", "beatrice.deprees@aol.com"
, 1245, 784, "562 27 P", 0 );

INSERT INTO ABONNES
VALUES("365AL8", "Miriel", "Paul", "38, rue Beaugrenelle", "75015", "PARIS",
NULL, NULL, "92B63", "01.56.14.87.71", "Paul.Miriel@libertysurf.fr", 2035, 451,
 "802452107", 0 );

INSERT INTO ABONNES
VALUES("4367Xs", "Belmi", "Valerie", "191, rue Pierre Larousse", "75014",
 "PARIS","C", "7", "4A569", "01.28.16.52.44", "vbelmi@free.fr", 1245, 1053,
 "0052178", 0 );


