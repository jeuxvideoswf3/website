<?php

    class Version {

        private $id;
        private $jeu_id;
        private $support_id;
        private $releasedate;

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
        public function getJeuId() { return $this->jeu_id; }
        public function getSupportId() { return $this->support_id; }
        public function getReleaseDate() { return $this->releasedate; }

        private function setId($id) {
            $this->id = $id;
        }

        public function setJeuId(int $jeu_id) {
            if (is_int($jeu_id)) {
                $this->jeu_id = $jeu_id;
            } else {
                echo 'Mauvais format du Jeu'; die();
            }
        }

        public function setSupportId(int $support_id) {
            if (is_int($support_id)) {
                $this->support_id = $support_id;
            } else {
                echo 'Mauvais format du Support'; die();
            }
        }

        public function setReleaseDate($releasedate) {
            $date = explode('-', $releasedate);
            $jour = $date[2];
            $mois = $date[1];
            $annee = $date[0];
            if (checkdate($mois, $jour, $annee)) {
                $this->releasedate = $releasedate;
            } else {
                echo 'Mauvais format de la date de sortie'; die();
            }
        }

    }