CREATE EXTENSION IF NOT EXISTS pgcrypto;

INSERT INTO admin (nom, password,status) 
VALUES 
('dax', crypt('123',gen_salt('bf')),'admin'),
('hentsa', crypt('123',gen_salt('bf')),'vente');



INSERT INTO centres (nom) VALUES
('ADM/DIST'),
('Entrepot'),
('Centre de Stoquage');


-- Insérer les différentes unités
INSERT INTO unites (unite) VALUES 
('Cons periodique'),
('KG'),
('KW'),
('NB'),
('Heures de travail (HT)'),
('Sal mens ou HT');


-- Insérer les groupes
INSERT INTO groupes (nom_groupe) VALUES 
('production'),
('administratifs'),
('financiers'),
('autres');

-- Natures de charges

INSERT INTO nature_charges (nature) VALUES
('Fixe'),
('Variable');

-- Types de charges
INSERT INTO type_charges (charge) VALUES
('Charge incorporable'),
('Charge non incorporable');


INSERT INTO Client (nom,Compte) VALUES
('Particulier','41112'),
('Divers','41100');


INSERT INTO type_produit (type) VALUES
('FIFO'),
('LIFO');

INSERT INTO Produit (produit,id_unite,prixvente,id_type_produit) VALUES
('Thilapia',(SELECT id_unite FROM unites WHERE unite = 'NB'),100.00,(SELECT id_type_produit FROM type_produit WHERE type = 'FIFO')),

INSERT INTO Fournisseur (nom,Compte) VALUES
('Fournisseur1','35000'),
('Fournisseur2','35000');



delete from Pro_Format_Charge;
delete from Pro_Format_Produit;
delete from bon_Reception;
delete from bon_Livraison;
delete from bon_Sortie;
delete from stock;
