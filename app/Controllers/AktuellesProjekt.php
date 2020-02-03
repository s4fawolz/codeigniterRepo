<?php


namespace App\Controllers;
use App\Models\AktuellesProjektModel;

class AktuellesProjekt extends BaseController
{

    public function index()
    {
        $model = new AktuellesProjektModel();
        $data["aufgaben"] = $model->getAktuelleAufgaben();

        return view('AktuellesProjekt',$data);
    }

    //--------------------------------------------------------------------
}