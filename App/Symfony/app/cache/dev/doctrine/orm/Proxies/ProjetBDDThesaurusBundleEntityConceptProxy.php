<?php

namespace Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class ProjetBDDThesaurusBundleEntityConceptProxy extends \ProjetBDD\Thesaurus\Bundle\Entity\Concept implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }
    
    
    public function getId()
    {
        $this->__load();
        return parent::getId();
    }

    public function setTermeVedette($termeVedette)
    {
        $this->__load();
        return parent::setTermeVedette($termeVedette);
    }

    public function getTermeVedette()
    {
        $this->__load();
        return parent::getTermeVedette();
    }

    public function setConceptGeneral($conceptGeneral)
    {
        $this->__load();
        return parent::setConceptGeneral($conceptGeneral);
    }

    public function getConceptGeneral()
    {
        $this->__load();
        return parent::getConceptGeneral();
    }

    public function setConceptsSpecifiques($conceptsSpecifiques)
    {
        $this->__load();
        return parent::setConceptsSpecifiques($conceptsSpecifiques);
    }

    public function getConceptsSpecifiques()
    {
        $this->__load();
        return parent::getConceptsSpecifiques();
    }

    public function setSynonymes($synonymes)
    {
        $this->__load();
        return parent::setSynonymes($synonymes);
    }

    public function getSynonymes()
    {
        $this->__load();
        return parent::getSynonymes();
    }

    public function setAssociations($associations)
    {
        $this->__load();
        return parent::setAssociations($associations);
    }

    public function getAssociations()
    {
        $this->__load();
        return parent::getAssociations();
    }

    public function setAssociesAvecMoi($associes_avec_moi)
    {
        $this->__load();
        return parent::setAssociesAvecMoi($associes_avec_moi);
    }

    public function getAssociesAvecMoi()
    {
        $this->__load();
        return parent::getAssociesAvecMoi();
    }

    public function __toString()
    {
        $this->__load();
        return parent::__toString();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'terme_vedette', 'concept_general', 'concepts_specifiques', 'synonymes', 'associes_avec_moi', 'associations');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}