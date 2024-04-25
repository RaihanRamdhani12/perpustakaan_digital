<?php

namespace App\Controllers;

use App\Models\ModelKategoriBuku;
use App\Models\ModelBuku;
use App\Models\ModelRole;
use App\Models\ModelMember;
use App\Models\ModelSubKategori;


class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelKategoriBuku = new ModelKategoriBuku();
        $this->ModelBuku = new ModelBuku();
        $this->ModelRole = new ModelRole();
        $this->ModelMember = new ModelMember();
        $this->ModelSubKategori = new ModelSubKategori();
    }

    public function dashboard_admin()
    {
        // data sesion wajib
        $status_login = session()->get('status_login');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $role = session()->get('role');

        $total_buku = $this->ModelBuku->total_buku();
        $total_kategori = $this->ModelKategoriBuku->total_kategori();
        $total_admin = $this->ModelRole->total_admin();
        $total_petugas = $this->ModelRole->total_petugas();
        $total_member = $this->ModelMember->total_member();

        if ($status_login == TRUE) {
            if ($role == 'admin') {
                $data = [
                    'judul' => 'Dashboard Admin',
                    'total_buku' => $total_buku,
                    'total_kategori' => $total_kategori,
                    'total_admin' => $total_admin,
                    'total_petugas' => $total_petugas,
                    'total_member' => $total_member,
                    // data sesion wajib
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'nama_lengkap' => $nama_lengkap,
                    'role' => $role,
                ];
                echo view('admin/layout/head', $data);
                echo view('admin/layout/side');
                echo view('admin/layout/nav');
                echo view('admin/dashboard_admin');
                echo view('admin/layout/script');
            } else {
                return redirect()->to(base_url('/not_found'));            
            }
        } else {
            return redirect()->to(base_url('/login_petugas'));
        }
    }

    public function proses_login_petugas()
    {
        $request = \Config\Services::request();
        $email = $request->getVar('email');
        $nama_lengkap = $request->getVar('nama_lengkap');
        $password = $request->getVar('password');
        // dd($email);
        $dapatkan_user_role = $this->ModelRole->dapatkan_user_role($email)->getRow();
    
        if ($dapatkan_user_role) {
            // Memeriksa kecocokan password tanpa menggunakan password_verify
            if ($password === $dapatkan_user_role->password) {
                if ($dapatkan_user_role->role == 'admin') {
                    // Menyimpan data user ke dalam sesi
                    session()->set([
                        'email' => $dapatkan_user_role->email,
                        'status_login' => TRUE,
                        'nama_lengkap' => $dapatkan_user_role->nama_lengkap,
                        'role' =>  $dapatkan_user_role->role,
                    ]);
                    session()->setFlashdata('success', 'Anda Berhasil Login');
                    return redirect()->to(base_url('/dashboard_admin'));
                } else {
                    session()->set([
                        'email' => $dapatkan_user_role->email,
                        'status_login' => TRUE,
                        'nama_lengkap' => $dapatkan_user_role->role,
                        'role' => $dapatkan_user_role->role
                    ]);
                    // echo 'berhasil';
                    session()->setFlashdata('success', 'Anda Berhasil Login');
                    return redirect()->to(base_url('/dashboard_petugas'));
                }
                
            } else {
                // echo 'salah';
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to(base_url('/login_petugas'));
            }
        } else {
            // echo 'ga ketemu woi';
            session()->setFlashdata('error', 'Akun Tidak Ditemukan!');
            return redirect()->to(base_url('/login_petugas'));
        }
    }

    public function keluar_petugas()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login_petugas'));
    }

    public function login_petugas()
    {
        $data = [
            'judul' => 'Login Petugas',
            'validation' => \Config\Services::validation()
        ];
        echo view('login_petugas', $data);
    }


    public function daftar_admin()
    {
        // data sesion wajib
        $status_login = session()->get('status_login');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $role = session()->get('role');
        $semua_admin = $this->ModelRole->semua_admin();

        if ($status_login == TRUE) {
            if ($role == 'admin') {
                $data = [
                    'judul' => 'Daftar Admin',
                    // data sesion wajib
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'semua_admin' => $semua_admin,
                    'nama_lengkap' => $nama_lengkap,
                    'role' => $role,
                ];
                echo view('admin/layout/head', $data);
                echo view('admin/layout/side');
                echo view('admin/layout/nav');
                echo view('admin/daftar_admin');
                echo view('admin/layout/script');
            } else {
                return redirect()->to(base_url('/login_petugas'));    
                // echo 'Salah';        
            }
        } else {
            return redirect()->to(base_url('/login_petugas'));
        }
    }

    public function proses_tambah_admin() 
    {
        $request = \Config\Services::request();
        $nama_lengkap = $this->request->getPost('nama_lengkap');
        $alamat = $this->request->getPost('alamat');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $no_telpon = $this->request->getPost('no_telpon');
        $role = $this->request->getPost('role');

        $data = [
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'alamat' => $alamat,
            'password' => $password,
            'role' => $role,
            'no_telpon' => $no_telpon,
        ];
        $this->ModelRole->tambah_petugas($data);
        session()->setFlashdata("success", "Berhasil Tambah Admin");
        return redirect()->to(base_url('daftar_admin'));
    }

    public function proses_edit_admin() 
    {
        $request = \Config\Services::request();
        $id_role = $this->request->getPost('id_role');
        $nama_lengkap = $this->request->getPost('nama_lengkap');
        $alamat = $this->request->getPost('alamat');
        $email = $this->request->getPost('email');
        $no_telpon = $this->request->getPost('no_telpon');
        $role = $this->request->getPost('role');
        $password = $this->request->getPost('password');

        $data = [
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'alamat' => $alamat,
            'role' => $role,
            'no_telpon' => $no_telpon,
            'password' => $password,
        ];
        $this->ModelRole->edit_admin($data, $id_role);
        session()->setFlashdata("success", "Berhasil Edit Admin");
        return redirect()->to(base_url('daftar_admin'));
    }
    
    public function hapus_admin($id_role)
    {
        $dapatkan_admin = $this->ModelRole->dapatkan_petugas($id_role);
        if (isset($dapatkan_admin)) {
            $this->ModelRole->hapus_admin($id_role);
            session()->setFlashdata("success", "Berhasil Hapus Admin");
            return redirect()->to(base_url('daftar_admin'));
        } else {
            session()->setFlashdata("error", "Gagal Hapus Admin");
            return redirect()->to(base_url('daftar_admin'));
        }
    }
    public function daftar_petugas()
    {
        // data sesion wajib
        $status_login = session()->get('status_login');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $role = session()->get('role');
        $semua_petugas = $this->ModelRole->semua_petugas();

        if ($status_login == TRUE) {
            if ($role == 'admin') {
                $data = [
                    'judul' => 'Daftar Admin',
                    // data sesion wajib
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'semua_petugas' => $semua_petugas,
                    'nama_lengkap' => $nama_lengkap,
                    'role' => $role,
                ];
                echo view('admin/layout/head', $data);
                echo view('admin/layout/side');
                echo view('admin/layout/nav');
                echo view('admin/daftar_petugas');
                echo view('admin/layout/script');
            } else {
                return redirect()->to(base_url('/login_petugas'));
                // echo 'salah';         
            }
        } else {
            return redirect()->to(base_url('/login_petugas'));
        }
    }

    public function proses_tambah_petugas() 
    {
        $request = \Config\Services::request();
        $nama_lengkap = $this->request->getPost('nama_lengkap');
        $alamat = $this->request->getPost('alamat');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $no_telpon = $this->request->getPost('no_telpon');
        $role = $this->request->getPost('role');
        $data = [
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'alamat' => $alamat,
            'password' => $password,
            'role' => $role,
            'no_telpon' => $no_telpon,
        ];
        $this->ModelRole->tambah_petugas($data);
        session()->setFlashdata("success", "Berhasil Tambah Petugas");
        return redirect()->to(base_url('daftar_petugas'));
    }

    public function proses_edit_petugas() 
    {
        $request = \Config\Services::request();
        $id_role = $this->request->getPost('id_role');
        $nama_lengkap = $this->request->getPost('nama_lengkap');
        $alamat = $this->request->getPost('alamat');
        $email = $this->request->getPost('email');
        $no_telpon = $this->request->getPost('no_telpon');
        $role = $this->request->getPost('role');
        $password = $this->request->getPost('password');

        $data = [
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'alamat' => $alamat,
            'role' => $role,
            'no_telpon' => $no_telpon,
            'password' => $password,
        ];
        $this->ModelRole->edit_admin($data, $id_role);
        session()->setFlashdata("success", "Berhasil Edit Petugas");
        return redirect()->to(base_url('daftar_petugas'));
    }
    
    public function hapus_petugas($id_role)
    {
        $dapatkan_admin = $this->ModelRole->dapatkan_petugas($id_role);
        if (isset($dapatkan_admin)) {
            $this->ModelRole->hapus_admin($id_role);
            session()->setFlashdata("success", "Berhasil Hapus Petugas");
            return redirect()->to(base_url('daftar_petugas'));
        } else {
            session()->setFlashdata("error", "Gagal Hapus Petugas");
            return redirect()->to(base_url('daftar_petugas'));
        }
    }

    public function daftar_member()
    {
        $status_login = session()->get('status_login');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $role = session()->get('role');
        $semua_member = $this->ModelMember->semua_member();

        if ($status_login == TRUE) {
            if ($role == 'admin') {
                $data = [
                    'judul' => 'Daftar Admin',
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'semua_member' => $semua_member,
                    'nama_lengkap' => $nama_lengkap,
                    'role' => $role,
                ];
                echo view('admin/layout/head', $data);
                echo view('admin/layout/side');
                echo view('admin/layout/nav');
                echo view('admin/daftar_member');
                echo view('admin/layout/script');
            } else {
                // return redirect()->to(base_url('/not_found'));   
                echo 'salah';         
            }
        } else {
            return redirect()->to(base_url('/login_petugas'));
        }
    }


    // BUKU
    public function kategori_buku()
    {
        $status_login = session()->get('status_login');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $role = session()->get('role');

        $semua_kategori_buku = $this->ModelKategoriBuku->semua_kategori_buku();
        $kode_kategori = $this->ModelKategoriBuku->kode_kategori();
        $data = [
            'judul' => 'Kategori Buku',
            'semua_kategori_buku' => $semua_kategori_buku,
            'kode_kategori' => $kode_kategori,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'nama_lengkap' => $nama_lengkap,
            'role' => $role,
        ];
        echo view('admin/layout/head', $data);
        echo view('admin/layout/side');
        echo view('admin/layout/nav');
        echo view('admin/kategori_buku');
        echo view('admin/layout/script');
    }

    public function proses_tambah_kategori_buku()
    {
        $id_kategori_buku = $this->request->getPost('id_kategori_buku');
        $nama_kategori_buku = $this->request->getPost('nama_kategori_buku');
        $data = [
            'nama_kategori_buku' => $nama_kategori_buku,
            'id_kategori_buku ' => $id_kategori_buku ,
        ];
        $simpan = $this->ModelKategoriBuku->tambah_kategori_buku($data);
        session()->setFlashdata('success', 'Berhasil Tambah Kategori Buku !');
        return redirect()->to(base_url('/kategori_buku'));
    }

    public function proses_edit_kategori_buku()
    {
        $id_kategori_buku = $this->request->getPost('id_kategori_buku');
        $nama_kategori_buku = $this->request->getPost('nama_kategori_buku');
        $data = [
            'nama_kategori_buku' => $nama_kategori_buku,
            'nama_kategori_buku' => $nama_kategori_buku
        ];
        $simpan = $this->ModelKategoriBuku->edit_kategori_buku($data, $id_kategori_buku);
        session()->setFlashdata('success', 'Berhasil Edit Kategori Buku !');
        return redirect()->to(base_url('/kategori_buku'));
    }

    public function hapus_kategori_buku($id_kategori_buku)
    {
        $dapatkanKategoriBuku = $this->ModelKategoriBuku->dapatkanKategoriBuku($id_kategori_buku)->getRow();
        
        if (isset($dapatkanKategoriBuku)) {
            $this->ModelKategoriBuku->hapus_kategori_buku($id_kategori_buku);
            session()->setFlashdata("success", "Berhasil Hapus Kategori Buku");
            return redirect()->to(base_url('kategori_buku'));
        } else {
            session()->setFlashdata("error", "Gagal Hapus Kategori Buku");
            return redirect()->to(base_url('kategori_buku'));
        }
    }

    public function daftar_buku()
    {
        $status_login = session()->get('status_login');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $role = session()->get('role');

        $semua_kategori_buku = $this->ModelKategoriBuku->semua_kategori_buku();
        $semua_buku = $this->ModelBuku->semua_buku();
        $kode_buku = $this->ModelBuku->kode_buku();
        $data = [
            'judul' => 'Daftar Buku',
            'semua_kategori_buku' => $semua_kategori_buku,
            'semua_buku' => $semua_buku,
            'kode_buku' => $kode_buku,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'role' => $role,
        ];
        echo view('admin/layout/head', $data);
        echo view('admin/layout/side');
        echo view('admin/layout/nav');
        echo view('admin/daftar_buku');
        echo view('admin/layout/script');
    }

    public function proses_tambah_buku()
    {
        $request = \Config\Services::request();
        $id_buku = $this->request->getPost('id_buku');
        // dd($id_buku);           
        $judul = $this->request->getPost('judul');
        $id_kategori_buku = $this->request->getPost('id_kategori_buku');
        $penerbit = $this->request->getPost('penerbit');
        $penulis = $this->request->getPost('penulis');
        $tahun_terbit = $this->request->getPost('tahun_terbit');
        $id_sub_kategori = $this->request->getPost('id_sub_kategori');
        $sinopsis = $request->getPost('sinopsis');
        $stok = $request->getPost('stok');
        $sampul_buku = $request->getFile('sampul_buku');

        $id_kategori_buku = ($id_kategori_buku !== null) ? $id_kategori_buku : 'null';
        $id_sub_kategori = ($id_sub_kategori != null) ? $id_sub_kategori : 'null';
    
        $direktori_foto = 'buku';
        $fileName = $judul . '_' . time() . '.png';
    
        $data = [
            'judul' => $judul,
            'id_buku' => $id_buku,
            'id_kategori_buku' => $id_kategori_buku,
            'id_sub_kategori' => $id_sub_kategori,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahun_terbit' => $tahun_terbit,
            'stok' => $stok,
            'sinopsis' => $sinopsis,
            'sampul_buku' => $fileName,
        ];
        // dd($data);
    
        $this->ModelBuku->tambah_buku($data);
    
        $sampul_buku->move($direktori_foto, $fileName);
        session()->setFlashdata('success', 'Data Berhasil Ditambah');
        return redirect()->to(base_url('daftar_buku'));
    }

    public function proses_edit_buku()
    {
        $request = \Config\Services::request();
        $judul = $this->request->getPost('judul');
        $id_buku = $this->request->getPost('id_buku');
        $id_kategori_buku = $this->request->getPost('id_kategori_buku');
        $penulis = $this->request->getPost('penulis');
        $penerbit = $this->request->getPost('penerbit');
        $tahun_terbit = $this->request->getPost('tahun_terbit');
        $sampul_buku = $request->getFile('sampul_buku');
        $direktori_foto = 'buku';
        $fileName = $judul . '_' . time() . '.png';
        // Jika sampul_buku tidak null dan valid, maka proses
        if ($sampul_buku && $sampul_buku->isValid()) {
            $buku = $this->ModelBuku->dapatkan_buku($id_buku);
            $sampul_lama = $buku->sampul_buku;
    
            // Hapus file lama jika ada
            if ($sampul_lama && file_exists($direktori_foto . '/' . $sampul_lama)) {
                unlink($direktori_foto . '/' . $sampul_lama);
            }
    
            // Update data buku
            $data = [
                'judul' => $judul,
                'id_buku' => $id_buku,
                'id_kategori_buku' => $id_kategori_buku,
                'penulis' => $penulis,
                'penerbit' => $penerbit,
                'tahun_terbit' => $tahun_terbit,
                'sampul_buku' => $fileName,
            ];
    
            $simpan = $this->ModelBuku->edit_buku($data, $id_buku);
    
            // Pindahkan file sampul_buku
            $sampul_buku->move($direktori_foto, $fileName);
            session()->setFlashdata('success', 'Data Berhasil Diubah');
            return redirect()->to(base_url('daftar_buku'));

        } else {
            // Jika sampul buku nya null maka update tanpa sampul
            $data = [
                'judul' => $judul,
                'id_buku' => $id_buku,
                'id_kategori_buku' => $id_kategori_buku,
                'penulis' => $penulis,
                'penerbit' => $penerbit,
                'tahun_terbit' => $tahun_terbit,
            ];
    
            $simpan = $this->ModelBuku->edit_buku($data, $id_buku);
            session()->setFlashdata('success', 'Data Berhasil Diubah');
            return redirect()->to(base_url('daftar_buku'));
        }    
    }

    public function proses_edit_sub_kategori()
    {
        $id_sub_kategori = $this->request->getPost('id_sub_kategori');
        $id_kategori_buku = $this->request->getPost('id_kategori_buku');
        $nama_sub_kategori = $this->request->getPost('nama_sub_kategori');
        $data = [
            'id_sub_kategori' => $id_sub_kategori,
            'id_kategori_buku' => $id_kategori_buku,
            'nama_sub_kategori' => $nama_sub_kategori,        
        ];
        $simpan = $this->ModelSubKategori->edit_sub_kategori($data, $id_sub_kategori);
        session()->setFlashdata('success', 'Berhasil Edit Sub Kategori !');
        return redirect()->to(base_url('/sub_kategori'));
    }

    public function loadSubKategori () {
        $id_kategori_buku = $this->request->getPost('id_kategori_buku');

        $getSubByKategori = $this->ModelSubKategori->getSubByKategori($id_kategori_buku);
        $data = [
            'semua_sub_kategori' => $getSubByKategori,
        ];
        return view('admin/loadSubKategori', $data);
    }
    
    public function hapus_sub_kategori($id_sub_kategori)
    {
        $dapatkanSubKategori = $this->ModelSubKategori->dapatkanSubKategori($id_sub_kategori);
        if (isset($dapatkanSubKategori)) {
            $this->ModelSubKategori->hapus_sub_kategori($id_sub_kategori);
            session()->setFlashdata("success", "Berhasil Hapus Sub Kategori");
            return redirect()->to(base_url('sub_kategori'));
        } else {
            session()->setFlashdata("error", "Gagal Hapus Sub Kategori");
            return redirect()->to(base_url('sub_kategori'));
        }
    }

    public function sub_kategori()
    {
        // data sesion wajib
        $status_login = session()->get('status_login');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $role = session()->get('role');

        $semua_sub_kategori = $this->ModelSubKategori->semua_sub_kategori();
        $semua_kategori_buku = $this->ModelKategoriBuku->semua_kategori_buku();
        $kode_sub = $this->ModelSubKategori->kode_sub();

        if ($status_login == TRUE) {
            if ($role == 'admin') {
                $data = [
                    'judul' => 'Sub Kategori',
                    'semua_sub_kategori' => $semua_sub_kategori,
                    'semua_kategori_buku' => $semua_kategori_buku,
                    'kode_sub' => $kode_sub,
                    // data sesion wajib
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'nama_lengkap' => $nama_lengkap,
                    'role' => $role,
                ];
                echo view('admin/layout/head', $data);
                echo view('admin/layout/side');
                echo view('admin/layout/nav');
                echo view('admin/sub_kategori');
                echo view('admin/layout/script');
            } else {
                return redirect()->to(base_url('/not_found'));            
            }
        } else {
            return redirect()->to(base_url('/login_petugas'));
        }
    }

    public function proses_tambah_sub_kategori()
    {
        $nama_sub_kategori = $this->request->getPost('nama_sub_kategori');
        $id_kategori_buku = $this->request->getPost('id_kategori_buku');
        $id_sub_kategori = $this->request->getPost('id_sub_kategori');
        $data = [
            'id_kategori_buku' => $id_kategori_buku,
            'id_sub_kategori' => $id_sub_kategori,
            'nama_sub_kategori' => $nama_sub_kategori,

        ];
        $simpan = $this->ModelSubKategori->tambah_sub_kategori($data);
        session()->setFlashdata('success', 'Berhasil Sub Kategori Buku !');
        return redirect()->to(base_url('/sub_kategori'));
    }

    public function proses_edit_kategori()
    {
        $request = \Config\Services::request();
        $id_buku = $this->request->getPost('id_buku');
        $id_kategori_buku = $this->request->getPost('id_kategori_buku');
        $id_sub_kategori = $this->request->getPost('id_sub_kategori');
        
        // Update data buku
        $data = [
            'id_kategori_buku' => $id_kategori_buku,
            'id_sub_kategori' => $id_sub_kategori,
        ];

        $simpan = $this->ModelBuku->edit_buku($data, $id_buku);

        session()->setFlashdata('success', 'Data Berhasil Diubah');
        return redirect()->to(base_url('daftar_buku'));
    }

    public function hapus_buku($id_buku)
{
    $dapatkan_buku = $this->ModelBuku->dapatkan_buku($id_buku);
    if ($dapatkan_buku) {
        $direktori_foto = 'buku';
        // Hapus file sampul_buku jika ada
        if ($dapatkan_buku->sampul_buku && file_exists($direktori_foto . '/' . $dapatkan_buku->sampul_buku)) {
            unlink($direktori_foto . '/' . $dapatkan_buku->sampul_buku);
        }
        // Hapus data buku dari database
        $this->ModelBuku->hapus_buku($id_buku);

        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('daftar_buku'));
    } else {
        session()->setFlashdata('error', 'Data Buku Tidak Ditemukan');
        return redirect()->to(base_url('daftar_buku'));
    }
}

}