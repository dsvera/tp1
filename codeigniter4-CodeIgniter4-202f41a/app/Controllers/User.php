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
    
    public function delete($id)
    {
        $model = model(UserModel::class);
        $model->delete($id);
            //$model->delete($id);
    }

    public function create()
    {
        $model = model(UserModel::class);
        $modelService = model(ServiceModel::class);
        $data = [
            'service' => $modelService->findAll(),
        ];

        if ($this->validate([
            'lastname' => 'required|min_length[2]|max_length[50]',
            'firstname' => 'required|min_length[2]|max_length[50]',
            'birthDate' => 'required',
            'adress' => 'required|min_length[5]|max_length[300]',
            'postCode' => 'required|min_length[5]|max_length[5]',
            'phoneNumber' => 'required|max_length[15]|numeric',
            'id_service' => 'required|min_length[1]|numeric',
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
