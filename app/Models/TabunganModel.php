<?php

namespace App\Models;

use CodeIgniter\Model;

class TabunganModel extends Model
{
    protected $table      = 'tabungan';
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
        return $this->table('tabungan')->like('nama',$keyword)->orLike('jumlah',$keyword)->orLike('status',$keyword);
    }
}