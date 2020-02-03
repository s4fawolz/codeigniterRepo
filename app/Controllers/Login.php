<?php namespace App\Controllers;

use App\Models\MitgliederModel;
use App\Models\ProjekteModel;

class Login extends BaseController
{
    private $mitglieder_model;
    private $session;


    public function __construct(){
        $this->mitglieder_model = new MitgliederModel();
        $this->session = session();

    }

    public function index(){
        $this->session->destroy();
        return view("Login");
    }

    public function projektauswahl()
    {
        $projektModel = new ProjekteModel();
        $data["projekte"] =  $projektModel->getProjekte();
        return view("Projektauswahl",$data);
    }


    public function validateForm(){
        $validation =  \Config\Services::validation();
        helper(['form', 'url']);
        $validation->setRules([
            'EMail' => ['label' => 'EMail', 'rules' => 'required','errors' => ['required' => 'EMail erforderlich']],
            'agb' => ['label' => 'AGB', 'rules' => 'required','errors' => ['required' => 'Die AGB müssen akzeptiert werden']],
            'Passwort' => ['label' => 'Password', 'rules' => 'required|min_length[4]', 'errors' => [
            'required' => 'Passwort erforderlich', 'min_length' => 'Das Passwort muss mindestens 4 Zeichen lang sein']]

        ]);

        if (! $this->validate($validation->getRules()))
        {
            echo view('Login', ['validation' => $this->validator ]);
        }
        else
        {
            $post = $this->request->getPost();
            $mail = $post["EMail"];
            $pw = $post["Passwort"];

            $logindata = $this->mitglieder_model->getPasswordHash($mail);
            if($logindata != null) {
                $hash = $logindata->Passwort;
                password_verify($pw, $hash);
                if (password_verify($pw, $hash)) {
                    $this->session->set("userEmail",$mail);
                    return redirect()->to('/codeigniter/public/Login/projektauswahl');
                } else {
                    return redirect()->to('/codeigniter/public/Login?wrongPassword=True');
                }
            }
            else{
                return redirect()->to('/codeigniter/public/Login?wrongPassword=True');
            }
        }

    }

    //--------------------------------------------------------------------

}