# Fichier Films.sql
# Creation et remplissage de la table FILMS


DROP TABLE FILMS;


CREATE TABLE FILMS
( NoFilm smallint PRIMARY KEY,
  Titre varchar(80) NOT NULL,
  Nationalite varchar(30),
  Realisateur varchar(40),
  Couleur enum("Couleurs","Noir et Blanc") NOT NULL,
  Annee year,
  Genre enum("Comédie","Comédie dramatique","Drame","Aventure","Documentaire"),
  Duree smallint,
  Synopsis varchar(255)
);

INSERT INTO FILMS
VALUES(1,"La Chambre des officiers","français","François Dupeyron", "Couleurs",2001,"Drame",135,"Août 1914. Adrien, jeune et séduisant lieutenant, part à cheval en reconnaisance. Un obus éclate. La guerre, c'est au Val-de-Grâce qu'il la passe, dans la chambre des officiers. Une pièce sans miroir, où chacun se voit dans le regard de l'autre.");

INSERT INTO FILMS
VALUES(2,"Le Charme discret de la bourgeoisie","français", "Luis Bunuel","Couleurs",1972,"Comédie dramatique",100,"Une étude cynique et sans complaisance de l'hypocrisie bourgeoise.");

INSERT INTO FILMS
VALUES(3,"A la campagne","français", "Manuel Poirier","Couleurs",1994,"Comédie dramatique",108,"Une jeune femme, sortie de prison et venue rejoindre sa soeur dans une petite ville de l'Eure, se lie quelque temps avec Benoît, qui a choisi de vivre à la campagne.");

INSERT INTO FILMS
VALUES(4,"Belle de jour","français", "Luis Bunuel","Couleurs",1966,"Comédie dramatique",102,"Séverine n'a jamais trouvé de véritable plaisir auprès de son mari, Pierre. Un des amis du ménage lui glisse un jour l'adresse d'un maison clandestine. Troublée, Séverine ne résiste pas à l'envie de s'y rendre.");

INSERT INTO FILMS
VALUES(5,"La Cicatrice","polonais", "Krzysztof Kieslowski","Couleurs",1976,"Comédie dramatique",104,"Bednarz se résoud à accepter de mener la construction d'un grand complexe chimique, dans une petite ville qui fut le théâtre d'une période malheureuse de sa vie. Il se promet de construire un site où les gens vivront dans le bonheur.");

INSERT INTO FILMS
VALUES(6,"Carrément à l'Ouest","français", "Jacques Doillon","Couleurs",2000,"Comédie dramatique",97,"A Paris où l'entraînent ses petites magouilles, Alex va faire une drôle de rencontre avec deux filles: Fred et Sylvia. Fred organise un bizarre jeu de séduction, pour éprouver Alex.");

INSERT INTO FILMS
VALUES(7,"Le ciel est à vous","français", "Jean Grémillon","Noir et Blanc",1943,"Comédie dramatique",105,"Transposition de la vie de Mme Dupeyron, qui devint l'une des premières aviatrices légendaires (elle détint longtemps le record de distance en ligne droite).");

INSERT INTO FILMS
VALUES(8,"La Dolce Vita","italien", "Federico Fellini","Noir et Blanc",1960,"Comédie dramatique",160,"Le chroniqueur Marcello fait le tour des lieux à scandale pour alimenter les potins d'un journal à fort tirage.");

INSERT INTO FILMS
VALUES(9,"Et vogue le navire","franco-italien", "Federico Fellini","Couleurs",1983,"Comédie dramatique",135,"1914. La haute société européenne, artistes et politiciens de renom, s'apprête à disperser, au cours d'une croisière, les cendres de leur diva adulée. La guerre va frapper de plein fouet les insouciants passagers... ");

INSERT INTO FILMS
VALUES(10,"Le Fantôme de la liberté","français", "Luis Bunuel","Couleurs",1974,"Comédie dramatique",105,"Film à sketches insolites et farfelus ponctués par des scènes de répression où l'on entend le cri «A bas la liberté».");

INSERT INTO FILMS
VALUES(11,"La Fin du jour","français", "Julien Duvivier","Noir et Blanc",1939,"Comédie dramatique",108,"L'abbaye de Saint-Jean-la-Rivière menace de fermer ses portes. Ce qui serait une véritable catastrophe pour ses pensionnaires, tous de vieux comédiens sans ressource. Saint-Clair, comédien autrefois adulé, vient justement d'y arriver.");

INSERT INTO FILMS
VALUES( 12,"Trois couleurs - Blanc","franco-polonais", "Krzysztof Kieslowski","Couleurs",1993,"Comédie dramatique",91,"Dans ce deuxième volet de ses «Trois couleurs», Krzysztof Kieslowski conte l'histoire de Karol, polonais, et de Dominique, française. Nous faisons leur connaissance au moment de leur divorce et où en quelque sorte leur histoire commence.");

INSERT INTO FILMS
VALUES(13,"Trois couleurs - Bleu","franco-helvético-polonais", "Krzysztof Kieslowski","Couleurs",1992,"Comédie dramatique",100,"Julie, la femme d'un grand compositeur qui a trouvé la mort avec leur enfant lors d'un accident d'automobile, va tenter de retrouver la liberté contre les pressions et les pièges de son entourage.");

INSERT INTO FILMS
VALUES(14,"Trois couleurs - Rouge","franco-helvético-polonais", "Krzysztof Kieslowski","Couleurs",1993,"Comédie dramatique",96,"Dans ce troisième volet qui conclut les trois couleurs, Valentine, étudiante de l'université de Genève, écrase un chien. L'animal est juste blessé. Sur une plaque, attachée à son collier, Valentine trouve l'adresse du propriétaire. C'est un juge.");

INSERT INTO FILMS
VALUES(15,"Je rentre à la maison","français", "Manuel de Oliveira","Couleurs",2001,"Drame",90,"Sur scène, Gilbert Valence, grand comédien reconnu, joue les vieillards indignes ou magnifiques.Un soir après la représentation, on lui annonce la mort accidentelle des siens. Ne reste qu'un petit-fils.");

INSERT INTO FILMS
VALUES(16,"Baisers volés","français", "François Truffaut","Couleurs",1968,"Comédie",90,"La suite des aventures d'Antoine Doinel après son service militaire. Ses rencontres et aventures amoureuses.");

INSERT INTO FILMS
VALUES(17,"Le Chocolat","américain", "Lasse Hallström","Couleurs",2000,"Comédie",122,"A Lansquenet, dans la France profonde de 1959,sous le regard impitoyable du comte, tout le monde va à la messe. Sauf deux nouvelles venues, une mère et sa fillette, qui s'installent pour vendre des chocolats.");

INSERT INTO FILMS
VALUES(18,"Une hirondelle a fait le printemps","français", "Christian Carion","Couleurs",2001,"Comédie dramatique",103,"A trente ans, Sandrine en a assez de Paris. Décidée à devenir agricultrice, son rêve depuis toujours, elle achète une ferme dans le Vercors. Mais la cohabitation avec l'ex-propriétaire, Adrien, resté sur les lieux, n'est pas de tout repos.");
