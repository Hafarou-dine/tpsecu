create database tpsecu;
use tpsecu;

create table evenement(
    id_event int auto_increment primary key not null,
    nom_event varchar(50) not null,
    desc_event text not null,
    date_event datetime not null,
    id_type int not null
)Engine=InnoDB;

create table utilisateur(
	id_util int primary key auto_increment not null,
    name_util varchar(50) not null,
    first_name_util varchar(50) not null,
    mail_util varchar(50) not null,
	pwd_util varchar(100) not null,
    id_role int not null default 1,
    valide_util boolean not null default 0,
    token_util varchar(100) null
)Engine=InnoDB;

create table role(
	id_role int primary key auto_increment not null,
    name_role varchar(50) not null
)Engine=InnoDB;

create table type(
	id_type int primary key auto_increment not null,
    nom_type varchar(50) not null
)Engine=InnoDB;

alter table utilisateur
add constraint fk_attribuer_role
foreign key(id_role)
references role(id_role);

alter table evenement
add constraint fk_affecter_type
foreign key(id_type)
references type(id_type);

insert into role(name_role) values
("Utilisateur"), ("Administrateur");

insert into type(nom_type) values
("Sportif"), ("Culturel");

-- insertion d'un utilisateur admin
insert into utilisateur(name_util, first_name_util, mail_util, pwd_util, id_role, valide_util)
values ("Dupont", "Martin", "martin@gmail.com", "$2y$12$axDfahnbU9gpb7R/2njKReeHzI6Oyr.hNDVfVVVSO2lXBQbolN/ze", 2, 1); -- mdp = DBM963lmf!

-- use test;
-- drop database tpsecu;