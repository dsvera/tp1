<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $model = model(UserModel::class);

        $data = [
            'user'  => $model->getUser(),
            'title' => 'User archive',
        ];
    
        echo view('templates/header', $data);
        echo view('user/overview', $data);
        echo view('templates/footer', $data);
    }

    public function view($slug = null)
    {
        $model = model(UserModel::class);

    $data['user'] = $model->getUser($slug);

    if (empty($data['user'])) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
    }

    $data['title'] = $data['user']['title'];

    echo view('templates/header', $data);
    echo view('user/view', $data);
    echo view('templates/footer', $data);
    }
}