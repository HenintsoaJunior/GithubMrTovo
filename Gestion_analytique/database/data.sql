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
('Frais de production'),
('Frais administratifs'),
('Frais de personnel'),
('Frais entretien'),
('Frais de transport et logistique'),
('Frais de marketing et communication'),
('Frais financiers'),
('Frais de conformité et d’environnement');





-- Insérer les rubriques avec des unités appropriées
INSERT INTO Rubriques(nom, id_groupe, id_unite) VALUES
('Achat de nouveaux poissons', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'), (SELECT id_unite FROM unites WHERE unite = 'NB')),
('Achat de bassins', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Achat de filets', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Systèmes d’aération', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Systèmes de refrigeration', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Systèmes d’oxygénation', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Nourriture pour poissons', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'), (SELECT id_unite FROM unites WHERE unite = 'KG')),
('Nettoyage des bassins', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'), (SELECT id_unite FROM unites WHERE unite = 'Heures de travail (HT)')),
('Achat de filtres', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Produits chimiques', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'), (SELECT id_unite FROM unites WHERE unite = 'KG')),
('Électricité', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'), (SELECT id_unite FROM unites WHERE unite = 'KW'));


-- Insérer les rubriques pour les frais administratifs avec des sous-catégories
INSERT INTO Rubriques(nom, id_groupe, id_unite) VALUES
('Salaire gestionnaire', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), (SELECT id_unite FROM unites WHERE unite = 'Sal mens ou HT')),
('Assurances', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Loyer', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Ordinateur', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Telephone', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Connexion Internet', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Permis', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Impôts', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Services juridiques', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'));


-- Insérer les rubriques pour les frais de personnel avec des sous-catégories
INSERT INTO Rubriques(nom, id_groupe, id_unite) VALUES
('Salaire', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de personnel'), (SELECT id_unite FROM unites WHERE unite = 'Sal mens ou HT')),
('Charges sociales', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de personnel'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Primes et bonus', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de personnel'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Équipements et uniformes', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de personnel'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'));



