<?php

    class Support {

        private $id;
        private $nom;

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

        private function setId($id) {
            $this->id = $id;
        }

        public function setNom($nom) {
            if (is_string($nom) && strlen($nom) >= 1 && strlen($nom) <= 50) {
                $this->nom = $nom;
            } else {
                echo 'Mauvais format du nom'; die();
            }
        }

    }