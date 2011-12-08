/* Active PL/PGSQL */
CREATE LANGUAGE plpgsql;

/* Creation de la fonction associee au trigger de gestion de la reflexivite des associations */
CREATE OR REPLACE FUNCTION fc_gestion_relations() RETURNS trigger as $tgr_gestion_relations$
DECLARE
nb INTEGER;
BEGIN
IF (TG_OP = 'DELETE') THEN
	SELECT count(*) INTO nb FROM concept_concept WHERE concept1_id = OLD.concept2_id AND concept2_id = OLD.concept1_id;
	IF (nb > 0) THEN
		DELETE FROM concept_concept WHERE (concept1_id=OLD.concept2_id AND concept2_id=OLD.concept1_id);
	END IF;
	RETURN OLD;
ELSEIF (TG_OP = 'UPDATE') THEN
	SELECT count(*) INTO nb FROM concept_concept WHERE concept1_id = OLD.concept2_id AND concept2_id = OLD.concept1_id;
	IF (nb > 0) THEN
	UPDATE concept_concept SET concept1_id = NEW.concept2_id, concept2_id = NEW.concept1_id WHERE concept1_id=OLD.concept2_id AND concept2_id = OLD.concept1_id;
	END IF;
	RETURN NEW;		
ELSEIF (TG_OP = 'INSERT') THEN
	SELECT count(*) INTO nb FROM concept_concept WHERE concept1_id = NEW.concept2_id AND concept2_id = NEW.concept1_id;
	IF (nb = 0) THEN
	INSERT INTO concept_concept VALUES(NEW.concept2_id,NEW.concept1_id);
	END IF;
	RETURN NEW;
END IF;
RETURN NULL;
END;
$tgr_gestion_relations$ LANGUAGE plpgsql;

/* Creation de la fonction associee au trigger de verification des racines */
CREATE OR REPLACE FUNCTION fc_verif_root() RETURNS trigger as $tgr_verif_root$
DECLARE
nb INTEGER;
BEGIN
IF (OLD.concept_general_id IS NULL) THEN
	SELECT count(*) INTO nb FROM concept WHERE concept_general_id IS NULL;
	IF (TG_OP = 'DELETE' AND nb < 1) THEN
		RAISE EXCEPTION 'Au moins une racine doit etre presente.';
	ELSEIF (TG_OP = 'UPDATE' AND nb < 1 AND NEW.concept_general_id IS NOT NULL ) THEN
		RAISE EXCEPTION 'Au moins une racine doit etre presente.';
	END IF;
END IF;
RETURN NULL;
END;
$tgr_verif_root$ LANGUAGE plpgsql;


/* Creation du declencheur tgr_gestion_relations */
CREATE TRIGGER tgr_gestion_relations AFTER DELETE OR UPDATE OR INSERT
ON concept_concept FOR EACH ROW
EXECUTE PROCEDURE fc_gestion_relations();

/* Creation du declencheur tgr_verif_root */
CREATE TRIGGER tgr_verif_root AFTER DELETE OR UPDATE
ON concept FOR EACH ROW
EXECUTE PROCEDURE fc_verif_root();
