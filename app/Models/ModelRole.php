<?php
namespace App\Models;
use CodeIgniter\Model;

class ModelRole extends Model
{
    protected $table = 'tb_role';
    protected $primaryKey = 'id_role';
    protected $allowedFields = ['nama_lengkap', 'alamat', 'role', 'email','no_telpon', 'password'];

    public function dapatkan_petugas($id_role = false)
    {
        if ($id_role === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_role' => $id_role]);
        }
    }

    public function dapatkan_user_role($email = false)
    {
        if ($email === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['email' => $email]);
        }
    }

    public function semua_admin()
    {
        $query = $this->db->table($this->table);
        $batasan = $query->select('*')
            ->where('role', 'admin')
            ->get()
            ->getResultArray();
        return $batasan;
    }

    public function semua_petugas()
    {
        $query = $this->db->table($this->table);
        $batasan = $query->select('*')
            ->where('role', 'petugas')
            ->get()
            ->getResultArray();
        return $batasan;
    }

    public function tambah_petugas($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function edit_admin($data, $id_role)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_role', $id_role);
        return $builder->update($data);
    }

    public function hapus_admin($id_role)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_role' => $id_role]);
    }

    public function total_petugas()
    {
        $query = $this->db->table($this->table)
            ->select('COUNT(DISTINCT id_role) as total_petugas')
            ->where('role', 'petugas')
            ->get();

        return $query->getRow();
    }

    public function total_admin()
    {
        $query = $this->db->table($this->table)
            ->select('COUNT(DISTINCT id_role) as total_admin')
            ->where('role', 'admin')
            ->get();

        return $query->getRow();
    }
}