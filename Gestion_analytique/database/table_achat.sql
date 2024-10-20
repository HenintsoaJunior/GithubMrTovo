CREATE DATABASE gestion_analytique;
\c gestion_analytique;

CREATE TABLE exercices(
   id_exercice SERIAL,
   date_debut DATE,
   date_fin DATE,
   PRIMARY KEY(id_exercice)
);

CREATE TABLE centres(
   id_centre SERIAL,
   nom VARCHAR(50) ,
   PRIMARY KEY(id_centre)
);

CREATE TABLE unites(
   id_unite SERIAL,
   unite VARCHAR(50) ,
   PRIMARY KEY(id_unite)
);

CREATE TABLE groupes(
   id_groupe SERIAL,
   nom_groupe VARCHAR(50) ,
   PRIMARY KEY(id_groupe)
);

CREATE TABLE nature_charges(
   id_nature_charge SERIAL,
   nature VARCHAR(50) ,
   PRIMARY KEY(id_nature_charge)
);

CREATE TABLE type_charges(
   id_type_charge SERIAL,
   charge VARCHAR(50) ,
   PRIMARY KEY(id_type_charge)
);


CREATE TABLE charges(
   id_charge SERIAL,
   charge VARCHAR(50) ,
   montant_total NUMERIC(15,2)  ,
   id_exercice INTEGER NOT NULL,
   id_groupe INTEGER NOT NULL,
   id_unite INTEGER NOT NULL,
   id_type_charge INTEGER NOT NULL,
   id_nature_charge INTEGER NOT NULL,
   PRIMARY KEY(id_charge),
   FOREIGN KEY(id_groupe) REFERENCES groupes(id_groupe),
   FOREIGN KEY(id_unite) REFERENCES unites(id_unite),
   FOREIGN KEY(id_type_charge) REFERENCES type_charges(id_type_charge),
   FOREIGN KEY(id_nature_charge) REFERENCES nature_charges(id_nature_charge),
   FOREIGN KEY(id_exercice) REFERENCES exercices(id_exercice)
);

CREATE TABLE amortissements(
   id_amortissement_ SERIAL,
   duree_amortissement INTEGER,
   montant_annuel NUMERIC(15,2)  ,
   date_debut DATE,
   id_charge INTEGER NOT NULL,
   PRIMARY KEY(id_amortissement_),
   FOREIGN KEY(id_charge) REFERENCES charges(id_charge)
);

CREATE TABLE liaison_charge_centre(
   id_liaison SERIAL,
   id_centre INTEGER,
   id_charge INTEGER,
   pourcentage NUMERIC(15,2),
   PRIMARY KEY(id_liaison),
   FOREIGN KEY(id_centre) REFERENCES centres(id_centre),
   FOREIGN KEY(id_charge) REFERENCES charges(id_charge)
);

CREATE TABLE Client(
   id_Client SERIAL,
   nom VARCHAR(50),
   Compte VARCHAR(50),
   PRIMARY KEY(id_Client)
);

CREATE TABLE Fournisseur(
   id_Fournisseur SERIAL,
   nom VARCHAR(50),
   Compte VARCHAR(50),
   PRIMARY KEY(id_Fournisseur)
);


CREATE TABLE Pro_Format(
   id_Pf SERIAL,
   id_Fournisseur INTEGER,
   id_charge INTEGER,
   quantite INTEGER,
   date_livraison DATE,
   date_commande DATE,
   isValid Boolean,
   PRIMARY KEY(id_Pf),
   FOREIGN KEY (id_Fournisseur) REFERENCES Fournisseur(id_Fournisseur),
   FOREIGN KEY (id_charge) REFERENCES charges(id_charge)
);


CREATE TABLE bon_Reception(
   id_br SERIAL,
   id_Client INTEGER,
   id_charge INTEGER,
   quantite INTEGER,
   date_commande DATE,
   date_reception DATE,
   isValid Boolean,
   PRIMARY KEY(id_br),
   FOREIGN KEY (id_Client) REFERENCES Client(id_Client),
   FOREIGN KEY (id_charge) REFERENCES charges(id_charge)
);


CREATE TABLE bon_Livraison(
   id_BL SERIAL,
   id_br INTEGER,
   date_livraison DATE,
   PRIMARY KEY(id_BL),
   FOREIGN KEY(id_br) REFERENCES bon_Reception(id_br)
);

CREATE TABLE bon_Sortie(
   id_bs SERIAL,
   id_charge INTEGER,
   quantite INTEGER,
   date_sortie DATE,
   PRIMARY KEY(id_bs),
   FOREIGN KEY (id_charge) REFERENCES charges(id_charge)
);


