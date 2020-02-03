<?php


namespace App\Controllers;
use App\Models\AufgabenModel;

class Aufgaben extends BaseController
{

    public function index()
    {
        $aufgaben_model = new AufgabenModel();
        $data["aufgaben"] = $aufgaben_model->getAufgaben();
        return view('Aufgaben',$data);
    }

}