<?php


namespace App\Controllers;
use App\Models\ProjekteModel;

class Projekte extends BaseController
{

    public function index()
    {
        $projekte_model = new ProjekteModel();
        $data["projekte"] = $projekte_model->getProjekte();

        return view('Projekte',$data);
    }

    //--------------------------------------------------------------------
}