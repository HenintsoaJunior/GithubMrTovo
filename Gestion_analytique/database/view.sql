-- drop view v_total_general_repartition;
-- drop view v_repartition;
-- drop view v_total_general;
-- drop view v_total_montant_analytique;
-- drop view v_global_centre;
-- drop view v_total_rubrique;
-- drop view v_global;


CREATE OR REPLACE VIEW v_global AS
SELECT 
    ch.id_charge,
    ch.charge AS rubriques,
    u.unite,
    nc.id_nature_charge,
    nc.nature,
    tc.charge AS type_charges,
    ch.montant_total AS total,
    e.id_exercice,
    e.date_debut,
    e.date_fin,
    EXTRACT(YEAR FROM e.date_debut) AS annee
FROM charges ch
LEFT JOIN liaison_charge_centre mc ON ch.id_charge = mc.id_charge
LEFT JOIN centres c ON mc.id_centre = c.id_centre
LEFT JOIN nature_charges nc ON ch.id_nature_charge = nc.id_nature_charge
LEFT JOIN type_charges tc ON ch.id_type_charge = tc.id_type_charge
LEFT JOIN unites u ON ch.id_unite = u.id_unite
LEFT JOIN groupes g ON ch.id_groupe = g.id_groupe
LEFT JOIN exercices e ON ch.id_exercice = e.id_exercice
GROUP BY ch.id_charge, ch.charge, u.unite, nc.nature, nc.id_nature_charge, tc.charge, e.id_exercice, e.date_debut
HAVING SUM(ch.montant_total) IS NOT NULL;


CREATE OR REPLACE VIEW v_total_rubrique AS
SELECT
SUM(total) AS total_general
FROM v_global vg;


CREATE OR REPLACE VIEW v_global_centre AS
SELECT
    ch.id_charge,
    ch.charge AS rubriques,
    u.unite,
    nc.nature,
    c.nom AS centre,
    mc.pourcentage,
    vt.total,
    (mc.pourcentage / 100) * vt.total AS montant_calculé
FROM centres c
LEFT JOIN liaison_charge_centre mc ON c.id_centre = mc.id_centre
LEFT JOIN charges ch ON mc.id_charge = ch.id_charge
LEFT JOIN nature_charges nc ON ch.id_nature_charge = nc.id_nature_charge
LEFT JOIN unites u ON ch.id_unite = u.id_unite
LEFT JOIN groupes g ON ch.id_groupe = g.id_groupe
LEFT JOIN v_global vt ON ch.id_charge = vt.id_charge;



CREATE OR REPLACE VIEW v_total_montant_analytique AS
SELECT
    r.centre,
    SUM(CASE WHEN r.nature = 'Fixe' THEN r.montant_calculé ELSE 0 END) AS total_fixe,
    SUM(CASE WHEN r.nature = 'Variable' THEN r.montant_calculé ELSE 0 END) AS total_variable,
    SUM(CASE WHEN r.nature = 'Fixe' THEN r.montant_calculé ELSE 0 END) + SUM(CASE WHEN r.nature = 'Variable' THEN r.montant_calculé ELSE 0 END) AS total_centre
FROM
    v_global_centre r
GROUP BY r.centre
HAVING SUM(CASE WHEN r.nature = 'Fixe' THEN r.montant_calculé ELSE 0 END) + SUM(CASE WHEN r.nature = 'Variable' THEN r.montant_calculé ELSE 0 END) > 0;



CREATE OR REPLACE VIEW v_repartition AS
SELECT
    vt.centre,
    vt.total_centre as cout_direct,
    (vt.total_centre/calculer_total_general()) * 100 AS cle,
    (calculer_total_ADM_DIST()*(vt.total_centre/calculer_total_general()) * 100) AS adm_dist,
    (vt.total_centre+(calculer_total_ADM_DIST()*(vt.total_centre/calculer_total_general()) * 100)) as cout_total
FROM
    v_total_montant_analytique vt
GROUP BY vt.centre,vt.total_centre;


