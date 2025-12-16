<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    public function index()
    {
        $m = new ProductModel();

        $q = trim((string) $this->request->getGet('q'));
        if ($q !== '') {
            $m->groupStart()
                ->like('sku', $q)
                ->orLike('name', $q)
            ->groupEnd();
        }

        return view('products/index', [
            'title'    => 'Produk',
            'q'        => $q,
            'products' => $m->orderBy('id', 'DESC')->paginate(10),
            'pager'    => $m->pager,
        ]);
    }

    public function new()
    {
        return view('products/new', [
            'title'      => 'Tambah Produk',
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function create()
    {
        $rules = [
            'sku'   => 'required|min_length[3]|max_length[32]|is_unique[products.sku]',
            'name'  => 'required|min_length[3]|max_length[150]',
            'price' => 'required|decimal',
            'stock' => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $m = new ProductModel();
        $m->insert([
            'sku'         => (string) $this->request->getPost('sku'),
            'name'        => (string) $this->request->getPost('name'),
            'price'       => (string) $this->request->getPost('price'),
            'stock'       => (int) $this->request->getPost('stock'),
            'description' => (string) $this->request->getPost('description'),
        ]);

        return redirect()->to('/products')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $m = new ProductModel();
        $product = $m->find((int) $id);

        if (! $product) {
            return redirect()->to('/products')->with('error', 'Produk tidak ditemukan.');
        }

        return view('products/edit', [
            'title'      => 'Edit Produk',
            'product'    => $product,
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function update($id)
    {
        $m = new ProductModel();
        $product = $m->find((int) $id);

        if (! $product) {
            return redirect()->to('/products')->with('error', 'Produk tidak ditemukan.');
        }

        $skuInput = (string) $this->request->getPost('sku');
        $skuRule = ($skuInput === $product['sku'])
            ? 'required|min_length[3]|max_length[32]'
            : 'required|min_length[3]|max_length[32]|is_unique[products.sku]';

        $rules = [
            'sku'   => $skuRule,
            'name'  => 'required|min_length[3]|max_length[150]',
            'price' => 'required|decimal',
            'stock' => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $m->update((int) $id, [
            'sku'         => $skuInput,
            'name'        => (string) $this->request->getPost('name'),
            'price'       => (string) $this->request->getPost('price'),
            'stock'       => (int) $this->request->getPost('stock'),
            'description' => (string) $this->request->getPost('description'),
        ]);

        return redirect()->to('/products')->with('success', 'Produk berhasil diupdate.');
    }

    public function delete($id)
    {
        $m = new ProductModel();
        $m->delete((int) $id);

        return redirect()->to('/products')->with('success', 'Produk berhasil dihapus.');
    }
}
