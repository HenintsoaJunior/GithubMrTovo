-- Centres
INSERT INTO centres (nom) VALUES
('ADM/DIST'),
('Entrepot'),
('Centre de Stockage');

-- Unités
INSERT INTO unites (unite) VALUES 
('Cons periodique'),
('KG'),
('KW'),
('NB'),
('Heures de travail (HT)'),
('Sal mens ou HT');

-- Groupes
INSERT INTO groupes (nom_groupe) VALUES 
('Frais de production'),
('Frais administratifs'),
('Frais de personnel'),
('Frais entretien'),
('Frais de transport et logistique'),
('Frais de marketing et communication'),
('Frais financiers'),
('Frais de conformité et d’environnement');

-- Natures de charges
INSERT INTO nature_charges (nature) VALUES
('Fixe'),
('Variable');

-- Types de charges
INSERT INTO type_charges (charge) VALUES
('Charge incorporable'),
('Charge non incorporable');

-- Insertion condensée des charges pour les frais de production
INSERT INTO charges (charge, id_groupe, id_unite, id_type_charge,id_nature_charge)
VALUES
-- Achat de nouveaux poissons
('Achat de nouveaux poissons', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'),
 (SELECT id_unite FROM unites WHERE unite = 'NB'),
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'),
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge incorporable')),

-- Achat de bassins
('Achat de bassins', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'),
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'),
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge incorporable')),

-- Achat de filets
('Achat de filets', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'),
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'),
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge incorporable')),

-- Systèmes de refrigeration
('Systèmes de refrigeration', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'),
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'),
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge incorporable')),

-- Systèmes d’aération
('Systèmes d’aération', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'),
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'),
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge incorporable')),

-- Systèmes d’oxygénation
('Systèmes d’oxygénation', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'),
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'),
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge incorporable')),

-- Nourriture pour poissons
('Nourriture pour poissons', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'),
 (SELECT id_unite FROM unites WHERE unite = 'KG'),
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'),
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge incorporable')),

-- Nettoyage des bassins
('Nettoyage des bassins', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'),
 (SELECT id_unite FROM unites WHERE unite = 'Heures de travail (HT)'),
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'),
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge incorporable')),

-- Achat de filtres
('Achat de filtres', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'),
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'),
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge incorporable')),

-- Produits chimiques
('Produits chimiques', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'),
 (SELECT id_unite FROM unites WHERE unite = 'KG'),
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'),
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge incorporable')),

-- Électricité
('Électricité', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de production'),
 (SELECT id_unite FROM unites WHERE unite = 'KW'),
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'),
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge incorporable'));




-- Insérer les charges pour les rubriques "Frais administratifs"
INSERT INTO charges (charge, id_groupe, id_unite, id_nature_charge, id_type_charge)
VALUES
('Salaire gestionnaire', 
  (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), 
  (SELECT id_unite FROM unites WHERE unite = 'Sal mens ou HT'),
  (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
  (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge incorporable')),

('Assurances', 
  (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), 
  (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'),
  (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
  (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Loyer', 
  (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), 
  (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'),
  (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
  (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Ordinateur', 
  (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), 
  (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'),
  (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
  (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Telephone', 
  (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), 
  (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'),
  (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
  (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Connexion Internet', 
  (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), 
  (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'),
  (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
  (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Permis', 
  (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), 
  (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'),
  (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
  (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Impôts', 
  (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), 
  (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'),
  (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
  (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Services juridiques',
  (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais administratifs'), 
  (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'),
  (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'),
  (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable'));




-- Frais personnel
INSERT INTO charges (charge, id_groupe, id_unite, id_nature_charge, id_type_charge) VALUES 
('Salaire',
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de personnel'), 
 (SELECT id_unite FROM unites WHERE unite = 'Sal mens ou HT'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge incorporable')),

('Charges sociales',
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de personnel'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Primes et bonus',
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de personnel'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Équipements et uniformes',
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de personnel'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable'));


-- Frais d'entretien
INSERT INTO charges (charge, id_groupe, id_unite, id_nature_charge, id_type_charge) VALUES 
('Formation du personnel technique', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais entretien'), 
 (SELECT id_unite FROM unites WHERE unite = 'Heures de travail (HT)'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Audit et inspection régulière', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais entretien'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Énergie et consommables', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais entretien'), 
 (SELECT id_unite FROM unites WHERE unite = 'KW'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Mise à jour des systèmes technologiques', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais entretien'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Réserve pour urgences', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais entretien'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable'));


-- Frais de transport et logistique
INSERT INTO charges (charge, id_groupe, id_unite, id_nature_charge, id_type_charge) VALUES 
('Transport des poissons', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de transport et logistique'), 
 (SELECT id_unite FROM unites WHERE unite = 'NB'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Achat de nourriture', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de transport et logistique'), 
 (SELECT id_unite FROM unites WHERE unite = 'KG'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Frais de carburant et véhicules', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de transport et logistique'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Gestion des stocks et entrepôts', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de transport et logistique'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Coût de main-d’œuvre logistique', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de transport et logistique'), 
 (SELECT id_unite FROM unites WHERE unite = 'Heures de travail (HT)'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable'));


-- Frais de marketing et communication
INSERT INTO charges (charge, id_groupe, id_unite, id_nature_charge, id_type_charge) VALUES 
('Publicité', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de marketing et communication'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Site web et réseaux sociaux', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de marketing et communication'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Packaging et étiquetage', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de marketing et communication'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Événements et partenariats', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de marketing et communication'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Campagnes de marketing digital', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de marketing et communication'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable'));


-- Frais financiers
INSERT INTO charges (charge, id_groupe, id_unite, id_nature_charge, id_type_charge) VALUES 
('Intérêts sur prêts', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais financiers'), 
 (SELECT id_unite FROM unites WHERE unite = 'Sal mens ou HT'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Frais bancaires', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais financiers'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Coût de crédit', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais financiers'), 
 (SELECT id_unite FROM unites WHERE unite = 'Sal mens ou HT'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Frais d’emprunt', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais financiers'), 
 (SELECT id_unite FROM unites WHERE unite = 'Sal mens ou HT'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Commissions bancaires', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais financiers'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable'));

-- Frais de conformité et d'environnement
INSERT INTO charges (charge, id_groupe, id_unite, id_nature_charge, id_type_charge) VALUES 
('Permis et certifications', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de conformité et d’environnement'), 
 (SELECT id_unite FROM unites WHERE unite = 'Sal mens ou HT'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Contrôles environnementaux', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de conformité et d’environnement'), 
 (SELECT id_unite FROM unites WHERE unite = 'Heures de travail (HT)'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Études d’impact', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de conformité et d’environnement'), 
 (SELECT id_unite FROM unites WHERE unite = 'Heures de travail (HT)'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Variable'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Frais de tests', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de conformité et d’environnement'), 
 (SELECT id_unite FROM unites WHERE unite = 'Cons periodique'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable')),

('Frais de conformité légale', 
 (SELECT id_groupe FROM groupes WHERE nom_groupe = 'Frais de conformité et d’environnement'), 
 (SELECT id_unite FROM unites WHERE unite = 'Sal mens ou HT'), 
 (SELECT id_nature_charge FROM nature_charges WHERE nature = 'Fixe'), 
 (SELECT id_type_charge FROM type_charges WHERE charge = 'Charge non incorporable'));

