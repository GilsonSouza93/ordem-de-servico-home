<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MapController extends BaseController
{
    public function getPosts()
    {
        $posts = model('App\Models\PoleModel')->findAll();

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $posts
        ]);
    }
}
