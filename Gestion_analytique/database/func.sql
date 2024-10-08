CREATE OR REPLACE FUNCTION calculer_total_general()
RETURNS NUMERIC AS $$
DECLARE
    total_general NUMERIC;
BEGIN
    SELECT SUM(vt.total_centre) INTO total_general
    FROM v_total_montant_analytique vt;

    RETURN total_general;
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION calculer_total_ADM_DIST()
RETURNS NUMERIC AS $$
DECLARE
    total_general NUMERIC;
BEGIN
    SELECT SUM(vt.total_centre) INTO total_general
    FROM v_total_montant_analytique vt
    WHERE vt.centre = 'ADM/DIST';
    RETURN total_general;
END;
$$ LANGUAGE plpgsql;



CREATE OR REPLACE FUNCTION cout_elevage(nombre INT DEFAULT 1)
RETURNS TABLE(cout_elevage NUMERIC,cout_poisson_kg NUMERIC, nombre_utilise INT) AS
$$
BEGIN
    RETURN QUERY
    SELECT
        vr.cout_total AS cout_elevage,
        vr.cout_total / nombre AS cout_poisson_kg,
        nombre AS nombre_utilise
    FROM
        v_repartition vr
    WHERE
        vr.centre = 'Entrepot';
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION cout_elevage_entrepot()
RETURNS TABLE(cout_elevage NUMERIC) AS
$$
BEGIN
    RETURN QUERY
    SELECT
        vr.cout_total AS cout_elevage_entrepot
    FROM
        v_repartition vr
    WHERE
        vr.centre = 'Entrepot';
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION cout_production_centre()
RETURNS TABLE(cout_elevage NUMERIC) AS
$$
BEGIN
    RETURN QUERY
    SELECT
        vr.cout_total AS cout_production_centre
    FROM
        v_repartition vr
    WHERE
        vr.centre = 'Centre de Stockage';
END;
$$ LANGUAGE plpgsql;




CREATE OR REPLACE FUNCTION cout_production_general(nombre INT DEFAULT 1)
RETURNS TABLE(cout_elevage NUMERIC, cout_production NUMERIC, cout_total NUMERIC, cout_poisson NUMERIC, nombre_utilise INT) AS
$$
BEGIN
    RETURN QUERY
    SELECT
        cout_elevage_entrepot() AS cout_elevage,
        cout_production_centre() AS cout_production,
        (cout_elevage_entrepot() + cout_production_centre()) AS cout_total,
        (cout_elevage_entrepot() + cout_production_centre()) / nombre AS cout_poisson,
        nombre AS nombre_utilise;
END;
$$ LANGUAGE plpgsql;



