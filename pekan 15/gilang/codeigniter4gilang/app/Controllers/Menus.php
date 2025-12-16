<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Menus extends BaseController
{
    public function index()
    {
        $model = new MenuModel();
        return view('menus/index', [
            'menus' => $model->orderBy('id', 'DESC')->findAll()
        ]);
    }

    public function new()
    {
        return view('menus/new');
    }

    public function create()
    {
        $data = $this->request->getPost(['name','category','price','description']);
        (new MenuModel())->insert($data);

        return redirect()->to('/menus');
    }

    public function edit($id)
    {
        $model = new MenuModel();
        return view('menus/edit', [
            'menu' => $model->find($id)
        ]);
    }

    public function update($id)
    {
        $data = $this->request->getPost(['name','category','price','description']);
        (new MenuModel())->update($id, $data);

        return redirect()->to('/menus');
    }

    public function delete($id)
    {
        (new MenuModel())->delete($id);
        return redirect()->to('/menus');
    }
}
