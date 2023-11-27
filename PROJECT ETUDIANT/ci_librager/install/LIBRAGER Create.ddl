CREATE TABLE auteur (
  id     int(11) NOT NULL AUTO_INCREMENT, 
  nom    varchar(255) NOT NULL, 
  prenom varchar(255), 
  sexe   char(1), 
  pays   varchar(125), 
  PRIMARY KEY (id)) CHARACTER SET UTF8 AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8;
CREATE TABLE catalogue (
  id  int(11) NOT NULL AUTO_INCREMENT, 
  nom varchar(125) NOT NULL, 
  PRIMARY KEY (id)) CHARACTER SET UTF8;
CREATE TABLE categorie (
  id  int(11) NOT NULL AUTO_INCREMENT, 
  nom varchar(45), 
  PRIMARY KEY (id)) CHARACTER SET UTF8 AUTO_INCREMENT = 7 DEFAULT CHARSET = utf8;
CREATE TABLE commentaire (
  id           int(11) NOT NULL, 
  personneid   int(11) NOT NULL, 
  livreid      int(11) NOT NULL, 
  texte        text NOT NULL, 
  dateCreation datetime NOT NULL, 
  deleted      int(1) DEFAULT 1, 
  PRIMARY KEY (id, 
  personneid, 
  livreid), 
  INDEX (texte)) CHARACTER SET UTF8;
CREATE TABLE edition (
  id   int(11) NOT NULL AUTO_INCREMENT, 
  nom  varchar(45) NOT NULL, 
  pays varchar(125), 
  PRIMARY KEY (id)) CHARACTER SET UTF8 AUTO_INCREMENT = 7 DEFAULT CHARSET = utf8;
CREATE TABLE emprunt (
  personneId        int(11) NOT NULL, 
  livreId           int(11) NOT NULL, 
  dateEmprunt       datetime NULL, 
  dateRetour        date comment 'exprimer en jous, le pres est pour 7 jour au max', 
  deleted           int(1) DEFAULT 0, 
  etatLivreRetourne varchar(255), 
  PRIMARY KEY (personneId, 
  livreId)) CHARACTER SET UTF8;
CREATE TABLE livre (
  id            int(11) NOT NULL AUTO_INCREMENT, 
  editionId     int(11) NOT NULL, 
  categorieId   int(11) NOT NULL, 
  auteurId      int(11) NOT NULL, 
  titre         varchar(125) NOT NULL, 
  rayonId       int(11), 
  CatalogueId   int(11) NOT NULL, 
  isbn          varchar(20), 
  slug          varchar(255) NOT NULL, 
  resumer       text, 
  nbPage        int(5) DEFAULT '1', 
  tome          int(1) DEFAULT 0, 
  dateParution  date, 
  nbLecture     int(11) DEFAULT '0', 
  dateEnreg     datetime NULL comment 'date enregistrement', 
  langue        varchar(15), 
  imgCouverture varchar(45), 
  PRIMARY KEY (id)) CHARACTER SET UTF8 AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8;
CREATE TABLE media (
  id      int(11) NOT NULL AUTO_INCREMENT, 
  LivreId int(11) NOT NULL, 
  nom     varchar(255), 
  taille  int(11), 
  PRIMARY KEY (id)) CHARACTER SET UTF8;
CREATE TABLE personne (
  id            int(11) NOT NULL AUTO_INCREMENT comment 'matricule etudiant ou numero cni si majeur', 
  email         varchar(255), 
  nom           varchar(255), 
  prenom        varchar(255), 
  sexe          char(1), 
  dateNaissance date, 
  motdepasse    varchar(255) NOT NULL, 
  telephone     varchar(255), 
  etablissement varchar(255) comment 'ecole ou lieu de travail', 
  dateEnreg     datetime NULL comment 'date enregistrement', 
  adresse       varchar(255) comment 'lieu de residence', 
  level         int(1) DEFAULT '0', 
  isAdmin       int(1) DEFAULT '0', 
  deleted       int(1) DEFAULT 0, 
  PRIMARY KEY (id)) CHARACTER SET UTF8 DEFAULT CHARSET = utf8;
CREATE TABLE rayon (
  id  int(11) NOT NULL AUTO_INCREMENT, 
  nom varchar(255) NOT NULL, 
  PRIMARY KEY (id)) CHARACTER SET UTF8 DEFAULT CHARSET = utf8;
CREATE UNIQUE INDEX livre 
  ON livre (id);
CREATE UNIQUE INDEX livre2 
  ON livre (titre);
CREATE INDEX livre3 
  ON livre (editionId);
CREATE INDEX livre4 
  ON livre (categorieId);
CREATE INDEX livre5 
  ON livre (auteurId);
CREATE UNIQUE INDEX email_UNIQUE 
  ON personne (email);
ALTER TABLE media ADD INDEX attacher (LivreId), ADD CONSTRAINT attacher FOREIGN KEY (LivreId) REFERENCES livre (id);
ALTER TABLE livre ADD INDEX classer (categorieId), ADD CONSTRAINT classer FOREIGN KEY (categorieId) REFERENCES categorie (id) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE commentaire ADD INDEX commenter (livreid), ADD CONSTRAINT commenter FOREIGN KEY (livreid) REFERENCES livre (id);
ALTER TABLE emprunt ADD INDEX delivrer (livreId), ADD CONSTRAINT delivrer FOREIGN KEY (livreId) REFERENCES livre (id);
ALTER TABLE emprunt ADD INDEX demander (personneId), ADD CONSTRAINT demander FOREIGN KEY (personneId) REFERENCES personne (id);
ALTER TABLE livre ADD INDEX ecrire (auteurId), ADD CONSTRAINT ecrire FOREIGN KEY (auteurId) REFERENCES auteur (id) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE livre ADD INDEX editer (editionId), ADD CONSTRAINT editer FOREIGN KEY (editionId) REFERENCES edition (id) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE commentaire ADD INDEX poster (personneid), ADD CONSTRAINT poster FOREIGN KEY (personneid) REFERENCES personne (id);
ALTER TABLE livre ADD INDEX ranger (rayonId), ADD CONSTRAINT ranger FOREIGN KEY (rayonId) REFERENCES rayon (id) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE livre ADD INDEX regrouper (CatalogueId), ADD CONSTRAINT regrouper FOREIGN KEY (CatalogueId) REFERENCES catalogue (id);

