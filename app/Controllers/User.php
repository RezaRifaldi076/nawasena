<?php

namespace App\Controllers;
 
class User extends BaseController 
{
    //beranda
    public function index(): string
    {
        return view('user/beranda');
    }

    //data
    public function datad(): string
    { 
        $model = new \App\Models\AnggotaModel();
        $keyword = $this->request->getVar('keyword');
        if ($keyword){
            $search = $model->search($keyword);
        } else {
            $search = $model;
        }
        $current = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        $data = [
            'users' => $search->paginate(5, 'users'),
            'pager' => $model->pager,
            'current' => $current,
        ];
        return view('user/data-daftar', $data);
    }
    public function dataf(): string 
    {
        session();
        $validation = \Config\Services::validation();
        $model = new \App\Models\AnggotaModel();
        $data = [
            'users' => $model->findAll(),
            'validation' => $validation
        ];
        return view('user/data-file', $data);
    }
    public function datat(): string
    {
        session();
        $validation = \Config\Services::validation();
        $data = [
            'validation' => $validation
        ];
        return view('user/data-tambah', $data);
    }

    //lain
    public function lainl(): string
    {
        session();
        $validation = \Config\Services::validation();
        $data = [
            'validation' => $validation
        ];
        return view('user/lain-laba', $data);
    }
    public function lainp(): string
    {
        session();
        $validation = \Config\Services::validation();
        $data = [
            'validation' => $validation
        ];
        return view('user/lain-posisi', $data);
    }

    //laporan
    public function laporanb(): string
    {
        $model = new \App\Models\LaporanModel();
        $keyword = $this->request->getVar('keyword');
        if ($keyword){
            $search = $model->search($keyword);
        } else {
            $search = $model;
        }
        $current = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        $data = [
            'users' => $search->where(['kategori' => 'buku'])->paginate(5, 'users'),
            'pager' => $model->pager,
            'current' => $current,
        ];
        return view('user/laporan-buku', $data);
    }
    public function laporanj(): string
    {
        $model = new \App\Models\LaporanModel();
        $keyword = $this->request->getVar('keyword');
        if ($keyword){
            $search = $model->search($keyword);
        } else {
            $search = $model;
        }
        $current = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        $data = [
            'users' => $search->where(['kategori' => 'jurnal'])->paginate(5, 'users'),
            'pager' => $model->pager,
            'current' => $current,
        ];
        return view('user/laporan-jurnal', $data);
    }
    public function laporanl(): string
    {
        $model = new \App\Models\LaporanModel();
        $keyword = $this->request->getVar('keyword');
        if ($keyword){
            $search = $model->search($keyword);
        } else {
            $search = $model;
        }
        $current = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        $data = [
            'users' => $search->where(['kategori' => 'laba'])->paginate(5, 'users'),
            'pager' => $model->pager,
            'current' => $current,
        ];
        return view('user/laporan-laba', $data);
    }
    public function laporanp(): string
    {
        $model = new \App\Models\LaporanModel();
        $keyword = $this->request->getVar('keyword');
        if ($keyword){
            $search = $model->search($keyword);
        } else {
            $search = $model;
        }
        $current = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        $data = [
            'users' => $search->where(['kategori' => 'posisi'])->paginate(5, 'users'),
            'pager' => $model->pager,
            'current' => $current,
        ];
        return view('user/laporan-posisi', $data);
    }

    //pinjaman
    public function pinjamand(): string
    {
        $model = new \App\Models\PinjamanModel();
        $keyword = $this->request->getVar('keyword');
        if ($keyword){
            $search = $model->search($keyword);
        } else {
            $search = $model;
        }
        $current = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        $data = [
            'users' => $search->paginate(5, 'users'),
            'pager' => $model->pager,
            'current' => $current,
        ];
        return view('user/pinjaman-daftar', $data);
    }
    public function pinjamant(): string
    {
        session();
        $validation = \Config\Services::validation();
        $model = new \App\Models\AnggotaModel();
        $data = [
            'users' => $model->findAll(),
            'validation' => $validation
        ];
        return view('user/pinjaman-transaksi', $data);
    }

    //tabungan
    public function tabungand(): string
    {
        $model = new \App\Models\TabunganModel();
        $keyword = $this->request->getVar('keyword');
        if ($keyword){
            $search = $model->search($keyword);
        } else {
            $search = $model;
        }
        $current = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        $data = [
            'users' => $search->paginate(5, 'users'),
            'pager' => $model->pager,
            'current' => $current,
        ];
        return view('user/tabungan-daftar', $data);
    }
    public function tabungant(): string
    {
        session();
        $validation = \Config\Services::validation();
        $model = new \App\Models\AnggotaModel();
        $data = [
            'users' => $model->findAll(),
            'validation' => $validation
        ];
        return view('user/tabungan-transaksi', $data);
    }


