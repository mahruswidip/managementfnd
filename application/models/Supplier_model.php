<?php

class Supplier_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get suppliers by supplier_id
     */
    function get_supplier($supplier_id)
    {
        return $this->db->get_where('suppliers', array('supplier_id' => $supplier_id))->row_array();
    }

    public function get_supplier_by_id($supplier_id)
{
    $this->db->where('supplier_id', $supplier_id);
    $query = $this->db->get('suppliers');
    return $query->row_array();
}

    /*
     * Get all suppliers count
     */
    function get_all_supplier_count()
    {
        $this->db->from('suppliers');
        return $this->db->count_all_results();
    }

    /*
     * Get all suppliers
     */
    function get_all_supplier($params = array())
    {
        $this->db->order_by('suppliers.supplier_id', 'asc');
        // $this->db->join('tbl_users', 'tbl_users.supplier_id=suppliers.supplier_id', 'left');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('suppliers')->result_array();
    }

    function get_users_by_created_by($user_id)
    {
        $this->db->join('suppliers', 'suppliers.supplier_id=tbl_users.supplier_id', 'left');
        return $this->db->get_where('tbl_users', array('created_by' => $user_id))->result_array();
    }

    /*
     * function to add new suppliers
     */
    function add_supplier($params)
    {
        $this->db->insert('suppliers', $params);
        return $this->db->insert_id();
    }


    function register($user_name, $user_email, $user_password)
    {
        $data_user = array(
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_password' => $user_password
        );
        // var_dump($data_user);
        $this->db->insert('tbl_users', $data_user);
    }

    /*
     * function to update suppliers
     */
    function update_supplier($supplier_id, $params)
    {
        $this->db->where('supplier_id', $supplier_id);
        return $this->db->update('suppliers', $params);
    }

    /*
     * function to delete suppliers
     */
    function delete_supplier($supplier_id)
    {
        return $this->db->delete('suppliers', array('supplier_id' => $supplier_id));
    }
}