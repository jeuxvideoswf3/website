<?php

    class JeuManager {

        private $db;

        public function __construct($db) {
            $this->setDb($db);
        }

        public function setDb(PDO $db) {
            $this->db = $db;
        }

        public function add(Jeu $jeu) {
            $request = $this->db->prepare('INSERT INTO jeu(titre, description, pegi, lien, categorie_id, editeur_id) VALUES (:titre, :description, :pegi, :lien, :categorie_id, :editeur_id)');
            $request->bindValue(':titre', $jeu->getTitre());
            $request->bindValue(':description', $jeu->getDescription());
            $request->bindValue(':pegi', $jeu->getPegi());
            $request->bindValue(':lien', $jeu->getLien());
            $request->bindValue(':categorie_id', $jeu->getCategorieId());
            $request->bindValue(':editeur_id', $jeu->getEditeurId());
            $request->execute();
            $request->closeCursor();
            if ($request->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function read($id = null) {
            if ($id === null) {
                $request = $this->db->query('SELECT jeu.id, jeu.titre, jeu.description, jeu.pegi, jeu.lien, categorie.type, editeur.nom, editeur.lien as editeurlink FROM jeu JOIN categorie ON jeu.categorie_id = categorie.id JOIN editeur ON jeu.editeur_id = editeur.id ORDER BY jeu.id DESC');
                $data = $request->fetchAll(PDO::FETCH_ASSOC);
                $request->closeCursor();
            } else {
                $request = $this->db->prepare('SELECT * FROM jeu WHERE id = :id');
                $request->bindValue(':id', $id);
                $request->execute();
                $data = $request->fetch();
                $request->closeCursor();
            }
            return $data;
        }

        public function update(Jeu $jeu) {
            $request = $this->db->prepare('UPDATE jeu SET titre = :titre, description = :description, pegi = :pegi, lien = :lien, categorie_id = :categorie_id, editeur_id = :editeur_id WHERE id = ' . $jeu->getId());
            $request->bindValue(':titre', $jeu->getTitre());
            $request->bindValue(':description', $jeu->getDescription());
            $request->bindValue(':pegi', $jeu->getPegi());
            $request->bindValue(':lien', $jeu->getLien());
            $request->bindValue(':categorie_id', $jeu->getCategorieId());
            $request->bindValue(':editeur_id', $jeu->getEditeurId());
            $request->execute();
            $request->closeCursor();
            if ($request->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function delete(Jeu $jeu) {
            $request = $this->db->prepare('DELETE FROM jeu WHERE id = :id');
            $request->bindValue(':id', $jeu->getId());
            $request->execute();
            $request->closeCursor();
            if ($request->rowCount()) {
                return true;
            } else {
                return false;
            }
        }


    }