CREATE OR REPLACE VIEW v_total_general_repartition AS
SELECT
    SUM(vt.total_centre) as cout_direct,
    SUM(calculer_total_ADM_DIST()*(vt.total_centre/calculer_total_general()) * 100) AS adm_dist,
    SUM(vt.total_centre+(calculer_total_ADM_DIST()*(vt.total_centre/calculer_total_general()) * 100)) as cout_total
FROM
    v_total_montant_analytique vt;


-- drop view v_total_general_repartition;
-- drop view v_repartition;
-- drop view v_total_general;
-- drop view v_total_montant_analytique;
-- drop view v_global_centre;
-- drop view v_total_rubrique;
-- drop view v_global;


CREATE OR REPLACE VIEW v_global AS
SELECT 
    ch.id_charge,
    ch.charge AS rubriques,
    u.unite,
    nc.id_nature_charge,
    nc.nature,
    tc.charge AS type_charges,
    ch.montant_total AS total,
    e.id_exercice,
    e.date_debut,
    e.date_fin,
    EXTRACT(YEAR FROM e.date_debut) AS annee
FROM charges ch
LEFT JOIN liaison_charge_centre mc ON ch.id_charge = mc.id_charge
LEFT JOIN centres c ON mc.id_centre = c.id_centre
LEFT JOIN nature_charges nc ON ch.id_nature_charge = nc.id_nature_charge
LEFT JOIN type_charges tc ON ch.id_type_charge = tc.id_type_charge
LEFT JOIN unites u ON ch.id_unite = u.id_unite
LEFT JOIN groupes g ON ch.id_groupe = g.id_groupe
LEFT JOIN exercices e ON ch.id_exercice = e.id_exercice
GROUP BY ch.id_charge, ch.charge, u.unite, nc.nature, nc.id_nature_charge, tc.charge, e.id_exercice, e.date_debut
HAVING SUM(ch.montant_total) IS NOT NULL;


CREATE OR REPLACE VIEW v_total_rubrique AS
SELECT
SUM(total) AS total_general
FROM v_global vg;


CREATE OR REPLACE VIEW v_global_centre AS
SELECT
    ch.id_charge,
    ch.charge AS rubriques,
    u.unite,
    nc.nature,
    c.nom AS centre,
    mc.pourcentage,
    vt.total,
    (mc.pourcentage / 100) * vt.total AS montant_calculé
FROM centres c
LEFT JOIN liaison_charge_centre mc ON c.id_centre = mc.id_centre
LEFT JOIN charges ch ON mc.id_charge = ch.id_charge
LEFT JOIN nature_charges nc ON ch.id_nature_charge = nc.id_nature_charge
LEFT JOIN unites u ON ch.id_unite = u.id_unite
LEFT JOIN groupes g ON ch.id_groupe = g.id_groupe
LEFT JOIN v_global vt ON ch.id_charge = vt.id_charge;



CREATE OR REPLACE VIEW v_total_montant_analytique AS
SELECT
    r.centre,
    SUM(CASE WHEN r.nature = 'Fixe' THEN r.montant_calculé ELSE 0 END) AS total_fixe,
    SUM(CASE WHEN r.nature = 'Variable' THEN r.montant_calculé ELSE 0 END) AS total_variable,
    SUM(CASE WHEN r.nature = 'Fixe' THEN r.montant_calculé ELSE 0 END) + SUM(CASE WHEN r.nature = 'Variable' THEN r.montant_calculé ELSE 0 END) AS total_centre
FROM
    v_global_centre r
GROUP BY r.centre
HAVING SUM(CASE WHEN r.nature = 'Fixe' THEN r.montant_calculé ELSE 0 END) + SUM(CASE WHEN r.nature = 'Variable' THEN r.montant_calculé ELSE 0 END) > 0;



