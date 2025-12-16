<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = ['sku', 'name', 'price', 'stock', 'description'];

    protected $useTimestamps = true;

    protected $validationRules = [
        'sku'   => 'required|min_length[3]|max_length[32]',
        'name'  => 'required|min_length[3]|max_length[150]',
        'price' => 'required|decimal',
        'stock' => 'required|integer',
    ];
}
