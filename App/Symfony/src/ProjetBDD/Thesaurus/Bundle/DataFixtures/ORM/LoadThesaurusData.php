<?php

namespace ProjetBDD\Thesaurus\BundleDataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use ProjetBDD\Thesaurus\Bundle\Entity\Terme;
use ProjetBDD\Thesaurus\Bundle\Entity\Concept;
use Doctrine\Common\DataFixtures\AbstractFixture;

class LoadThesaurusData extends AbstractFixture
{
    public function load($manager)
    {
        $this->loadTermeData($manager);
        $this->loadConceptData($manager);
    }
    
    public function loadTermeData($manager){
        echo("Loading Terme objects...\n");
        $termes = array("enseignement",
                        "domaine disciplinaire",
                        "enseignement de l'informatique",
                        "enseignement des sciences de l'ingénieur",
                        "enseignement d'une langue ancienne",
                        "enseignement d'une langue régionale",
                        "enseignement d'une langue vivante",
                        "enseignement des arts appliqués",
                        "enseignement de la danse",
                        "enseignement de la littérature",
                        "domaine disciplinaire agricole",
                        "éducation civique",
                        "enseignement de l'AII (automatisme informatique industrielle)",
                        "enseignement de l'ESF (économie sociale et familiale)",
                        "enseignement de l'histoire de l'art",
                        "enseignement de l'histoire géographie",
                        "enseignement de la construction mécanique",
                        "enseignement de la musique",
                        "enseignement de la philosophie",
                        "enseignement de la productique",
                        "enseignement de la technologie",
                        "enseignement de la TSA (technologie des systèmes automatisés)",
                        "enseignement des arts plastiques",
                        "enseignement des langues et cultures d'origine",
                        "enseignement des mathématiques",
                        "enseignement des sciences économiques et sociales",
                        "enseignement des sciences physiques",
                        "enseignement des SVT (sciences de la vie et de la Terre)",
                        "enseignement des techniques administratives",
                        "enseignement des techniques commerciales",
                        "enseignement du fait religieux",
                        "enseignement du français",
                        "enseignement du français langue étrangère",
                        "EPS (éducation physique et sportive)",
                        "domaine transversal",
                        "éducation à l'environnement",
                        "éducation à l'information",
                        "éducation aux médias",
                        "éducation à l'orientation",
                        "découverte du monde professionnel",
                        "orientation professionnelle",
                        "éducation à la santé",
                        "éducation à la sécurité routière",
                        "IDD (itinéraire de découverte)",
                        "PPCP (projet pluridisciplinaire à caractère professionnel)",
                        "TPE (travaux personnels encadrés)",
                        "filière d'enseignement",
                        "filière littéraire",
                        "filière scientifique",
                        "filière ST2S",
                        "filière STAV",
                        "filière hôtellerie",
                        "filière arts appliqués",
                        "filière ES",
                        "filière STG",
                        "filière STI",
                        "filière STL",
                        "filière STMS",
                        "filière TMD",
                        "type d'enseignement",
                        "enseignement agricole",
                        "enseignement artistique et culturel",
                        "éducation musicale",
                        "enseignement économique",
                        "enseignement général",
                        "enseignement littéraire",
                        "enseignement médical",
                        "enseignement professionnel",
                        "apprentissage professionnel",
                        "apprentissage junior",
                        "enseignement scientifique",
                        "enseignement technique");

        foreach($termes as $libelle){
            $terme  = new Terme();
            $terme->setId($libelle);
            $manager->persist($terme);
            $this->setReference($libelle,$terme);
        }        
        $manager->flush();
        echo(count($termes)." Terme objets are loaded.\n");
    }

