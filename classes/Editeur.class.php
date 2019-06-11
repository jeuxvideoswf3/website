<?php

    class Editeur {

        private $id;
        private $nom;
        private $lien;

        public function __construct(array $donnees) {
            $this->hydrate($donnees);
        }

        public function hydrate(array $donnees) {
            foreach ($donnees as $key => $value) {
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }

        public function getId() { return $this->id; }
        public function getNom() { return $this->nom; }
        public function getLien() { return $this->lien; }

        private function setId($id) {
            $this->id = $id;
        }

        public function setNom($nom) {
            if (is_string($nom) && strlen($nom) >= 1 && strlen($nom) <= 100) {
                $this->nom = $nom;
            } else {
                echo 'Mauvais format du nom'; die();
            }
        }

        public function setLien($lien) {
            if (is_string($lien) && strlen($lien) >= 1 && strlen($lien) <= 255 && filter_var($lien, FILTER_VALIDATE_URL)) {
                $this->lien = $lien;
            } else {
                echo 'Mauvais format du lien'; die();
            }
        }

    }