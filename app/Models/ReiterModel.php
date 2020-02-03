<?php namespace App\Models;
use CodeIgniter\Model;

class ReiterModel extends Model {

    // globally accessible variable for database connection, referenced with $this->db
    protected $db, $projekte;

    public function __construct() {
        // Wir verbinden uns zur Datenbank
        $this->db = \Config\Database::connect();
        // Wir verwenden die Query Builder Klasse über table()
        $this->reiter = $this->db->table('Reiter');
    }

    public function getReiter() {
        $this->reiter->select();
        $result = $this->reiter->get();

        return $result->getResult();
    }

}

