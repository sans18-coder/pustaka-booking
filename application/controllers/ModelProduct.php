<?php
defined('BASEPATH') or exit('No direct script acces allowed');
class ModelProduct extends CI_Model
{
    // manajemen products
    public function getProducts()
    {
        return $this->db->get('products');
    }

    public function productsWhere($where)
    {
        return $this->db->get_where('products', $where);
    }

    public function simpanProducts($data = null)
    {
        $this->db->insert('products', $data);
    }

    public  function updateProducts($data = null, $where = null)
    {
        $this->db->update('products', $data, $where);
    }

    public  function hapusProducts($where = null)
    {
        $this->db->delete('products', $where);
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('products');
        return $this->db->get()->row($field);
    }
}