<?php


namespace App\Models;


class AktuellesProjektModel
{
    // globally accessible variable for database connection, referenced with $this->db
    protected $db, $aufgaben;

    public function __construct() {
        // Wir verbinden uns zur Datenbank
        $this->db = \Config\Database::connect();
        // Wir verwenden die Query Builder Klasse über table()
        $this->aufgaben = $this->db->table('Aufgaben');
    }

    public function getAktuelleAufgaben() {
        $this->aufgaben->select();
        $result = $this->aufgaben->get();

        return $result->getResult();
    }
}