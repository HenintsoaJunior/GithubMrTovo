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
