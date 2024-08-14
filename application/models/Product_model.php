<?php

class Product_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get product by product_id
     */
    function get_product($product_id)
    {
        return $this->db->get_where('product', array('product_id' => $product_id))->row_array();
    }

    public function get_product_by_id($product_id)
{
    $this->db->where('product_id', $product_id);
    $query = $this->db->get('product');
    return $query->row_array();
}

    /*
     * Get all product count
     */
    function get_all_product_count()
    {
        $this->db->from('product');
        return $this->db->count_all_results();
    }

    /*
     * Get all product
     */
    function get_all_product($params = array())
    {
        $this->db->order_by('product.product_id', 'asc');
        // $this->db->join('tbl_users', 'tbl_users.product_id=product.product_id', 'left');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('product')->result_array();
    }

    function get_users_by_created_by($user_id)
    {
        $this->db->join('product', 'product.product_id=tbl_users.product_id', 'left');
        return $this->db->get_where('tbl_users', array('created_by' => $user_id))->result_array();
    }

    /*
     * function to add new product
     */
    function add_product($params)
    {
        $this->db->insert('product', $params);
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
     * function to update product
     */
    function update_product($product_id, $params)
    {
        $this->db->where('product_id', $product_id);
        return $this->db->update('product', $params);
    }

    /*
     * function to delete product
     */
    function delete_product($product_id)
    {
        return $this->db->delete('product', array('product_id' => $product_id));
    }
}