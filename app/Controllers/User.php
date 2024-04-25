<?php

namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\ModelMember;
use App\Models\ModelRole;
use App\Models\ModelBuku;
use App\Models\ModelKoleksiBuku;
use App\Models\ModelPeminjaman;
use App\Models\ModelPengembalian;
use App\Models\ModelUlasan;


class User extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelMember = new ModelMember();
        $this->ModelRole = new ModelRole();
        $this->ModelBuku = new ModelBuku();
        $this->ModelKoleksiBuku = new ModelKoleksiBuku();
        $this->ModelUlasan  = new ModelUlasan ();
        $this->ModelPeminjaman = new ModelPeminjaman();
        $this->ModelPengembalian = new ModelPengembalian();

    }

    public function register()
    {
        $data = [
            'judul' => 'Register Member',
            'validation' => \Config\Services::validation()

        ];
        echo view('register', $data);
    }

    public function proses_register_member()
{
    if (!$this->validate([
        'email' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Email Harus diisi !',
            ]
        ],
        'username' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Username Harus diisi !',
            ]
        ],
        'nama_lengkap' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama Lengkap Harus diisi !',
            ]
        ],
        'no_telpon' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nomor Telpon Harus diisi !',
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[8]',
            'errors' => [
                'required' => 'Password Harus diisi !',
                'min_length' => 'Password Minimal 8!',
            ]
        ],
    ])) {
        // session()->setFlashdata('info', 'Semua Data Harus Diisi');
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->to(base_url('register'))->withInput();	
    } else {
        $request = \Config\Services::request();
        $username = $request->getVar('username');
        $password = $request->getVar('password');
        $email = $request->getVar('email');
        $no_telpon = $request->getVar('no_telpon');
        $nama_lengkap = $request->getVar('nama_lengkap');
        $alamat = $request->getVar('alamat');
        $jenis_kelamin = $request->getVar('jenis_kelamin');
        $dapatkan_member = $this->ModelMember->dapatkan_member($email)->getRow();
        if ($dapatkan_member) {
            // echo 'EMAIL SUDAH DIGUNAKAN';
            session()->setFlashdata('info', 'Email Sudah Di gunakan');
            return redirect()->to(base_url('register'));
        } else {
                $data = [
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'no_telpon' => $no_telpon,
                    'nama_lengkap' => $nama_lengkap,
                    'alamat' => $alamat,
                    'jenis_kelamin' => $jenis_kelamin,
                ];
                $tambah_member = $this->ModelMember->tambah_member($data);
                return redirect()->to(base_url('/login'));
            }
        }
    }

    public function login()
    {
        $data = [
            'judul' => 'Login Member',
            'validation' => \Config\Services::validation()
        ];
        echo view('login', $data);
    }

    public function proses_login_member()
    {
        $request = \Config\Services::request();
        $email = $request->getVar('email');
        $password = $request->getVar('password');
        $dapatkan_member = $this->ModelMember->dapatkan_member($email)->getRow();
    
        if ($dapatkan_member) {
            // Memeriksa kecocokan password tanpa menggunakan password_verify
            if ($password === $dapatkan_member->password) {
                // Menyimpan data user ke dalam sesi
                session()->set([
                    'id_member' => $dapatkan_member->id_member,
                    'email' => $dapatkan_member->email,
                    'username' => $dapatkan_member->username,
                    'nama_lengkap' => $dapatkan_member->nama_lengkap,
                    'alamat' => $dapatkan_member->alamat,
                    'no_telpon' => $dapatkan_member->no_telpon,
                    'jenis_kelamin' => $dapatkan_member->jenis_kelamin,
                    'status_login' => TRUE,
                ]);
                session()->setFlashdata('success', 'Anda Berhasil Login');
                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to(base_url('/login'));
            }
        } else {
            session()->setFlashdata('error', 'Akun Member Tidak Ditemukan!');
            return redirect()->to(base_url('/login'));
        }
    }

    public function keluar()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }

    public function profil_akun()
	{
		$email = session()->get('email');
		$status_login = session()->get('status_login');
        $dapatkan_member = $this->ModelMember->dapatkan_member($email)->getRow();
		if ($status_login == true) {
			if ($dapatkan_member) {
				$username = $dapatkan_member->username;
				$nama_lengkap = $dapatkan_member->nama_lengkap;
				$no_telpon = $dapatkan_member->no_telpon;
				$password = $dapatkan_member->password;
				$jenis_kelamin = $dapatkan_member->jenis_kelamin;

				$data = [
					// WAJIB START //
					'email' => $email,
					'username' => $username,
					'nama_lengkap' => $nama_lengkap,
					'no_telpon' => $no_telpon,
					'status_login' => $status_login,
					'password' => $password,
					'jenis_kelamin' => $jenis_kelamin,
				];
				echo view('profil_akun', $data);
			} else {
                session()->setFlashdata('error', 'Akun Member Tidak Ditemukan!');
                return redirect()->to(base_url('/login'));
			}
		} else {
            return redirect()->to(base_url('/login'));
		}
	}

    public function pinjam_buku($id_buku)
    {
        $status_login = session()->get('status_login');
        $id_member = session()->get('id_member');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $tanggal_pinjam = date("Y-m-d");
        
        $dapatkan_buku = $this->ModelBuku->dapatkan_buku($id_buku);
        // dd($dapatkan_buku);

        $id_buku = $dapatkan_buku->id_buku;
        $id_kategori_buku = $dapatkan_buku->id_kategori_buku;
        $judul = $dapatkan_buku->judul;
        $penulis = $dapatkan_buku->penulis;
        $penerbit = $dapatkan_buku->penerbit;
        $sinopsis = $dapatkan_buku->sinopsis;
        $stok = $dapatkan_buku->stok;
        $tahun_terbit = $dapatkan_buku->tahun_terbit;
        $sampul_buku = $dapatkan_buku->sampul_buku;
        $nama_kategori_buku = $dapatkan_buku->nama_kategori_buku;
        $semua_ulasan = $this->ModelUlasan->ulasanByBuku($id_buku);
        $avgRating = $this->ModelUlasan->avgRating($id_buku);
        $semua_ulasan = $this->ModelUlasan->ulasanByBuku($id_buku);

        if ($status_login == TRUE) {
            if ($id_member) {
                $data = [
                    'id_buku'  => $id_buku,
                    'id_member'  => $id_member,
                    'id_kategori_buku' => $id_kategori_buku,
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'status_login' => $status_login,
                    'tanggal_pinjam' => $tanggal_pinjam,
                    'judul' => $judul,
                    'penulis' => $penulis,
                    'penerbit' => $penerbit,
                    'sinopsis' => $sinopsis,
                    'stok' => $stok,
                    'tahun_terbit' => $tahun_terbit,
                    'sampul_buku' => $sampul_buku,
                    'semua_ulasan' => $semua_ulasan,
                    'nama_kategori_buku' => $nama_kategori_buku,
                ];
                echo view('pinjam_buku', $data) ;

            } else {
                session()->setFlashdata('info', 'Petugas Tidak Bisa Meminjam Buku');
                return redirect()->to(base_url('/'));
            }
        } else {
            return redirect()->to(base_url('/login'));
        }
    }

    public function proses_ulasan()
{
    $request = \Config\Services::request();
    $id_member = $request->getVar('id_member');
    $id_buku = $request->getVar('id_buku');
    $ulasan = $request->getVar('ulasan');
    $rating = $request->getVar('rating');
    $tanggal_ulasan = date('Y-m-d');
    
    $cek_user_ulasan = $this->ModelUlasan->cek_user_ulasan($id_member, $id_buku);
    $semua_ulasan = $this->ModelUlasan->ulasanByBuku($id_buku);

    if($cek_user_ulasan) {
        session()->setFlashdata('info', 'Anda Sudah Memberikan Ulasan');
        return redirect()->back();
    } else {
        // Memeriksa apakah ulasan tidak kosong atau tidak
        if(empty($ulasan)) {
            // Jika ulasan kosong, atur nilai default
            $ulasan = "Tidak Ada Ulasan";
        }
        
        $data = [
            'id_member' => $id_member,
            'id_buku' => $id_buku,
            'ulasan' => $ulasan,
            'rating' => $rating,
            'tanggal_ulasan' => $tanggal_ulasan,
        ];
        $tambah = $this->ModelUlasan->tambah_ulasan($data);
        session()->setFlashdata('success', 'Anda Berhasil Memberikan Ulasan');
        return redirect()->back();
    }
}


