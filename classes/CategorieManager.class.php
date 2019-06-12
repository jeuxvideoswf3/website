<?php

    class CategorieManager {

        private $db;

        public function __construct($db) {
            $this->setDb($db);
        }

        public function setDb(PDO $db) {
            $this->db = $db;
        }

        public function add(Categorie $categorie) {
            $request = $this->db->prepare('INSERT INTO categorie(type) VALUES (:type)');
            $request->bindValue(':type', $categorie->getType());
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
                $request = $this->db->query('SELECT * FROM categorie ORDER BY id DESC');
                $data = $request->fetchAll(PDO::FETCH_ASSOC);
                $request->closeCursor();
            } else {
                $request = $this->db->prepare('SELECT * FROM categorie WHERE id = :id');
                $request->bindValue(':id', $id);
                $request->execute();
                $data = $request->fetch();
                $request->closeCursor();
            }
            return $data;
        }

        public function update(Categorie $categorie) {
            $request = $this->db->prepare('UPDATE categorie SET type = :type WHERE id = ' . $categorie->getId());
            $request->bindValue(':type', $categorie->getType());
            $request->execute();
            $request->closeCursor();
            if ($request->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function delete(Categorie $categorie) {
            $request = $this->db->prepare('DELETE FROM categorie WHERE id = :id');
            $request->bindValue(':id', $categorie->getId());
            $request->execute();
            $request->closeCursor();
            if ($request->rowCount()) {
                return true;
            } else {
                return false;
            }
        }


    }