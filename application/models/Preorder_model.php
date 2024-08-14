<?php

class Preorder_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get preorder by id_preorder
     */
    function get_preorder($id_preorder)
    {
        return $this->db->get_where('preorder', array('id_preorder' => $id_preorder))->row_array();
    }

    public function get_preorder_by_id($id_preorder) {
        $this->db->select('preorder.*, product.product as product');
        $this->db->from('preorder');
        $this->db->join('product', 'product.id_product = preorder.fk_id_product');
        $this->db->where('preorder.id_preorder', $id_preorder);
        $query = $this->db->get();
        return $query->row_array();
    }

    /*
     * Get all preorder count
     */
    function get_all_preorder_count()
    {
        $this->db->from('preorder');
        return $this->db->count_all_results();
    }

    /*
     * Get all preorder
     */
    function get_all_preorder($params = array())
    {
        $this->db->order_by('preorder.id_preorder', 'desc');
        // $this->db->join('tbl_users', 'tbl_users.id_preorder=preorder.id_preorder', 'left');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('preorder')->result_array();
    }

    function get_users_by_created_by($user_id)
    {
        $this->db->join('preorder', 'preorder.id_preorder=tbl_users.id_preorder', 'left');
        return $this->db->get_where('tbl_users', array('created_by' => $user_id))->result_array();
    }

    /*
     * function to add new preorder
     */
    function add_preorder($params)
    {
        $this->db->insert('preorder', $params);
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
     * function to update preorder
     */
    function update_preorder($id_preorder, $params)
    {
        $this->db->where('id_preorder', $id_preorder);
        return $this->db->update('preorder', $params);
    }

    /*
     * function to delete preorder
     */
    function delete_preorder($id_preorder)
    {
        return $this->db->delete('preorder', array('id_preorder' => $id_preorder));
    }
    
}