    public function loadConceptData($manager){
	// CREATION DES CONCEPTS SANS RELATIONS
        echo("Loading Concept objects...\n");
        $concepts = array("enseignement",
                          "domaine disciplinaire",
                          "enseignement de l'informatique",
                          "enseignement des sciences de l'ingénieur",
                          "enseignement d'une langue ancienne",
                          "enseignement d'une langue régionale",
                          "enseignement d'une langue vivante",
                          "enseignement des arts appliqués",
                          "enseignement de la danse",
                          "enseignement de la littérature",
                          "domaine disciplinaire agricole",
                          "éducation civique",
                          "enseignement de l'AII (automatisme informatique industrielle)",
                          "enseignement de l'ESF (économie sociale et familiale)",
                          "enseignement de l'histoire de l'art",
                          "enseignement de l'histoire géographie",
                          "enseignement de la construction mécanique",
                          "enseignement de la musique",
                          "enseignement de la philosophie",
                          "enseignement de la productique",
                          "enseignement de la technologie",
                          "enseignement de la TSA (technologie des systèmes automatisés)",
                          "enseignement des arts plastiques",
                          "enseignement des langues et cultures d'origine",
                          "enseignement des mathématiques",
                          "enseignement des sciences économiques et sociales",
                          "enseignement des sciences physiques",
                          "enseignement des SVT (sciences de la vie et de la Terre)",
                          "enseignement des techniques administratives",
                          "enseignement des techniques commerciales",
                          "enseignement du fait religieux",
                          "enseignement du français",
                          "enseignement du français langue étrangère",
                          "EPS (éducation physique et sportive)",
                          "domaine transversal",
                          "éducation à l'environnement",
                          "éducation à l'information",
                          "éducation aux médias",
                          "éducation à l'orientation",
                          "découverte du monde professionnel",
                          "orientation professionnelle",
                          "éducation à la santé",
                          "éducation à la sécurité routière",
                          "IDD (itinéraire de découverte)",
                          "PPCP (projet pluridisciplinaire à caractère professionnel)",
                          "TPE (travaux personnels encadrés)",
                          "filière d'enseignement",
                          "filière littéraire",
                          "filière scientifique",
                          "filière ST2S",
                          "filière STAV",
                          "filière hôtellerie",
                          "filière arts appliqués",
                          "filière ES",
                          "filière STG",
                          "filière STI",
                          "filière STL",
                          "filière STMS",
                          "filière TMD",
                          "type d'enseignement",
                          "enseignement agricole",
                          "enseignement artistique et culturel",
                          "éducation musicale",
                          "enseignement économique",
                          "enseignement général",
                          "enseignement littéraire",
                          "enseignement médical",
                          "enseignement professionnel",
                          "apprentissage professionnel",
                          "apprentissage junior",
                          "enseignement scientifique",
                          "enseignement technique");


        foreach($concepts as $c){
            $concept = new Concept();
            $concept->setTermeVedette($this->getReference($c));
            $manager->persist($concept);
            $this->setReference('concept_'.$concept->getTermeVedette(),$concept);
        }
        $manager->flush();
        echo(count($concepts)." Concept objets are loaded.\n");

        // CREATION DES RELATION DE GENERALISATION
        echo("Loading hierarchical concept relations...\n");
	for($i=1;$i<count($concepts);++$i){
            $concept = $this->getReference('concept_'.$concepts[$i]);
            if($i == 1 || $i == 34 || $i == 46 || $i == 59){
                $concept->setConceptGeneral($this->getReference('concept_enseignement'));
            }else if($i<34){
                $concept->setConceptGeneral($this->getReference('concept_domaine disciplinaire'));
            }else if($i<46){
                if($i == 37) $concept->setConceptGeneral($this->getReference('concept_éducation à l\'information'));
                else if($i == 39 || $i == 40) $concept->setConceptGeneral($this->getReference('concept_éducation à l\'orientation'));
                else $concept->setConceptGeneral($this->getReference('concept_domaine transversal'));
            }else if($i<59){
                $concept->setConceptGeneral($this->getReference('concept_filière d\'enseignement'));
            }else{
                if($i == 61) $concept->setConceptGeneral($this->getReference('concept_enseignement artistique et culturel'));
                else if($i == 67) $concept->setConceptGeneral($this->getReference('concept_enseignement professionnel'));
                else if($i == 68) $concept->setConceptGeneral($this->getReference('concept_apprentissage professionnel'));
                else $concept->setConceptGeneral($this->getReference('concept_type d\'enseignement'));
            }
            $manager->persist($concept);
            $manager->flush();
        }
        echo("Ok !\n");
    }
}

