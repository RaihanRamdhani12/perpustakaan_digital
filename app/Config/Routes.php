<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::home');

// User
$routes->get('/login', 'User::login');
$routes->post('/proses_login_member', 'User::proses_login_member');
$routes->get('/register', 'User::register');
$routes->post('/proses_register_member', 'User::proses_register_member');
$routes->get('/keluar', 'User::keluar');
$routes->get('/pinjam_buku/(:segment)', 'User::pinjam_buku/$1');
$routes->post('/proses_pinjam_buku', 'User::proses_pinjam_buku');
$routes->post('/proses_edit_peminjaman', 'Petugas::proses_edit_peminjaman');

// Ulasan
$routes->post('/proses_ulasan', 'User::proses_ulasan');

// Koleksi Buku
$routes->get('/koleksi_buku', 'User::koleksi_buku');
$routes->post('/proses_tambah_koleksi', 'User::proses_tambah_koleksi');
$routes->get('/hapus_koleksi_buku/(:segment)', 'User::hapus_koleksi_buku/$1');

// Buku
$routes->get('/daftar_buku', 'Admin::daftar_buku');
$routes->post('/proses_tambah_buku', 'Admin::proses_tambah_buku');
$routes->post('/proses_edit_buku', 'Admin::proses_edit_buku');
$routes->get('/hapus_buku/(:segment)', 'Admin::hapus_buku/$1');

// admin 
$routes->get('/dashboard_admin', 'Admin::dashboard_admin');
$routes->get('/dashboard_admin', 'Admin::dashboard_admin');

$routes->get('/login_petugas', 'Admin::login_petugas');
$routes->post('/proses_login_petugas', 'Admin::proses_login_petugas');
$routes->get('/keluar_petugas', 'Admin::keluar_petugas');

// admin kategori buku
$routes->get('/kategori_buku', 'Admin::kategori_buku');
$routes->post('/proses_edit_kategori_buku', 'Admin::proses_edit_kategori_buku');
$routes->post('/proses_edit_kategori', 'Admin::proses_edit_kategori');
$routes->get('/sub_kategori', 'Admin::sub_kategori');
$routes->post('/proses_tambah_sub_kategori', 'Admin::proses_tambah_sub_kategori');
$routes->post('/proses_tambah_kategori_buku', 'Admin::proses_tambah_kategori_buku');
$routes->post('/proses_edit_sub_kategori', 'Admin::proses_edit_sub_kategori');
$routes->get('/hapus_kategori_buku/(:segment)', 'Admin::hapus_kategori_buku/$1');
$routes->post('admin/getDataByKategori', 'Admin::loadSubKategori');
$routes->get('/hapus_sub_kategori/(:segment)', 'Admin::hapus_sub_kategori/$1');

// admin buku
$routes->get('/daftar_buku', 'Admin::daftar_buku');
$routes->post('/proses_tambah_buku', 'Admin::proses_tambah_buku');
$routes->post('/proses_edit_buku', 'Admin::proses_edit_buku');
$routes->get('/hapus_buku/(:segment)', 'Admin::hapus_buku/$1');

// petugas
$routes->get('/dashboard_petugas', 'Petugas::dashboard_petugas');
$routes->get('/daftar_peminjam', 'Petugas::daftar_peminjam');
$routes->post('/proses_edit_peminjaman', 'Petugas::proses_edit_peminjaman');
$routes->get('/daftar_pengembalian', 'Petugas::daftar_pengembalian');
$routes->post('/cetak_peminjaman', 'Petugas::cetak_peminjaman');
$routes->post('/cetak_pengembalian', 'Petugas::cetak_pengembalian');
$routes->get('/daftar_peminjam', 'Petugas::daftar_peminjam');
$routes->get('/rekap_peminjaman', 'Petugas::rekap_peminjaman');
$routes->get('/rekap_pengembalian', 'Petugas::rekap_pengembalian');

// admin daftar admin
$routes->get('/daftar_admin', 'Admin::daftar_admin');
$routes->post('/proses_tambah_admin', 'Admin::proses_tambah_admin');
$routes->post('/proses_edit_admin', 'Admin::proses_edit_admin');
$routes->get('/hapus_admin/(:segment)', 'Admin::hapus_admin/$1');

// admin daftar petugas
$routes->get('/daftar_petugas', 'Admin::daftar_petugas');
$routes->post('/proses_tambah_petugas', 'Admin::proses_tambah_petugas');
$routes->post('/proses_edit_petugas', 'Admin::proses_edit_petugas');
$routes->get('/hapus_petugas/(:segment)', 'Admin::hapus_petugas/$1');

// admin daftar member
$routes->get('/daftar_member', 'Admin::daftar_member');

// Pinjam Buku
$routes->get('/pinjam_buku/(:segment)', 'Member::pinjam_buku/$1');
$routes->post('/proses_pinjam_buku', 'Member::proses_pinjam_buku');
$routes->get('/buku_dipinjam', 'PinjamBuku::buku_dipinjam');
$routes->get('/pinjam_buku', 'User::pinjam_buku');

// Riwayat Peminjaman
$routes->get('/riwayat_peminjaman', 'User::riwayat_peminjaman');
$routes->get('/riwayat_pengembalian', 'User::riwayat_pengembalian');

// Profil Akun
$routes->get('/profil_akun', 'User::profil_akun');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}