# Fichier EmpRes.sql
# Creation de la table EMPRES (EMPRUNTS/RESERVATIONS) 


DROP TABLE EMPRES;

CREATE TABLE EMPRES
( NoFilm smallint NOT NULL,
  NoExemplaire smallint NOT NULL,
  CodeAbonne varchar(8) NOT NULL REFERENCES ABONNES (Code),
  DateEmpRes datetime,
  PRIMARY KEY (NoFilm,NoExemplaire),
  #FOREIGN KEY (NoFilm,NoExemplaire) REFERENCES CASSETTES
);

