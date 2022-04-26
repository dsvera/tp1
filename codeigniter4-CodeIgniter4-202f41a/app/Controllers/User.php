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
            'delete' => $model->delete(),
            'service' => $modelService->findAll(),
            'title' => 'Liste du personnel : ',
        ];

        echo view('templates/header', $data);
        echo view('user/overview', $data);
        echo view('templates/footer', $data);
    }

    public function create()
    {
        $model = model(UserModel::class);
        $modelService = model(ServiceModel::class);
        $data = [
            'service' => $modelService->findAll(),
        ];

        if ($this->request->getMethod() === 'post' && $this->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'birthDate' => 'required',
            'adress' => 'required',
            'postCode' => 'required',
            'phoneNumber' => 'required',
            'id_service' => 'required',
        ])) {
            $result = [
                'lastname' => $this->request->getPost('lastname'),
                'firstname' => $this->request->getPost('firstname'),
                'birthDate' => $this->request->getPost('birthDate'),
                'adress' => $this->request->getPost('adress'),
                'postCode' => $this->request->getPost('postCode'),
                'phoneNumber' => $this->request->getPost('phoneNumber'),
                'id_service' => intval($this->request->getPost('id_service')),
            ];
            $model->save($result);

            echo view('user/success');
        } else {
            echo view('templates/header', ['title' => 'Formulaire']);
            echo view('user/create', $data);
            echo view('templates/footer');
        }
    }
}
