<?php

namespace App\Controllers;
use App\Models\ModelMember;
use App\Models\ModelBuku;


class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelMember = new ModelMember();
        $this->ModelBuku = new ModelBuku();
    }
    
    public function home()
    {
        $status_login = session()->get('status_login');
        $email = session()->get('email');
        $nama_lengkap = session()->get('nama_lengkap');
        $id_member = session()->get('id_member');
        $username = session()->get('username');
        $dapatkan_member = $this->ModelMember->dapatkan_member($email)->getRow();
        $semua_buku = $this->ModelBuku->semua_buku();

        $cari_buku = $this->request->getGet('cari_buku');
        if ($cari_buku) {
            $semua_buku = $this->ModelBuku->cari_buku($cari_buku);
        }
        $data = [
            'semua_buku' => $semua_buku,  
            'status_login' => $status_login,  
            'username' => $username,  
            'email' => $email,  
            'nama_lengkap' => $nama_lengkap,  
        ];
        return view('home', $data);
    }
}