<?php
class Trip_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Mengambil semua trips
    public function get_all_trips()
    {
        $query = $this->db->get('trips');
        return $query->result();
    }

    // Menambahkan trip baru
    public function add_trip($data)
    {
        return $this->db->insert('trips', $data);
    }

    // Mengupdate trip
    public function update_trip($id, $data)
    {
        return $this->db->where('id', $id)->update('trips', $data);
    }

    // Menghapus trip
    public function delete_trip($id)
    {
        return $this->db->where('id', $id)->delete('trips');
    }
}
