<?php

class Invoice_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get invoice by invoice_id
     */
    function get_invoice($invoice_id)
    {
        return $this->db->get_where('invoice', array('invoice_id' => $invoice_id))->row_array();
    }


    /*
     * Get all invoice count
     */
    function get_all_invoice_count()
    {
        $this->db->from('invoice');
        return $this->db->count_all_results();
    }

    /*
     * Get all invoice
     */
    function get_all_invoice($params = array())
    {
        $this->db->select('invoice.*, purchaseorders.po_number, product.product');
        $this->db->from('invoice');
        $this->db->join('purchaseorders', 'invoice.po_id = purchaseorders.po_id', 'left');
        $this->db->join('product', 'purchaseorders.product_id = product.product_id', 'left'); // Join with products table
        $this->db->order_by('invoice.invoice_id', 'desc');

        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }

        return $this->db->get()->result_array();
    }

    function get_invoice_detail($invoice_id)
    {
        $this->db->select('invoice.*, purchaseorders.po_number, product.*, suppliers.supplier_name');
        $this->db->from('invoice');
        $this->db->join('purchaseorders', 'invoice.po_id = purchaseorders.po_id', 'left');
        $this->db->join('product', 'purchaseorders.product_id = product.product_id', 'left');
        $this->db->join('suppliers', 'purchaseorders.supplier_id = suppliers.supplier_id', 'left');
        $this->db->where('invoice.invoice_id', $invoice_id);
        
        return $this->db->get()->row_array(); // Use row_array() for a single row
    }

    function get_total_po_qty($po_number) {
        $this->db->select_sum('quantity');
        $this->db->from('purchaseorders');
        $this->db->where('po_number', $po_number);
        $result = $this->db->get()->row_array();
        return $result['quantity']; // Mengembalikan total quantity
    }
    
    function get_shipment_by_invoice($invoice_id)
    {
        $this->db->select('shipment.*, invoice.invoice_id');
        $this->db->from('shipment');
        $this->db->where('shipment.invoice_id', $invoice_id);
        
        return $this->db->get()->row_array(); // Use row_array() for a single row
    }



    function get_all_purchaseorder($params = array())
    {
        $this->db->select('purchaseorders.po_id, purchaseorders.po_number, product.product');
        $this->db->from('purchaseorders');
        $this->db->join('product', 'product.product_id = purchaseorders.product_id', 'left');
        $this->db->order_by('purchaseorders.po_id', 'desc');
        
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }

        return $this->db->get()->result_array();
    }



    function get_users_by_created_by($user_id)
    {
        $this->db->join('invoice', 'invoice.invoice_id=tbl_users.invoice_id', 'left');
        return $this->db->get_where('tbl_users', array('created_by' => $user_id))->result_array();
    }

    /*
     * function to add new invoice
     */
    function add_invoice($params)
    {
        $this->db->insert('invoice', $params);
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
     * function to update invoice
     */
    function update_invoice($invoice_id, $params)
    {
        $this->db->where('invoice_id', $invoice_id);
        return $this->db->update('invoice', $params);
    }

    /*
     * function to delete invoice
     */
    function delete_invoice($invoice_id)
    {
        return $this->db->delete('invoice', array('invoice_id' => $invoice_id));
    }
}