-- Frais d'entretien
INSERT INTO Rubriques(nom, id_groupe, id_unite) VALUES
('Formation du personnel technique', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais entretien'), (SELECT id_unite FROM unites WHERE unite = 'Heures de travail (HT)')),
('Audit et inspection régulière', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais entretien'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Énergie et consommables', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais entretien'), (SELECT id_unite FROM unites WHERE unite = 'KW')),
('Mise à jour des systèmes technologiques', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais entretien'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Réserve pour urgences', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais entretien'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'));


-- Frais de transport et logistique
INSERT INTO Rubriques(nom, id_groupe, id_unite) VALUES
('Transport des poissons', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de transport et logistique'), (SELECT id_unite FROM unites WHERE unite = 'NB')),
('Achat de nourriture', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de transport et logistique'), (SELECT id_unite FROM unites WHERE unite = 'KG')),
('Frais de carburant et véhicules', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de transport et logistique'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Gestion des stocks et entrepôts', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de transport et logistique'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Coût de main-d’œuvre logistique', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de transport et logistique'), (SELECT id_unite FROM unites WHERE unite = 'Heures de travail (HT)'));

-- Frais de marketing et communication
INSERT INTO Rubriques(nom, id_groupe, id_unite) VALUES
('Publicité', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de marketing et communication'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Site web et réseaux sociaux', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de marketing et communication'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Packaging et étiquetage', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de marketing et communication'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Événements et partenariats', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de marketing et communication'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique')),
('Campagnes de marketing digital', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de marketing et communication'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'));



-- Rubriques pour "Frais financiers"
INSERT INTO Rubriques (nom, id_groupe, id_unite) 
VALUES ('Intérêts sur prêts', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais financiers'), (SELECT id_unite FROM unites WHERE unite = 'Sal mens ou HT'));

INSERT INTO Rubriques (nom, id_groupe, id_unite) 
VALUES ('Frais bancaires', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais financiers'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'));

INSERT INTO Rubriques (nom, id_groupe, id_unite) 
VALUES ('Coût de crédit', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais financiers'), (SELECT id_unite FROM unites WHERE unite = 'Sal mens ou HT'));

INSERT INTO Rubriques (nom, id_groupe, id_unite) 
VALUES ('Frais d’emprunt', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais financiers'), (SELECT id_unite FROM unites WHERE unite = 'Sal mens ou HT'));

INSERT INTO Rubriques (nom, id_groupe, id_unite) 
VALUES ('Commissions bancaires', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais financiers'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'));




-- Rubriques pour "Frais de conformité et d'environnement"
INSERT INTO Rubriques (nom, id_groupe, id_unite) 
VALUES ('Permis et certifications', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de conformité et d’environnement'), (SELECT id_unite FROM unites WHERE unite = 'Sal mens ou HT'));

INSERT INTO Rubriques (nom, id_groupe, id_unite) 
VALUES ('Contrôles environnementaux', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de conformité et d’environnement'), (SELECT id_unite FROM unites WHERE unite = 'Heures de travail (HT)'));

INSERT INTO Rubriques (nom, id_groupe, id_unite) 
VALUES ('Études d’impact', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de conformité et d’environnement'), (SELECT id_unite FROM unites WHERE unite = 'Heures de travail (HT)'));

INSERT INTO Rubriques (nom, id_groupe, id_unite) 
VALUES ('Frais de tests', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de conformité et d’environnement'), (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'));

INSERT INTO Rubriques (nom, id_groupe, id_unite) 
VALUES ('Frais de conformité légale', (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de conformité et d’environnement'), (SELECT id_unite FROM unites WHERE unite = 'Sal mens ou HT'));


-- Frais de production
-- Achat de nouveaux poissons - Charge Variable
INSERT INTO charges (nature, id_rubrique)
VALUES ('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Achat de nouveaux poissons'));

-- Achat de bassins - Charge Fixe
INSERT INTO charges (nature, id_rubrique)
VALUES ('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Achat de bassins'));

-- Achat de filets - Charge Fixe
INSERT INTO charges (nature, id_rubrique)
VALUES ('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Achat de filets'));

-- Systèmes de refrigeration - Charge Fixe
INSERT INTO charges (nature, id_rubrique)
VALUES ('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Systèmes de refrigeration'));

-- Systèmes d’aération - Charge Fixe
INSERT INTO charges (nature, id_rubrique)
VALUES ('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Systèmes d’aération'));

-- Systèmes d’oxygénation - Charge Fixe
INSERT INTO charges (nature, id_rubrique)
VALUES ('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Systèmes d’oxygénation'));

-- Nourriture pour poissons - Charge Variable
INSERT INTO charges (nature, id_rubrique)
VALUES ('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Nourriture pour poissons'));

-- Nettoyage des bassins - Charge Variable
INSERT INTO charges (nature, id_rubrique)
VALUES ('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Nettoyage des bassins'));

-- Achat de filtres - Charge Fixe
INSERT INTO charges (nature, id_rubrique)
VALUES ('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Achat de filtres'));

-- Produits chimiques - Charge Variable
INSERT INTO charges (nature, id_rubrique)
VALUES ('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Produits chimiques'));

-- Électricité - Charge Variable
INSERT INTO charges (nature, id_rubrique)
VALUES ('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Électricité'));





