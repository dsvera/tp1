<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Model\ServiceModel;

class User extends BaseController
{
    public function index()
    {
        $modelService = model(ServiceModel::class);
        $model = model(UserModel::class);

        $data = [
            'user'  => $model->join('service', 'user.id_service = service.id')->findAll(),
            'service' => $modelService->findAll(),
            'title' => 'Liste du personnel : ',
        ];
    
        echo view('templates/header', $data);
        echo view('user/overview', $data);
        echo view('templates/footer', $data);
    }

}