<?php

    class EditeurManager {

        private $db;

        public function __construct($db) {
            $this->setDb($db);
        }

        public function setDb(PDO $db) {
            $this->db = $db;
        }

        public function add(Editeur $editeur) {
            $request = $this->db->prepare('INSERT INTO editeur(nom, lien) VALUES (:nom, :lien)');
            $request->bindValue(':nom', $editeur->getNom());
            $request->bindValue(':lien', $editeur->getLien());
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
                $request = $this->db->query('SELECT * FROM editeur ORDER BY id DESC');
                $data = $request->fetchAll(PDO::FETCH_ASSOC);
                $request->closeCursor();
            } else {
                $request = $this->db->prepare('SELECT * FROM editeur WHERE id = :id');
                $request->bindValue(':id', $id);
                $request->execute();
                $data = $request->fetch();
                $request->closeCursor();
            }
            return $data;
        }

        public function update(Editeur $editeur) {
            $request = $this->db->prepare('UPDATE editeur SET nom = :nom, lien = :lien WHERE id = ' . $editeur->getId());
            $request->bindValue(':nom', $editeur->getNom());
            $request->bindValue(':lien', $editeur->getLien());
            $request->execute();
            $request->closeCursor();
            if ($request->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function delete(Editeur $editeur) {
            $request = $this->db->prepare('DELETE FROM editeur WHERE id = :id');
            $request->bindValue(':id', $editeur->getId());
            $request->execute();
            $request->closeCursor();
            if ($request->rowCount()) {
                return true;
            } else {
                return false;
            }
        }


    }