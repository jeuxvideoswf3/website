<?php

    class Jeu {

        private $id;
        private $titre;
        private $description;
        private $pegi;
        private $lien;
        private $categorie_id;
        private $editeur_id;

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
        public function getTitre() { return $this->titre; }
        public function getDescription() { return $this->description; }
        public function getPegi() { return $this->pegi; }
        public function getLien() { return $this->lien; }
        public function getCategorieId() { return $this->categorie_id; }
        public function getEditeurId() { return $this->editeur_id; }

        private function setId($id) {
            $this->id = $id;
        }

        public function setTitre($titre) {
            if (is_string($titre) && strlen($titre) >= 1 && strlen($titre) <= 100) {
                $this->titre = $titre;
            } else {
                echo 'Mauvais format du titre'; die();
            }
        }

        public function setDescription($description) {
            if (is_string($description) && strlen($description) >= 1) {
                $this->description = $description;
            } else {
                echo 'Mauvais format de la description'; die();
            }
        }

        public function setPegi(int $pegi) {
            if (is_int($pegi)) {
                if ($pegi == 3 || $pegi == 7 || $pegi == 12 || $pegi == 16 || $pegi == 18) {
                    $this->pegi = $pegi;
                } else {
                    echo 'Mauvais format du Pegi'; die();
                }
            } else {
                echo 'Mauvais format du Pegi'; die();
            }
        }

        public function setLien($lien) {
            if (is_string($lien) && filter_var($lien, FILTER_VALIDATE_URL)) {
                $this->lien = $lien;
            } else {
                echo 'Mauvais format du lien'; die();
            }
        }

        public function setCategorieId(int $categorie_id) {
            if (is_int($categorie_id)) {
                $this->categorie_id = $categorie_id;
            } else {
                echo 'Mauvais format de la catégorie'; die();
            }
        }

        public function setEditeurId(int $editeur_id) {
            if (is_int($editeur_id)) {
                $this->editeur_id = $editeur_id;
            } else {
                echo 'Mauvais format de l\'éditeur'; die();
            }
        }

    }