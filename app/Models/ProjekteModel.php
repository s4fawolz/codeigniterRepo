<?php namespace App\Models;
use CodeIgniter\Model;

class ProjekteModel extends Model {

    // globally accessible variable for database connection, referenced with $this->db
    protected $db, $projekte;

    public function __construct()
    {
        // Wir verbinden uns zur Datenbank
        $this->db = \Config\Database::connect();
        // Wir verwenden die Query Builder Klasse über table()
        $this->projekte = $this->db->table('projekte');
    }

    public function getProjekte()
    {
        $this->projekte->select();
        $result = $this->projekte->get();

        return $result->getResult();
    }

}