    //save
    public function savedatat()
    {
        $rules = [
            'nama' => 'required|is_unique[anggota.nama]',
            'saldo' => 'required|integer'
        ];
        $message = [
            'nama' => [
            'required' => '{field} harus diisi',
            'is_unique' => '{field} sudah ada'
            ],
            'saldo' => [
            'required' => '{field} harus diisi',
            'integer' => '{field} harus berupa angka',
            ]
        ];
        if(!$this->validate($rules,$message)){
            $data = [
            'validation' => $this->validator
            ];
            return view('user/data-tambah', $data);
        }
        $create = new \App\Models\AnggotaModel();
        $create->save([
        'nama' => $this->request->getVar('nama'),
        'data' => 'data-default.xlsx',
        'saldo' => $this->request->getVar('saldo')
        ]); 
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('user/data/t');
    }
    public function savedataf()
    {
        $rules = [
            'nama' => 'required',
            'data' => 'uploaded[data]|ext_in[data,xls,xlsx]'
        ];
        $message = [
            'nama' => [
            'required' => '{field} harus diisi',
            ],
            'data' => [
            'required' => '{field} harus diisi',
            'ext_in' => '{field} harus berupa file excel',
            ]
        ];
        if(!$this->validate($rules,$message)){
            $model = new \App\Models\AnggotaModel();
            $data = [
            'users' => $model->findAll(),
            'validation' => $this->validator
            ];
            return view('user/data-file', $data);
        }
        $update = new \App\Models\AnggotaModel();
        $datauser = $this->request->getFile('data');
        $namadata = 'data-'.$this->request->getVar('nama').'.'.$datauser->guessExtension();
        $datauser->move('document', $namadata);
        $idfinder = $update->where('nama',$this->request->getVar('nama'))->findColumn('id');
        $data = [
        'data' => $namadata
        ]; 
        $update->update($idfinder, $data);
        session()->setFlashdata('pesan', 'data berhasil diupdate');
        return redirect()->to('user/data/f');
    }
    public function savelainl()
    {
        $rules = [
            'jumlah' => 'required|integer',
            'saldo' => 'required|integer',
            'status' => 'required'
        ];
        $message = [
            'nama' => [
            'required' => '{field} harus diisi',
            'integer' => '{field} harus berupa angka'
            ],
            'saldo' => [
            'required' => '{field} harus diisi',
            'integer' => '{field} harus berupa angka',
            ],
            'status' => [
            'required' => '{field} harus diisi'
            ]
        ];
        if(!$this->validate($rules,$message)){
            $data = [
            'validation' => $this->validator
            ];
            return view('user/lain-laba', $data);
        }
        $create = new \App\Models\LaporanModel();
        $tanggal = date('Y-m-d');
        $create->save([
        'jumlah' => $this->request->getVar('jumlah'),
        'kategori' => 'laba',
        'status' => $this->request->getVar('status'),
        'saldo' => $this->request->getVar('saldo'),
        'tanggal' => $tanggal
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('user/lain/l');
    }
    public function savelainp()
    {
        $rules = [
            'jumlah' => 'required|integer',
            'saldo' => 'required|integer',
            'status' => 'required'
        ];
        $message = [
            'nama' => [
            'required' => '{field} harus diisi',
            'integer' => '{field} harus berupa angka'
            ],
            'saldo' => [
            'required' => '{field} harus diisi',
            'integer' => '{field} harus berupa angka',
            ],
            'status' => [
            'required' => '{field} harus diisi'
            ]
        ]; 
        if(!$this->validate($rules,$message)){
            $data = [
            'validation' => $this->validator
            ];
            return view('user/lain-posisi', $data);
        }
        $create = new \App\Models\LaporanModel();
        $tanggal = date('Y-m-d');
        $create->save([
        'jumlah' => $this->request->getVar('jumlah'),
        'kategori' => 'posisi',
        'status' => $this->request->getVar('status'),
        'saldo' => $this->request->getVar('saldo'),
        'tanggal' => $tanggal
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('user/lain/');
    }
    public function savepinjamant()
    {
        $rules = [
            'nama' => 'required',
            'jumlah' => 'required|integer',
            'status' => 'required'
        ];
        $message = [
            'nama' => [
            'required' => '{field} harus diisi',
            ],
            'jumlah' => [
            'required' => '{field} harus diisi',
            'integer' => '{field} harus berupa angka',
            ],
            'status' => [
            'required' => '{field} harus diisi'
            ]
        ];
        if(!$this->validate($rules,$message)){
            $model = new \App\Models\AnggotaModel();
            $data = [
            'users' => $model->findAll(),
            'validation' => $this->validator
            ];
            return view('user/pinjaman-transaksi', $data);
        }
        $create = new \App\Models\PinjamanModel();
        $create->save([
        'nama' => $this->request->getVar('nama'),
        'jumlah' => $this->request->getVar('jumlah'),
        'status' => $this->request->getVar('status')
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('user/pinjaman/t');
    }
    public function savetabungant()
    {
        $rules = [
            'nama' => 'required',
            'jumlah' => 'required|integer',
            'status' => 'required'
        ];
        $message = [
            'nama' => [
            'required' => '{field} harus diisi',
            ],
            'jumlah' => [
            'required' => '{field} harus diisi',
            'integer' => '{field} harus berupa angka',
            ],
            'status' => [
            'required' => '{field} harus diisi'
            ]
        ];
        if(!$this->validate($rules,$message)){
            $model = new \App\Models\AnggotaModel();
            $data = [
            'users' => $model->findAll(),
            'validation' => $this->validator
            ];
            return view('user/tabungan-transaksi', $data);
        }
        $create = new \App\Models\TabunganModel();
        $create->save([
        'nama' => $this->request->getVar('nama'),
        'jumlah' => $this->request->getVar('jumlah'),
        'status' => $this->request->getVar('status')
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('user/tabungan/t');
    }


}
