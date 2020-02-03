<?php


namespace App\Controllers;
use App\Models\ReiterModel;

class Reiter extends BaseController
{

    public function index()
    {
        $reiter_model = new ReiterModel();
        $data["reiter"] = $reiter_model->getReiter();

        return view('Reiter',$data);
    }

    //--------------------------------------------------------------------
}