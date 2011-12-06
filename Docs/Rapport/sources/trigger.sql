/* Active PL/PGSQL */
CREATE LANGUAGE plpgsql;

/* Creation de la fonction associee au trigger */
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


/* Creation du declencheur tgr_term_doc_content */
CREATE TRIGGER tgr_gestion_relations AFTER DELETE OR UPDATE OR INSERT
ON concept_concept FOR EACH ROW
EXECUTE PROCEDURE fc_gestion_relations();
