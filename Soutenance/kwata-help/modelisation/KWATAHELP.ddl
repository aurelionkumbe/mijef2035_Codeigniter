ALTER TABLE kh_city DROP FOREIGN KEY kh_city_ibfk_1;
ALTER TABLE kh_kwata DROP FOREIGN KEY kh_kwata_ibfk_1;
ALTER TABLE kh_messag DROP FOREIGN KEY kh_messag_ibfk_1;
ALTER TABLE kh_messag DROP FOREIGN KEY kh_messag_ibfk_2;
ALTER TABLE kh_metier DROP FOREIGN KEY kh_metier_ibfk_1;
ALTER TABLE kh_notif DROP FOREIGN KEY kh_notif_ibfk_1;
ALTER TABLE kh_recom DROP FOREIGN KEY kh_recom_ibfk_1;
ALTER TABLE kh_recom DROP FOREIGN KEY fk_kh_recom_kh_user1;
ALTER TABLE kh_reserv DROP FOREIGN KEY kh_reserv_ibfk_1;
ALTER TABLE kh_reserv DROP FOREIGN KEY kh_reserv_ibfk_2;
ALTER TABLE kh_secto DROP FOREIGN KEY kh_secto_ibfk_1;
ALTER TABLE kh_state DROP FOREIGN KEY kh_state_ibfk_1;
ALTER TABLE kh_user DROP FOREIGN KEY fk_kh_user_kh_kwata1;
ALTER TABLE kh_yamo DROP FOREIGN KEY fk_kh_yamo_kh_user1;
ALTER TABLE kh_yamo DROP FOREIGN KEY fk_kh_yamo_kh_messag1;
ALTER TABLE kh_yamo DROP FOREIGN KEY fk_kh_yamo_kh_newkh1;
ALTER TABLE kh_yamo DROP FOREIGN KEY fk_kh_yamo_kh_user2;
ALTER TABLE kh_pub DROP FOREIGN KEY FKkh_pub281954;
ALTER TABLE kh_ami DROP FOREIGN KEY FKkh_ami96829;
ALTER TABLE kh_ami DROP FOREIGN KEY FKkh_ami511488;
ALTER TABLE kh_favori DROP FOREIGN KEY FKkh_favori920203;
ALTER TABLE kh_user DROP FOREIGN KEY FKkh_user883063;
ALTER TABLE kh_favori DROP FOREIGN KEY FKkh_favori956462;
ALTER TABLE kh_abon DROP FOREIGN KEY FKkh_abon621626;
ALTER TABLE kh_abon DROP FOREIGN KEY FKkh_abon608985;
ALTER TABLE kh_abus DROP FOREIGN KEY FKkh_abus621435;
ALTER TABLE kh_abus DROP FOREIGN KEY FKkh_abus289060;
ALTER TABLE kh_abus DROP FOREIGN KEY FKkh_abus889996;
DROP TABLE IF EXISTS kh_admin;
DROP TABLE IF EXISTS kh_city;
DROP TABLE IF EXISTS kh_kwata;
DROP TABLE IF EXISTS kh_messag;
DROP TABLE IF EXISTS kh_metier;
DROP TABLE IF EXISTS kh_newkh;
DROP TABLE IF EXISTS kh_notif;
DROP TABLE IF EXISTS kh_pub;
DROP TABLE IF EXISTS kh_recom;
DROP TABLE IF EXISTS kh_reg;
DROP TABLE IF EXISTS kh_reserv;
DROP TABLE IF EXISTS kh_secto;
DROP TABLE IF EXISTS kh_services;
DROP TABLE IF EXISTS kh_state;
DROP TABLE IF EXISTS kh_user;
DROP TABLE IF EXISTS kh_vedette;
DROP TABLE IF EXISTS kh_yamo;
DROP TABLE IF EXISTS kh_ami;
DROP TABLE IF EXISTS kh_favori;
DROP TABLE IF EXISTS kh_abon;
DROP TABLE IF EXISTS kh_abus;
CREATE TABLE kh_admin (id_admin int(11) NOT NULL AUTO_INCREMENT, nom_admin varchar(150), login_admin varchar(50) NOT NULL, pass_admin varchar(50) NOT NULL, acces_admin int(11) DEFAULT '0' NOT NULL, valid_admin int(2) DEFAULT '0' NOT NULL, PRIMARY KEY (id_admin)) AUTO_INCREMENT = 9 DEFAULT CHARSET = latin1;
CREATE TABLE kh_city (id_city int(11) NOT NULL AUTO_INCREMENT, nom_city varchar(255) NOT NULL, statut int(1) DEFAULT '1' NOT NULL, kh_reg_id int(11) NOT NULL, PRIMARY KEY (id_city)) AUTO_INCREMENT = 123 DEFAULT CHARSET = latin1;
CREATE TABLE kh_kwata (id_kwata int(11) NOT NULL AUTO_INCREMENT, nom_kwata varchar(255) NOT NULL, statut int(1) DEFAULT '1' NOT NULL, kh_city_id int(11) NOT NULL, PRIMARY KEY (id_kwata)) AUTO_INCREMENT = 136 DEFAULT CHARSET = latin1;
CREATE TABLE kh_messag (id_messag int(11) NOT NULL AUTO_INCREMENT, contenu text NOT NULL, `date` datetime NOT NULL, statut int(1) DEFAULT '1' NOT NULL, kh_user_id int(11) NOT NULL, user_messag_id int(11) NOT NULL, PRIMARY KEY (id_messag)) AUTO_INCREMENT = 13 DEFAULT CHARSET = latin1;
CREATE TABLE kh_metier (id_metier int(11) NOT NULL AUTO_INCREMENT, nom_metier varchar(50) NOT NULL, description text, statut int(1) DEFAULT '1' NOT NULL, image varchar(255), kh_services_id int(11), PRIMARY KEY (id_metier)) AUTO_INCREMENT = 109 DEFAULT CHARSET = latin1;
CREATE TABLE kh_newkh (id_newkh int(11) NOT NULL AUTO_INCREMENT, titre varchar(50), informations text NOT NULL, datepublication datetime NOT NULL, cible int(2) DEFAULT '0' NOT NULL, statut int(1) DEFAULT '1' NOT NULL, kh_user_id int(11) NOT NULL, kh_kwata_id int(11) NOT NULL, created_at datetime NULL, PRIMARY KEY (id_newkh)) AUTO_INCREMENT = 42 DEFAULT CHARSET = latin1;
CREATE TABLE kh_notif (id_notif int(11) NOT NULL AUTO_INCREMENT, evenement varchar(255) NOT NULL, statut int(1) DEFAULT '1' NOT NULL, kh_user_id int(11) NOT NULL, PRIMARY KEY (id_notif)) DEFAULT CHARSET = latin1;
CREATE TABLE kh_pub (id_pub int(11) NOT NULL AUTO_INCREMENT, img_pub varchar(50) DEFAULT 'pub.png', text_pub text, priorite int(11) DEFAULT '1' NOT NULL, statut int(11) DEFAULT '0' NOT NULL, nb_vue int(11), nb_max_vue int(11), kh_kwata_id int(11) NOT NULL, PRIMARY KEY (id_pub)) AUTO_INCREMENT = 2 DEFAULT CHARSET = latin1;
CREATE TABLE kh_recom (id_recom int(11) NOT NULL AUTO_INCREMENT, libelle varchar(255) NOT NULL, statut int(1) DEFAULT '1' NOT NULL, kh_user_id int(11) NOT NULL, user_recom_id int(11) NOT NULL, PRIMARY KEY (id_recom)) AUTO_INCREMENT = 32 DEFAULT CHARSET = latin1;
CREATE TABLE kh_reg (id_reg int(11) NOT NULL AUTO_INCREMENT, nom_reg varchar(255) NOT NULL, statut int(1) DEFAULT '1' NOT NULL, PRIMARY KEY (id_reg)) AUTO_INCREMENT = 11 DEFAULT CHARSET = latin1;
CREATE TABLE kh_reserv (id_resev int(11) NOT NULL AUTO_INCREMENT, avance varchar(255) NOT NULL, kh_user_id int(11) NOT NULL, user_reserv_id int(11) NOT NULL, statut int(1) DEFAULT '1' NOT NULL, messages varchar(100), PRIMARY KEY (id_resev)) AUTO_INCREMENT = 7 DEFAULT CHARSET = latin1;
CREATE TABLE kh_secto (id_secto int(11) NOT NULL AUTO_INCREMENT, nom_secto varchar(255) NOT NULL, longitude int(11), latitude int(11), statut int(1) DEFAULT '1' NOT NULL, kh_kwata_id int(11) NOT NULL, PRIMARY KEY (id_secto)) AUTO_INCREMENT = 48 DEFAULT CHARSET = latin1;
CREATE TABLE kh_services (id_service int(11) NOT NULL AUTO_INCREMENT, libelle varchar(255) NOT NULL, statut int(1) DEFAULT '1' NOT NULL, PRIMARY KEY (id_service)) AUTO_INCREMENT = 24 DEFAULT CHARSET = latin1;
CREATE TABLE kh_state (id_state int(11) NOT NULL AUTO_INCREMENT, contenu text NOT NULL, `date` datetime NOT NULL, statut int(1) DEFAULT '1' NOT NULL, kh_user_id int(11) NOT NULL, PRIMARY KEY (id_state)) AUTO_INCREMENT = 6 DEFAULT CHARSET = latin1;
CREATE TABLE kh_user (id_user int(11) NOT NULL AUTO_INCREMENT, nom_user varchar(20), prenom varchar(30), pseudo varchar(25), telephone int(15), password varchar(255), email varchar(50), secto varchar(45) NOT NULL, type_user int(1) DEFAULT '1', type_compte int(1) DEFAULT '1', statut int(1) DEFAULT '1', avatar varchar(255) DEFAULT 'avatar.png', langue varchar(15), activites varchar(255), main_oeuvre decimal(10, 0), kh_kwata_id int(11), kh_metier_id int(11), statut_chat int(11), PRIMARY KEY (id_user)) AUTO_INCREMENT = 942 DEFAULT CHARSET = latin1;
CREATE TABLE kh_vedette (id_vedette int(11) NOT NULL AUTO_INCREMENT, titre varchar(75), texte text, image varchar(50), statut int(2) DEFAULT '0' NOT NULL, PRIMARY KEY (id_vedette)) AUTO_INCREMENT = 7 DEFAULT CHARSET = latin1;
CREATE TABLE kh_yamo (id_yamo int(11) NOT NULL AUTO_INCREMENT, kh_user_id int(11) NOT NULL, kh_messag_id int(11), kh_newkh_id int(11), user_yamo_id int(11), PRIMARY KEY (id_yamo)) AUTO_INCREMENT = 24 DEFAULT CHARSET = latin1;
CREATE TABLE kh_ami (kh_user_id int(11) NOT NULL, user_ami_id int(11) NOT NULL, PRIMARY KEY (kh_user_id, user_ami_id));
CREATE TABLE kh_favori (kh_user_id int(11) NOT NULL, user_fav_id int(11) NOT NULL, PRIMARY KEY (kh_user_id, user_fav_id));
CREATE TABLE kh_abon (kh_user_id int(11) NOT NULL, user_kwata_id int(11) NOT NULL, PRIMARY KEY (kh_user_id, user_kwata_id));
CREATE TABLE kh_abus (id_abus int(11) NOT NULL AUTO_INCREMENT, kh_user_id int(11) NOT NULL, messag varchar(255), kh_newkh_id int(11), kh_pub_id int(11), PRIMARY KEY (id_abus), INDEX (id_abus));
CREATE INDEX fk_kh_city_kh_reg1_idx ON kh_city (kh_reg_id);
CREATE INDEX fk_kh_kwata_kh_city1_idx ON kh_kwata (kh_city_id);
CREATE INDEX fk_kh_messag_kh_user1_idx ON kh_messag (kh_user_id);
CREATE INDEX user_messag_id ON kh_messag (user_messag_id);
CREATE INDEX fk_kh_metier_kh_services1_idx ON kh_metier (kh_services_id);
CREATE INDEX fk_kh_newkh_kh_kwata1_idx ON kh_newkh (kh_kwata_id);
CREATE INDEX kh_user_id ON kh_newkh (kh_user_id);
CREATE INDEX fk_kh_notif_kh_user1_idx ON kh_notif (kh_user_id);
CREATE INDEX fk_kh_recom_kh_user1_idx ON kh_recom (kh_user_id);
CREATE INDEX fk_kh_recom_kh_user1_idx1 ON kh_recom (user_recom_id);
CREATE INDEX fk_kh_reserv_kh_user1_idx ON kh_reserv (kh_user_id);
CREATE INDEX user_reserv_id ON kh_reserv (user_reserv_id);
CREATE INDEX fk_kh_secto_kh_kwata1_idx ON kh_secto (kh_kwata_id);
CREATE INDEX fk_kh_state_kh_user1_idx ON kh_state (kh_user_id);
CREATE INDEX fk_kh_user_kh_kwata1_idx ON kh_user (kh_kwata_id);
CREATE INDEX fk_kh_yamo_kh_user1_idx ON kh_yamo (kh_user_id);
CREATE INDEX fk_kh_yamo_kh_messag1_idx ON kh_yamo (kh_messag_id);
CREATE INDEX fk_kh_yamo_kh_newkh1_idx ON kh_yamo (kh_newkh_id);
CREATE INDEX fk_kh_yamo_kh_user2_idx ON kh_yamo (user_yamo_id);
ALTER TABLE kh_city ADD INDEX kh_city_ibfk_1 (kh_reg_id), ADD CONSTRAINT kh_city_ibfk_1 FOREIGN KEY (kh_reg_id) REFERENCES kh_reg (id_reg) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_kwata ADD INDEX kh_kwata_ibfk_1 (kh_city_id), ADD CONSTRAINT kh_kwata_ibfk_1 FOREIGN KEY (kh_city_id) REFERENCES kh_city (id_city) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_messag ADD INDEX kh_messag_ibfk_1 (kh_user_id), ADD CONSTRAINT kh_messag_ibfk_1 FOREIGN KEY (kh_user_id) REFERENCES kh_user (id_user) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_messag ADD INDEX kh_messag_ibfk_2 (user_messag_id), ADD CONSTRAINT kh_messag_ibfk_2 FOREIGN KEY (user_messag_id) REFERENCES kh_user (id_user) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_metier ADD INDEX kh_metier_ibfk_1 (kh_services_id), ADD CONSTRAINT kh_metier_ibfk_1 FOREIGN KEY (kh_services_id) REFERENCES kh_services (id_service) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_notif ADD INDEX kh_notif_ibfk_1 (kh_user_id), ADD CONSTRAINT kh_notif_ibfk_1 FOREIGN KEY (kh_user_id) REFERENCES kh_user (id_user) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_recom ADD INDEX kh_recom_ibfk_1 (kh_user_id), ADD CONSTRAINT kh_recom_ibfk_1 FOREIGN KEY (kh_user_id) REFERENCES kh_user (id_user) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_recom ADD INDEX fk_kh_recom_kh_user1 (user_recom_id), ADD CONSTRAINT fk_kh_recom_kh_user1 FOREIGN KEY (user_recom_id) REFERENCES kh_user (id_user) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_reserv ADD INDEX kh_reserv_ibfk_1 (user_reserv_id), ADD CONSTRAINT kh_reserv_ibfk_1 FOREIGN KEY (user_reserv_id) REFERENCES kh_user (id_user) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_reserv ADD INDEX kh_reserv_ibfk_2 (kh_user_id), ADD CONSTRAINT kh_reserv_ibfk_2 FOREIGN KEY (kh_user_id) REFERENCES kh_user (id_user) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_secto ADD INDEX kh_secto_ibfk_1 (kh_kwata_id), ADD CONSTRAINT kh_secto_ibfk_1 FOREIGN KEY (kh_kwata_id) REFERENCES kh_kwata (id_kwata) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_state ADD INDEX kh_state_ibfk_1 (kh_user_id), ADD CONSTRAINT kh_state_ibfk_1 FOREIGN KEY (kh_user_id) REFERENCES kh_user (id_user) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_user ADD INDEX fk_kh_user_kh_kwata1 (kh_kwata_id), ADD CONSTRAINT fk_kh_user_kh_kwata1 FOREIGN KEY (kh_kwata_id) REFERENCES kh_kwata (id_kwata) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_yamo ADD INDEX fk_kh_yamo_kh_user1 (kh_user_id), ADD CONSTRAINT fk_kh_yamo_kh_user1 FOREIGN KEY (kh_user_id) REFERENCES kh_user (id_user) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_yamo ADD INDEX fk_kh_yamo_kh_messag1 (kh_messag_id), ADD CONSTRAINT fk_kh_yamo_kh_messag1 FOREIGN KEY (kh_messag_id) REFERENCES kh_messag (id_messag) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_yamo ADD INDEX fk_kh_yamo_kh_newkh1 (kh_newkh_id), ADD CONSTRAINT fk_kh_yamo_kh_newkh1 FOREIGN KEY (kh_newkh_id) REFERENCES kh_newkh (id_newkh) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_yamo ADD INDEX fk_kh_yamo_kh_user2 (user_yamo_id), ADD CONSTRAINT fk_kh_yamo_kh_user2 FOREIGN KEY (user_yamo_id) REFERENCES kh_user (id_user) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE kh_pub ADD INDEX FKkh_pub281954 (kh_kwata_id), ADD CONSTRAINT FKkh_pub281954 FOREIGN KEY (kh_kwata_id) REFERENCES kh_kwata (id_kwata);
ALTER TABLE kh_ami ADD INDEX FKkh_ami96829 (kh_user_id), ADD CONSTRAINT FKkh_ami96829 FOREIGN KEY (kh_user_id) REFERENCES kh_user (id_user);
ALTER TABLE kh_ami ADD INDEX FKkh_ami511488 (user_ami_id), ADD CONSTRAINT FKkh_ami511488 FOREIGN KEY (user_ami_id) REFERENCES kh_user (id_user);
ALTER TABLE kh_favori ADD INDEX FKkh_favori920203 (user_fav_id), ADD CONSTRAINT FKkh_favori920203 FOREIGN KEY (user_fav_id) REFERENCES kh_user (id_user);
ALTER TABLE kh_user ADD INDEX FKkh_user883063 (kh_metier_id), ADD CONSTRAINT FKkh_user883063 FOREIGN KEY (kh_metier_id) REFERENCES kh_metier (id_metier);
ALTER TABLE kh_favori ADD INDEX FKkh_favori956462 (kh_user_id), ADD CONSTRAINT FKkh_favori956462 FOREIGN KEY (kh_user_id) REFERENCES kh_user (id_user);
ALTER TABLE kh_abon ADD INDEX FKkh_abon621626 (kh_user_id), ADD CONSTRAINT FKkh_abon621626 FOREIGN KEY (kh_user_id) REFERENCES kh_user (id_user);
ALTER TABLE kh_abon ADD INDEX FKkh_abon608985 (user_kwata_id), ADD CONSTRAINT FKkh_abon608985 FOREIGN KEY (user_kwata_id) REFERENCES kh_kwata (id_kwata);
ALTER TABLE kh_abus ADD INDEX FKkh_abus621435 (kh_user_id), ADD CONSTRAINT FKkh_abus621435 FOREIGN KEY (kh_user_id) REFERENCES kh_user (id_user);
ALTER TABLE kh_abus ADD INDEX FKkh_abus289060 (kh_newkh_id), ADD CONSTRAINT FKkh_abus289060 FOREIGN KEY (kh_newkh_id) REFERENCES kh_newkh (id_newkh);
ALTER TABLE kh_abus ADD INDEX FKkh_abus889996 (kh_pub_id), ADD CONSTRAINT FKkh_abus889996 FOREIGN KEY (kh_pub_id) REFERENCES kh_pub (id_pub);