<?php
class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Mengambil semua pengguna
    public function get_all_users()
    {
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('users');
        return $query->result();
    }

    // Mengambil satu pengguna berdasarkan ID
    public function get_user_by_id($id)
    {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }

    // Menambahkan pengguna baru
    public function add_user($data)
    {
        return $this->db->insert('users', $data);
    }

    // Memperbarui data pengguna
    public function update_user($id, $data)
    {
        return $this->db->where('id', $id)->update('users', $data);
    }

    // Menghapus pengguna
    public function delete_user($id)
    {
        return $this->db->where('id', $id)->delete('users');
    }

    public function validate_user($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password); 
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return true;  // Credentials are valid
        } else {
            return false; // Invalid credentials
        }
    }
}
