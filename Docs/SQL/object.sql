

CREATE TYPE terme_t AS OBJECT (
  lib_terme VARCHAR2(32)
);

CREATE TABLE termes OF terme_t;

CREATE TYPE ref_terme_t AS OBJECT (
  ref_terme REF terme_t
);

CREATE TYPE nested_termes_t AS TABLE OF ref_terme_t;



CREATE TYPE concept_t;

CREATE TYPE ref_concept_t AS OBJECT (
  concept REF concept_t
);


CREATE TYPE nested_concepts_t AS TABLE of ref_concept_t;

CREATE TYPE concept_t AS OBJECT (
  ref_terme_vedette REF terme_t,
  ref_concept_general REF concept_t,
  synonymes nested_termes_t,
  concepts_associees nested_concepts_t
)
NESTED TABLE synonymes STORE AS nested_termes,
NESTED TABLE concepts_associees STORE AS nested_concepts;

CREATE TABLE concepts OF concept_t;

ALTER TABLE termes ADD CONSTRAINT pk_termes
PRIMARY KEY (ref_terme)

ALTER TABLE concepts ADD CONSTRAINT pk_concepts
PRIMARY KEY (ref_terme_vedette)

