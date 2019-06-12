<?php

    class Categorie {

        private $id;
        private $type;

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
        public function getType() { return $this->type; }

        private function setId($id) {
            $this->id = $id;
        }

        public function setType($type) {
            if (is_string($type) && strlen($type) >= 1 && strlen($type) <= 50) {
                $this->type = $type;
            } else {
                echo 'Mauvais format du type'; die();
            }
        }

    }