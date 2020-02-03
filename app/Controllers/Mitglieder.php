<?php


namespace App\Controllers;
use App\Models\MitgliederModel;

class Mitglieder extends BaseController
{
    private $mitglieder_model;
    private $session;

    public function __construct() {
        // make model accessible within this class
        $this->mitglieder_model = new MitgliederModel();
        $this->session = session();
    }

    public function index()
    {
        $post = $this->request->getPost();
        if(isset($post["projekt"]))
            $this->session->set("projekt", $this->request->getPost("projekt"));

        if(isset($this->session->userEmail))
        {
            $data["mitglieder"] = $this->mitglieder_model->matchingCurrentProject();
            foreach ($data["mitglieder"] as $mitglied) {
                $mitglied->ID = $mitglied->MitgliedsID;
            }
        }
        else
            $data["mitglieder"] = $this->mitglieder_model->getMitglieder();

        return view('Mitglieder', $data);
    }

    public function deleteUser()
    {
        if (isset($_GET["delID"]))
        {
            $this->mitglieder_model->deleteMitglied($_GET["delID"]);
            return redirect()->to('/codeigniter/public/Mitglieder');
        }
 /*       if ($_POST["createUser"] == "true") {
            $sql = "INSERT INTO `Mitglieder`(`Username`, `EMail`, `Passwort`) VALUES ('" . $_POST['newUsername'] . "','" . $_POST['newUserEmail'] . "','" . password_hash($_POST['newUserPasswort'], PASSWORD_BCRYPT) . "')";
            $conn->query($sql);

            header("Location: ../Mitglieder.php");
        }*/
        //--------------------------------------------------------------------
    }

    public function createUser()
    {
        $post = $this->request->getPost();

        if(isset($post["createUser"]))
        {
            $post["Passwort"] = password_hash($post["Passwort"],PASSWORD_BCRYPT);
            $this->mitglieder_model->addMitglied($post);
            if(isset($post["applyProject"]) && $post["applyProject"] == "true")
            {
                $ID = $this->mitglieder_model->getMitgliedbyMail($post["EMail"])->ID;
                $this->mitglieder_model->applyProject($ID,$this->session->get("projekt"));
            }

            return redirect()->to('/codeigniter/public/Mitglieder');
        }
    }

    public function showEditUser()
    {
        if ($ID = $this->request->getGet("editID"))
        {
            $data["mitglied"] = $this->mitglieder_model->getMitglied($ID);
            $isLoggedInUser = $this->session->userEmail == $data["mitglied"]->EMail;
            $data["isLoggedInUser"] = $isLoggedInUser;

            return view('MitgliedBearbeiten',$data);
        }

    }

    public function editUser()
    {
        $post = $this->request->getPost();
        $this->mitglieder_model->editMitglied($post);
        return redirect()->to('/codeigniter/public/Mitglieder');
    }


}