public function proses_pinjam_buku()
{
    $request = \Config\Services::request();
    $id_member = $request->getVar('id_member');
    $id_buku = $request->getVar('id_buku');
    $tanggal_peminjaman = $request->getVar('tanggal_peminjaman');
    $tanggal_pengembalian = $request->getVar('tanggal_pengembalian');
    $total_pinjam = $request->getVar('total_pinjam');
    $status_peminjaman = 'di-pinjam';

    // Dapatkan stok buku
    $dapatkan_buku = $this->ModelBuku->dapatkan_buku($id_buku);
    $stok_sekarang = $dapatkan_buku->stok;

    // Periksa jika stok cukup untuk dipinjam
    if ($stok_sekarang < $total_pinjam) {
        // Jika stok tidak mencukupi, munculkan alert
        session()->setFlashdata('error', 'Maaf Buku Yang Anda Pinjam Sudah Habis/Kurang Stoknya');
        return redirect()->to(base_url('/'));
    }

    // Verifikasi apakah buku sudah dipinjam oleh anggota
    $buku_dipinjam = $this->ModelPeminjaman->cek_buku_dipinjam($id_member, $id_buku);

    if ($buku_dipinjam) {
        // Jika buku sudah dipinjam, berikan pesan kesalahan atau ambil tindakan lain sesuai kebutuhan.
        session()->setFlashdata('error', 'Anda sudah meminjam buku ini sebelumnya.');
        return redirect()->to(base_url('/'));
    }

    $data = [
        'id_member' => $id_member,
        'id_buku' => $id_buku,
        'tanggal_peminjaman' => $tanggal_peminjaman,
        'tanggal_pengembalian' => $tanggal_pengembalian,
        'status_peminjaman' => $status_peminjaman,
        'total_pinjam' => $total_pinjam,
    ];
    $tambah_peminjaman = $this->ModelPeminjaman->tambah_peminjaman($data);

    // Update stok buku
    $stok_baru = $stok_sekarang - $total_pinjam;
    $ubah = $this->ModelBuku->edit_buku_dipinjam($id_buku, $stok_baru);

    session()->setFlashdata('success', 'Anda Berhasil Meminjam Buku');
    return redirect()->to(base_url('/'));
}


    public function koleksi_buku()
    {
        $status_login = session()->get('status_login');
        $id_member = session()->get('id_member');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $status_login = session()->get('status_login');
        $tanggal_pinjam = date("Y-m-d");
        
        $semua_koleksi_by_member = $this->ModelKoleksiBuku->semua_koleksi_by_member($id_member);

        if ($status_login == TRUE) {
            $data = [
                'semua_koleksi_by_member'  => $semua_koleksi_by_member,
                'status_login'  => $status_login,
                'nama_lengkap'  => $nama_lengkap,
            ];
            echo view('koleksi_buku', $data);
        } else {
            return redirect()->to(base_url('/login'));
        }
    }

    public function proses_tambah_koleksi()
    {
        $request = \Config\Services::request();
        $id_member = $request->getVar('id_member');
        $id_buku = $request->getVar('id_buku');
        $id_kategori_buku = $request->getVar('id_kategori_buku');
        $cek_user_koleksi = $this->ModelKoleksiBuku->cek_user_koleksi($id_member, $id_buku);

        if($cek_user_koleksi) {
            session()->setFlashdata('info', 'Buku Sudah Ada Dikoleksi');
            return redirect()->back();
        } else {
            $data = [
                'id_member' => $id_member,
                'id_buku' => $id_buku,
                'id_kategori_buku' => $id_kategori_buku,
            ];
            $tambah = $this->ModelKoleksiBuku->tambah_koleksi($data);
            session()->setFlashdata('success', 'Anda Berhasil Menambahkan Buku Ke Koleksi');
            return redirect()->back();
        }
    }

    public function hapus_koleksi_buku($id_buku)
    {
        $dapatkan_buku_koleksi = $this->ModelKoleksiBuku->dapatkan_buku_koleksi($id_buku);
        if (isset($dapatkan_buku_koleksi)) {
            $this->ModelKoleksiBuku->hapus_koleksi_buku($id_buku);
            session()->setFlashdata("success", "Berhasil Hapus Koleksi Buku");
            return redirect()->to(base_url('koleksi_buku'));
        } else {
            session()->setFlashdata("error", "Gagal Hapus Koleksi");
            return redirect()->to(base_url('koleksi_buku'));
        }
    }

    public function riwayat_peminjaman()
    {
        $status_login = session()->get('status_login');
        $id_member = session()->get('id_member');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $status_login = session()->get('status_login');
        
        $buku_dipinjam_by_member = $this->ModelPeminjaman->buku_dipinjam_by_member($id_member);

        if ($status_login == TRUE) {
            $data = [
                'buku_dipinjam_by_member'  => $buku_dipinjam_by_member,
                'status_login'  => $status_login,
                'judul'  => 'Riwayat Peminjaman',
                'nama_lengkap'  => $nama_lengkap
            ];
            echo view('riwayat_peminjaman', $data);
        } else {
            return redirect()->to(base_url('/login_member'));
        }
    }

    public function riwayat_pengembalian()
    {
        $status_login = session()->get('status_login');
        $id_member = session()->get('id_member');
        $nama_lengkap = session()->get('nama_lengkap');
        $email = session()->get('email');
        $status_login = session()->get('status_login');
        $tanggal_pinjam = date("Y-m-d");
        
        $buku_dikembalikan_by_member = $this->ModelPengembalian->buku_dikembalikan_by_member($id_member);

        if ($status_login == TRUE) {
            $data = [
                'buku_dikembalikan_by_member'  => $buku_dikembalikan_by_member,
                'status_login'  => $status_login,
                'judul'  => 'Riwayat Pengembalian',
                'nama_lengkap'  => $nama_lengkap
            ];
            echo view('riwayat_pengembalian', $data);
        } else {
            return redirect()->to(base_url('/login_member'));
        }
    }
}