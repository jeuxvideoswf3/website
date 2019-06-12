<?php

    class SupportManager {

        private $db;

        public function __construct($db) {
            $this->setDb($db);
        }

        public function setDb(PDO $db) {
            $this->db = $db;
        }

        public function add(Support $support) {
            $request = $this->db->prepare('INSERT INTO support(nom) VALUES (:nom)');
            $request->bindValue(':nom', $support->getNom());
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
                $request = $this->db->query('SELECT * FROM support ORDER BY id DESC');
                $data = $request->fetchAll(PDO::FETCH_ASSOC);
                $request->closeCursor();
            } else {
                $request = $this->db->prepare('SELECT * FROM support WHERE id = :id');
                $request->bindValue(':id', $id);
                $request->execute();
                $data = $request->fetch();
                $request->closeCursor();
            }
            return $data;
        }

        public function update(Support $support) {
            $request = $this->db->prepare('UPDATE support SET nom = :nom WHERE id = ' . $support->getId());
            $request->bindValue(':nom', $support->getNom());
            $request->execute();
            $request->closeCursor();
            if ($request->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function delete(Support $support) {
            $request = $this->db->prepare('DELETE FROM support WHERE id = :id');
            $request->bindValue(':id', $support->getId());
            $request->execute();
            $request->closeCursor();
            if ($request->rowCount()) {
                return true;
            } else {
                return false;
            }
        }


    }