CREATE OR REPLACE VIEW v_repartition AS
SELECT
    vt.centre,
    vt.total_centre as cout_direct,
    (vt.total_centre/calculer_total_general()) * 100 AS cle,
    (calculer_total_ADM_DIST()*(vt.total_centre/calculer_total_general()) * 100) AS adm_dist,
    (vt.total_centre+(calculer_total_ADM_DIST()*(vt.total_centre/calculer_total_general()) * 100)) as cout_total
FROM
    v_total_montant_analytique vt
GROUP BY vt.centre,vt.total_centre;


CREATE OR REPLACE VIEW v_total_general_repartition AS
SELECT
    SUM(vt.total_centre) as cout_direct,
    SUM(calculer_total_ADM_DIST()*(vt.total_centre/calculer_total_general()) * 100) AS adm_dist,
    SUM(vt.total_centre+(calculer_total_ADM_DIST()*(vt.total_centre/calculer_total_general()) * 100)) as cout_total
FROM
    v_total_montant_analytique vt;


CREATE OR REPLACE VIEW v_seuil_rentabilite AS
SELECT
    ROUND(SUM(vg.total), 2) AS chiffres_affaires,  -- CA
    ROUND(SUM(CASE WHEN nc.nature = 'Variable' THEN (mc.pourcentage / 100) * vg.total ELSE 0 END), 2) AS cout_variable,  -- CV
    ROUND(SUM(CASE WHEN nc.nature = 'Fixe' THEN (mc.pourcentage / 100) * vg.total ELSE 0 END), 2) AS cout_fixe,  -- CF
    ROUND(SUM(vg.total) - SUM(CASE WHEN nc.nature = 'Variable' THEN (mc.pourcentage / 100) * vg.total ELSE 0 END), 2) AS marge_sur_cout_variable,  -- MCV = CA - CV
    ROUND(SUM(CASE WHEN nc.nature = 'Fixe' THEN (mc.pourcentage / 100) * vg.total ELSE 0 END), 2) AS seuil_rentabilite -- Seuil de rentabilité = MCV = CF
FROM
    v_global vg
LEFT JOIN liaison_charge_centre mc ON vg.id_charge = mc.id_charge
LEFT JOIN nature_charges nc ON vg.id_nature_charge = nc.id_nature_charge
GROUP BY vg.id_charge
HAVING SUM(CASE WHEN nc.nature = 'Fixe' THEN (mc.pourcentage / 100) * vg.total ELSE 0 END) > 0;


CREATE OR REPLACE VIEW v_quantite_produit_stock AS
SELECT
    pr.id_produit,
    pr.produit,
    SUM(COALESCE(s.debit - s.credit, 0)) AS quantite_dispo
FROM
    produit pr
LEFT JOIN stock s ON pr.id_produit = s.id_produit
GROUP BY
    pr.id_produit,
    pr.produit;



CREATE VIEW v_compta_sous_ecriture AS
SELECT
    pfc.id_Pf,
    f.nom AS fournisseur_nom,
    pfc.id_charge,
    pfc.quantite,
    pfc.date_livraison AS date_operation,
    c.charge as description,
    0 AS debit,
    c.montant_total AS credit
FROM 
    Pro_Format_Charge AS pfc
JOIN 
    charges AS c ON pfc.id_charge = c.id_charge
JOIN 
    Fournisseur AS f ON pfc.id_Fournisseur = f.id_Fournisseur
WHERE 
    pfc.isValid = TRUE

UNION ALL

SELECT
    br.id_br AS id_Pf,
    cl.nom AS fournisseur_nom,
    br.id_produit AS id_charge,
    br.quantite,
    br.date_reception AS date_operation,
    'Réception de produit' AS description,
    p.prixvente * br.quantite AS debit,
    0 AS credit
FROM
    bon_Reception AS br
JOIN
    Client AS cl ON br.id_Client = cl.id_Client
JOIN
    Produit AS p ON p.id_produit = br.id_produit
WHERE
    br.isValid = TRUE;


CREATE OR REPLACE VIEW v_produit_unite AS
SELECT
    pr.id_produit,
    pr.produit,
    u.unite
FROM
    produit pr
LEFT JOIN unites u ON pr.id_unite = u.id_unite


