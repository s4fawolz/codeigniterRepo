<?php namespace App\Models;

use CodeIgniter\Model;

class MitgliederModel extends Model {

    // globally accessible variable for database connection, referenced with $this->db
    protected $db, $personen;

    public function __construct() {
        // Wir verbinden uns zur Datenbank
        $this->db = \Config\Database::connect();
        // Wir verwenden die Query Builder Klasse über table()
        $this->personen = $this->db->table('Mitglieder');
    }

    public function getMitglied($person_id = null) {
        $this->personen->where('Mitglieder.ID', $person_id);
        $result = $this->personen->get();

        return $result->getRow();
    }

    public function getMitglieder() {
        $this->personen->select();
        $this->personen->orderBy('Username');
        $result = $this->personen->get();

        return $result->getResult();
    }

    public function deleteMitglied($mID = null)
    {
        $this->personen->where('Mitglieder.ID', $mID);
        $this->personen->delete();
    }

    public function addMitglied($newMitglied)
    {
        $intersectionArr = ["Username" => "","EMail" => "","Passwort" => ""];
        $this->personen->insert(array_intersect_key($newMitglied,$intersectionArr));
    }

    public function editMitglied($mitglied)
    {
        $intersectionArr = ["Username" => "","EMail" => "","Passwort" => ""];
        $this->personen->where('Mitglieder.ID', $mitglied["editUserID"]);

        if(isset($mitglied["Passwort"]) && $mitglied["Passwort"] != "")
        {
            $intersectionArr = ["Username" => "", "EMail" => ""];
            $this->personen->update(array_intersect_key($mitglied, $intersectionArr));
        }
        else
        {
            $intersectionArr = ["Username" => "", "EMail" => "", "Passwort" => ""];
            $this->personen->update(array_intersect_key($mitglied, $intersectionArr));
        }
    }

    public function matchingCurrentProject()
    {
        $session = session();
        $querry = $this->db->query("SELECT * 
                FROM Mitglieder m, projekte p, Projekte_Mitglieder pm
                WHERE p.Name = '".$session->get('projekt')."'  and p.ID = pm.ProjektID and m.ID = pm.MitgliedsID");
        return $querry->getResult();
    }

    public function applyProject($ID,$projekt)
    {
        $querry = $this->db->query("SELECT `ID` FROM `projekte` WHERE `Name` = '".$projekt."'");
        $projektID = $querry->getRow()->ID;
        echo $projektID;
        $querry = $this->db->query("INSERT INTO `Projekte_Mitglieder`(`ProjektID`, `MitgliedsID`) VALUES ($projektID,$ID)");

    }

    public function getMitgliedbyMail($Email)
    {
        $this->personen->where('EMail', $Email);
        return $this->personen->get()->getRow();
    }

    public function getPasswordHash($Email)
    {
        $this->personen->where('EMail', $Email);
        return $this->personen->get()->getRow();
    }
}