-- Frais de production avec montant et date
INSERT INTO Mouvement_Charge_Centre (id_centre, id_charge, montant, date_charge)
VALUES 
((SELECT id_centre FROM centres WHERE nom = 'Entrepot'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Achat de nouveaux poissons')), 20000000.00, '2023-01-01'),
((SELECT id_centre FROM centres WHERE nom = 'Entrepot'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Achat de bassins')), 500000000.00, '2023-01-02'),
((SELECT id_centre FROM centres WHERE nom = 'Entrepot'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Achat de filets')), 30000000.00, '2023-01-03'),
((SELECT id_centre FROM centres WHERE nom = 'Entrepot'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Systèmes d’aération')), 40000000.00, '2023-01-04'),
((SELECT id_centre FROM centres WHERE nom = 'Entrepot'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Systèmes d’oxygénation')), 45000000.00, '2023-01-05'),
((SELECT id_centre FROM centres WHERE nom = 'Entrepot'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Nourriture pour poissons')), 15000000.00, '2023-01-06'),
((SELECT id_centre FROM centres WHERE nom = 'Entrepot'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Nettoyage des bassins')), 5000000.00, '2023-01-07'),
((SELECT id_centre FROM centres WHERE nom = 'Entrepot'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Achat de filtres')), 10000000.00, '2023-01-08'),
((SELECT id_centre FROM centres WHERE nom = 'Entrepot'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Produits chimiques')), 7000000.00, '2023-01-09'),
((SELECT id_centre FROM centres WHERE nom = 'Entrepot'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Électricité')), 3000000.00, '2023-01-10'),
((SELECT id_centre FROM centres WHERE nom = 'Centre de Stoquage'),
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Systèmes d’aération')), 40000000.00, '2023-01-04'),
((SELECT id_centre FROM centres WHERE nom = 'Centre de Stoquage'),
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Systèmes de refrigeration')), 45000000.00, '2023-01-05'),
((SELECT id_centre FROM centres WHERE nom = 'Centre de Stoquage'),
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Électricité')), 5000000.00, '2023-01-10');




-- Frais administratifs
INSERT INTO charges (nature, id_rubrique)
VALUES 
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Salaire gestionnaire')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Assurances')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Loyer')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Ordinateur')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Telephone')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Connexion Internet')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Permis')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Services juridiques')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Impôts'));



-- Frais administratifs avec montant et date
INSERT INTO Mouvement_Charge_Centre (id_centre, id_charge, montant, date_charge)
VALUES 
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Salaire gestionnaire')), 25000000.00, '2023-02-01'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Assurances')), 10000000.00, '2023-02-02'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Loyer')), 12000000.00, '2023-02-03'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Ordinateur')), 4000000.00, '2023-02-04'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Telephone')), 2000000.00, '2023-02-05'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Connexion Internet')), 300000.00, '2023-02-06'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Permis')), 1000000.00, '2023-02-07'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Services juridiques')), 5000000.00, '2023-02-08'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Impôts')), 6000000.00, '2023-02-09');





-- Frais personnel
INSERT INTO charges (nature, id_rubrique)
VALUES 
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Salaire')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Charges sociales')),
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Primes et bonus')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Équipements et uniformes'));


-- Frais personnel avec montant et date
INSERT INTO Mouvement_Charge_Centre (id_centre, id_charge, montant, date_charge)
VALUES 
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Salaire')), 8000000.00, '2023-03-01'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Charges sociales')), 3000000.00, '2023-03-02'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Primes et bonus')), 2000000.00, '2023-03-03'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Équipements et uniformes')), 5000000.00, '2023-03-04');


-- Frais d'entretien
INSERT INTO charges (nature, id_rubrique)
VALUES 
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Formation du personnel technique')),
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Audit et inspection régulière')),
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Énergie et consommables')),
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Mise à jour des systèmes technologiques')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Réserve pour urgences'));


