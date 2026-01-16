<?php
class Menu_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('menu')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('menu',['id'=>$id])->row();
    }

    public function reduce_stock($id,$qty)
    {
        $this->db->set('stok','stok-'.$qty,false);
        $this->db->where('id',$id);
        $this->db->update('menu');
    }
    public function update_stok($id, $qty)
    {
        $this->db->set('stok', 'stok-'.$qty, FALSE);
        $this->db->where('id', $id);
        return $this->db->update('menu');
    }
}
