<?php

class Purchaseorder_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get purchaseorders by po_id
     */
    function get_purchaseorder($po_id)
    {
        return $this->db->get_where('purchaseorders', array('po_id' => $po_id))->row_array();
    }


    /*
     * Get all purchaseorders count
     */
    function get_all_purchaseorder_count()
    {
        $this->db->from('purchaseorders');
        return $this->db->count_all_results();
    }

    /*
     * Get all purchaseorders
     */
    function get_all_purchaseorder($params = array())
    {
        $this->db->order_by('purchaseorders.po_id', 'desc');
        // $this->db->join('tbl_users', 'tbl_users.po_id=purchaseorders.po_id', 'left');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('purchaseorders')->result_array();
    }

    function get_users_by_created_by($user_id)
    {
        $this->db->join('purchaseorders', 'purchaseorders.po_id=tbl_users.po_id', 'left');
        return $this->db->get_where('tbl_users', array('created_by' => $user_id))->result_array();
    }

    /*
     * function to add new purchaseorders
     */
    function add_purchaseorder($params)
    {
        $this->db->insert('purchaseorders', $params);
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
     * function to update purchaseorders
     */
    function update_purchaseorder($po_id, $params)
    {
        $this->db->where('po_id', $po_id);
        return $this->db->update('purchaseorders', $params);
    }

    /*
     * function to delete purchaseorders
     */
    function delete_purchaseorder($po_id)
    {
        return $this->db->delete('purchaseorders', array('po_id' => $po_id));
    }
    
}