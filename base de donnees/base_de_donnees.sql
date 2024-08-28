drop database if exists gestion_stagiaire;
create database if not exists gestion_stagiaire;
use gestion_stagiaire;

create table stagiaire(
    idStagiaire int(4) auto_increment primary key,
    nom varchar(50),
    prenom varchar(50),
    civilite varchar(1),
    photo varchar(100),
    idFiliere int(4)
);

create table filiere(
    idFiliere int(4) auto_increment primary key,
    nomFiliere varchar(50),
    niveau varchar(50)
);

create table utilisateur(
    iduser int(4) auto_increment primary key,
    login varchar(50),
    email varchar(255),
    role varchar(50),   -- admin ou visiteur
    etat int(1),        -- 1:activé 0:desactivé
    pwd varchar(255)
);

Alter table stagiaire add constraint 
    foreign key(idFiliere) references filiere(idFiliere);

INSERT INTO filiere(nomFiliere,niveau) VALUES
	('TSDI','TS'),
	('TSGE','TS'),
	('TGI','T'),
	('TSRI','TS'),
	('TCE','T');	
	
	
INSERT INTO utilisateur(login,email,role,etat,pwd) VALUES 
    ('admin','admin@gmail.com','ADMIN',1,md5('123')),
    ('user1','user1@gmail.com','VISITEUR',0,md5('123')),
    ('user2','user2@gmail.com','VISITEUR',1,md5('123'));	

INSERT INTO stagiaire(nom,prenom,civilite,photo,idFiliere) VALUES
    ('Fall','Mohamed','M','image1.jpg',1),
	('Sy','Omar','M','image2.jpg',2),
	('Diop','Aminata','F','image3.jpg',3),
	('Wade','Fatou','F','image4.png',1),
	('Ba','Assane','M','image5.jpg',2),
	('Gueye','Daouda','M','image6.jpg',3),
    
     ('Fall','Mohamed','M','image1.jpg',1),
	('Sy','Omar','M','image2.jpg',2),
	('Diop','Aminata','F','image3.jpg',3),
	('Wade','Fatou','F','image4.png',1),
	('Ba','Assane','M','image5.jpg',2),
	('Gueye','Daouda','M','image6.jpg',3),
    
    ('Fall','Mohamed','M','image1.jpg',1),
	('Sy','Omar','M','image2.jpg',2),
	('Diop','Aminata','F','image3.jpg',3),
	('Wade','Fatou','F','image4.png',1),
	('Ba','Assane','M','image5.jpg',2),
	('Gueye','Daouda','M','image6.jpg',3);
    
  

select * from filiere;
select * from stagiaire;
select * from utilisateur;