-- Frais d'entretien avec montant et date
INSERT INTO Mouvement_Charge_Centre (id_centre, id_charge, montant, date_charge)
VALUES 
((SELECT id_centre FROM centres WHERE nom = 'Centre de Stoquage'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Formation du personnel technique')), 20000000.00, '2023-04-01'),
((SELECT id_centre FROM centres WHERE nom = 'Centre de Stoquage'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Audit et inspection régulière')), 15000000.00, '2023-04-02'),
((SELECT id_centre FROM centres WHERE nom = 'Centre de Stoquage'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Énergie et consommables')), 10000000.00, '2023-04-03'),
((SELECT id_centre FROM centres WHERE nom = 'Centre de Stoquage'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Mise à jour des systèmes technologiques')), 12000000.00, '2023-04-04'),
((SELECT id_centre FROM centres WHERE nom = 'Centre de Stoquage'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Réserve pour urgences')), 5000000.00, '2023-04-05');



-- Frais de transport et logistique
INSERT INTO charges (nature, id_rubrique)
VALUES 
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Transport des poissons')),
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Achat de nourriture')),
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Frais de carburant et véhicules')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Gestion des stocks et entrepôts')),
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Coût de main-d’œuvre logistique'));


-- Frais de transport et logistique avec montant et date
INSERT INTO Mouvement_Charge_Centre (id_centre, id_charge, montant, date_charge)
VALUES 
((SELECT id_centre FROM centres WHERE nom = 'Entrepot'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Transport des poissons')), 4000000.00, '2023-05-01'),
((SELECT id_centre FROM centres WHERE nom = 'Entrepot'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Achat de nourriture')), 25000000.00, '2023-05-02'),
((SELECT id_centre FROM centres WHERE nom = 'Entrepot'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Frais de carburant et véhicules')), 20000000.00, '2023-05-03'),
 ((SELECT id_centre FROM centres WHERE nom = 'Centre de Stoquage'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Transport des poissons')), 30000000.00, '2023-05-01'),
((SELECT id_centre FROM centres WHERE nom = 'Centre de Stoquage'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Frais de carburant et véhicules')), 20000000.00, '2023-05-03'),
((SELECT id_centre FROM centres WHERE nom = 'Centre de Stoquage'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Gestion des stocks et entrepôts')), 15000000.00, '2023-05-04'),
((SELECT id_centre FROM centres WHERE nom = 'Centre de Stoquage'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Coût de main-d’œuvre logistique')), 10000000.00, '2023-05-05');



-- Frais de marketing et communication
INSERT INTO charges (nature, id_rubrique)
VALUES 
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Publicité')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Site web et réseaux sociaux')),
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Packaging et étiquetage')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Événements et partenariats')),
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Campagnes de marketing digital'));



-- Frais de marketing et communication avec montant et date
INSERT INTO Mouvement_Charge_Centre (id_centre, id_charge, montant, date_charge)
VALUES 
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Publicité')), 5000000.00, '2023-06-01'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Site web et réseaux sociaux')), 15000000.00, '2023-06-02'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Packaging et étiquetage')), 8000000.00, '2023-06-03'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Événements et partenariats')), 10000000.00, '2023-06-04'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Campagnes de marketing digital')), 12000000.00, '2023-06-05');



-- Frais financiers
INSERT INTO charges (nature, id_rubrique)
VALUES 
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Intérêts sur prêts')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Frais bancaires')),
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Coût de crédit')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Frais d’emprunt')),
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Commissions bancaires'));


-- Frais financiers avec montant et date
INSERT INTO Mouvement_Charge_Centre (id_centre, id_charge, montant, date_charge)
VALUES 
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Intérêts sur prêts')), 5000000.00, '2023-07-01'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Frais bancaires')), 100000.00, '2023-07-02'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Coût de crédit')), 200000.00, '2023-07-03'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Frais d’emprunt')), 3000000.00, '2023-07-04'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Commissions bancaires')), 50000.00, '2023-07-05');



-- Frais de conformité et d'environnement
INSERT INTO charges (nature, id_rubrique)
VALUES 
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Permis et certifications')),
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Contrôles environnementaux')),
('Variable', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Études d’impact')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Frais de tests')),
('Fixe', (SELECT id_rubrique FROM Rubriques WHERE nom = 'Frais de conformité légale'));


-- Frais de conformité et d'environnement avec montant et date
INSERT INTO Mouvement_Charge_Centre (id_centre, id_charge, montant, date_charge)
VALUES 
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Permis et certifications')), 200000.00, '2023-08-01'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Contrôles environnementaux')), 50000.00, '2023-08-02'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Études d’impact')), 150000.00, '2023-08-03'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Frais de tests')), 50000.00, '2023-08-04'),
((SELECT id_centre FROM centres WHERE nom = 'ADM/DIST'), 
 (SELECT id_charge FROM charges WHERE id_rubrique = (SELECT id_rubrique FROM Rubriques WHERE nom = 'Frais de conformité légale')), 100000.00, '2023-08-05');
