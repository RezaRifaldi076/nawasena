<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamanModel extends Model
{
    protected $table      = 'pinjaman';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama', 'jumlah', 'status'];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function search($keyword){
        return $this->table('pinjaman')->like('nama',$keyword)->orLike('jumlah',$keyword)->orLike('status',$keyword);
    } 
}