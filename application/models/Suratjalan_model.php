<?php

class Suratjalan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get suratjalan by id_suratjalan
     */
    function get_suratjalan($id_suratjalan)
    {
        return $this->db->get_where('suratjalan', array('id_suratjalan' => $id_suratjalan))->row_array();
    }

    /*
     * Get all suratjalan count
     */
    function get_all_suratjalan_count()
    {
        $this->db->from('suratjalan');
        return $this->db->count_all_results();
    }

    /*
     * Get all suratjalan
     */
    function get_all_suratjalan($params = array())
    {
        $this->db->order_by('suratjalan.id_suratjalan', 'desc');
        // $this->db->join('tbl_users', 'tbl_users.id_suratjalan=suratjalan.id_suratjalan', 'left');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('suratjalan')->result_array();
    }

    function get_users_by_created_by($user_id)
    {
        $this->db->join('suratjalan', 'suratjalan.id_suratjalan=tbl_users.id_suratjalan', 'left');
        return $this->db->get_where('tbl_users', array('created_by' => $user_id))->result_array();
    }

    /*
     * function to add new suratjalan
     */
    function add_suratjalan($params)
    {
        $this->db->insert('suratjalan', $params);
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
     * function to update suratjalan
     */
    function update_suratjalan($id_suratjalan, $params)
    {
        $this->db->where('id_suratjalan', $id_suratjalan);
        return $this->db->update('suratjalan', $params);
    }

    /*
     * function to delete suratjalan
     */
    function delete_suratjalan($id_suratjalan)
    {
        return $this->db->delete('suratjalan', array('id_suratjalan' => $id_suratjalan));
    }
}