CREATE OR REPLACE VIEW v_charge_unite AS
SELECT
    ch.id_charge,
    ch.charge,
    u.unite
FROM
    charges ch
LEFT JOIN unites u ON ch.id_unite = u.id_unite



CREATE OR REPLACE VIEW vue_details_bon_reception AS
SELECT 
    br.id_br AS numero_bon_reception,
    c.nom AS nom_client,
    p.produit AS nom_produit,
    br.quantite AS quantite_produit,
    br.date_commande AS date_commande,
    br.date_reception AS date_reception,
    CASE 
        WHEN br.isValid THEN 'Validé'
        ELSE 'Non validé'
    END AS statut_bon_reception,
    p.prixvente AS prix_unitaire,
    (br.quantite * p.prixvente) AS total_prix,
    tp.type AS type_produit,  -- Ajout du type de produit
    u.unite AS unite_produit  -- Ajout de l'unité
FROM
    bon_Reception br
JOIN
    Client c ON br.id_Client = c.id_Client
JOIN
    produit p ON br.id_produit = p.id_produit
JOIN
    type_produit tp ON p.id_type_produit = tp.id_type_produit  -- Jointure pour récupérer le type de produit
JOIN
    unites u ON p.id_unite = u.id_unite;  -- Jointure pour récupérer l'unité




CREATE OR REPLACE VIEW v_proformat_produit_details AS
SELECT 
    pfp.id_Pf AS id_Format_Produit,
    f.nom AS fournisseur_nom,
    p.produit AS produit_nom,  -- Assurez-vous que le nom de la colonne est correct ici
    pfp.quantite AS quantite_produit,
    pfp.date_livraison AS date_livraison_produit,
    pfp.date_commande AS date_commande_produit,
    CASE 
        WHEN pfp.isValid THEN 'Valide'
        ELSE 'Non valide'
    END AS status_produit
FROM 
    Pro_Format_Produit pfp
LEFT JOIN 
    Fournisseur f ON pfp.id_Fournisseur = f.id_Fournisseur
LEFT JOIN 
    produit p ON pfp.id_produit = p.id_produit;


CREATE OR REPLACE VIEW v_proformat_charge_details AS
SELECT 
    pfc.id_Pf AS id_Format_Charge,
    f.nom AS fournisseur_nom,
    c.charge AS charge_nom,
    pfc.quantite AS quantite_charge,
    pfc.date_livraison AS date_livraison_charge,
    pfc.date_commande AS date_commande_charge,
    CASE 
        WHEN pfc.isValid THEN 'Valide'
        ELSE 'Non valide'
    END AS status_charge
FROM 
    Pro_Format_Charge pfc
LEFT JOIN 
    Fournisseur f ON pfc.id_Fournisseur = f.id_Fournisseur
LEFT JOIN 
    charges c ON pfc.id_charge = c.id_charge;



CREATE VIEW v_bon_livraison AS
SELECT 
    bl.id_BL AS id_bon_livraison,
    bl.date_livraison,
    br.id_Client AS id_client,
    c.nom AS nom_client,
    p.id_produit,
    p.produit,
    br.quantite AS quantite_livree
FROM 
    bon_Livraison bl
LEFT JOIN 
    bon_Reception br ON bl.id_br = br.id_br
LEFT JOIN 
    Client c ON br.id_Client = c.id_Client
LEFT JOIN 
    produit p ON br.id_produit = p.id_produit;


CREATE VIEW v_bon_sortie AS
SELECT 
    bs.id_bs AS id_bon_sortie,
    bs.date_sortie,
    bs.quantite AS quantite_sortie,
    p.id_produit,
    p.produit,
    br.id_Client AS id_client,
    c.nom AS nom_client
FROM 
    bon_Sortie bs
LEFT JOIN 
    produit p ON bs.id_produit = p.id_produit
LEFT JOIN 
    bon_Reception br ON p.id_produit = br.id_produit
LEFT JOIN 
    Client c ON br.id_Client = c.id_Client;

