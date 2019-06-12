<?php

    class VersionManager {

        private $db;

        public function __construct($db) {
            $this->setDb($db);
        }

        public function setDb(PDO $db) {
            $this->db = $db;
        }

        public function add(Version $version) {
            $request = $this->db->prepare('INSERT INTO version(jeu_id, support_id, releasedate) VALUES (:jeu_id, :support_id, :releasedate)');
            $request->bindValue(':jeu_id', $version->getJeuId());
            $request->bindValue(':support_id', $version->getSupportId());
            $request->bindValue(':releasedate', $version->getReleaseDate());
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
                $request = $this->db->query('SELECT version.id, version.releasedate, jeu.titre, support.nom FROM version JOIN jeu ON version.jeu_id = jeu.id JOIN support ON version.support_id = support.id ORDER BY version.id DESC');
                $data = $request->fetchAll(PDO::FETCH_ASSOC);
                $request->closeCursor();
            } else {
                $request = $this->db->prepare('SELECT * FROM version WHERE id = :id');
                $request->bindValue(':id', $id);
                $request->execute();
                $data = $request->fetch();
                $request->closeCursor();
            }
            return $data;
        }

        public function update(Version $version) {
            $request = $this->db->prepare('UPDATE version SET jeu_id = :jeu_id, support_id = :support_id, releasedate = :releasedate WHERE id = ' . $version->getId());
            $request->bindValue(':jeu_id', $version->getJeuId());
            $request->bindValue(':support_id', $version->getSupportId());
            $request->bindValue(':releasedate', $version->getReleaseDate());
            $request->execute();
            $request->closeCursor();
            if ($request->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function delete(Version $version) {
            $request = $this->db->prepare('DELETE FROM version WHERE id = :id');
            $request->bindValue(':id', $version->getId());
            $request->execute();
            $request->closeCursor();
            if ($request->rowCount()) {
                return true;
            } else {
                return false;
            }
        }


    }