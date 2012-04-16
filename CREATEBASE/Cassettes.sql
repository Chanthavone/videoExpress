# Fichier Cassettes.sql
# Creation et remplissage de la table CASSETTES
# La table recence les cassettes video (VHS) et les DVD

DROP TABLE CASSETTES;

CREATE TABLE CASSETTES
( NoFilm smallint NOT NULL REFERENCES FILMS,
  NoExemplaire smallint NOT NULL,
  Support enum("DVD", "VHS"),
  Statut enum("disponible","empruntee","reservee") NOT NULL,
  PRIMARY KEY(NoFilm, NoExemplaire) 
);

INSERT INTO CASSETTES
VALUES(1, 1, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(1, 2, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(1, 3, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(2, 1, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(2, 2, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(3, 1, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(3, 2, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(4, 1, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(4, 2, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(5, 1, "VHS", "disponible");

INSERT INTO CASSETTES
VALUES(5, 2, "VHS", "disponible");

INSERT INTO CASSETTES
VALUES(5, 3, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(6, 1, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(6, 2, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(7, 1, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(7, 2, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(8, 1, "VHS", "disponible");

INSERT INTO CASSETTES
VALUES(8, 2, "VHS", "disponible");

INSERT INTO CASSETTES
VALUES(8, 3, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(9, 1, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(9, 2, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(10, 1, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(10, 2, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(11, 1, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(11, 2, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(12, 1, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(12, 2, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(12, 3, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(13, 1, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(13, 2, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(13, 3, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(14, 1, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(14, 2, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(14, 3, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(15, 1, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(15, 2, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(16, 1, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(16, 2, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(17, 1, "VHS", "disponible");

INSERT INTO CASSETTES
VALUES(17, 2, "VHS", "disponible");

INSERT INTO CASSETTES
VALUES(17, 3, "DVD","disponible");

INSERT INTO CASSETTES
VALUES(18, 1, "VHS","disponible");

INSERT INTO CASSETTES
VALUES(18, 2, "DVD","disponible");
