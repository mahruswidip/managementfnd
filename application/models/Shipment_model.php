<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipment_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Get shipment by shipment_id
     */
    function get_shipment($shipment_id) {
        return $this->db->get_where('shipment', array('shipment_id' => $shipment_id))->row_array();
    }

    /*
     * Get all shipment count
     */
    function get_all_shipment_count() {
        $this->db->from('shipment');
        return $this->db->count_all_results();
    }

    /*
     * Get all shipments
     */
    function get_all_shipments($params = array()) {
        $this->db->select('shipment.*, invoice.invoice_number');
        $this->db->from('shipment');
        $this->db->join('invoice', 'shipment.invoice_id = invoice.invoice_id', 'left');
        $this->db->order_by('shipment.shipment_id', 'desc');

        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }

        return $this->db->get()->result_array();
    }

    /*
     * Get shipments by invoice_id
     */
    // function get_shipments_by_invoice($invoice_id) {
    //     $this->db->select('shipments.*');
    //     $this->db->from('shipments');
    //     $this->db->where('shipments.invoice_id', $invoice_id);
    
    //     return $this->db->get()->result_array(); // Gunakan result_array() untuk mendapatkan array dari banyak baris
    // }

    function get_shipments_by_invoice($invoice_id) {
        $this->db->select('shipments.*, purchaseorders.price');
        $this->db->from('shipments');
        $this->db->join('invoice', 'invoice.invoice_id = shipments.invoice_id', 'left');
        $this->db->join('purchaseorders', 'purchaseorders.po_id = invoice.po_id', 'left');
        $this->db->where('shipments.invoice_id', $invoice_id);
    
        return $this->db->get()->result_array(); 
    }


    function get_shipments_by_po_number($po_number, $exclude_invoice_id = null) {
        $this->db->select('shipments.*, invoice.invoice_number, purchaseorders.price');
        $this->db->from('shipments');
        $this->db->join('invoice', 'shipments.invoice_id = invoice.invoice_id', 'left');
        $this->db->join('purchaseorders', 'invoice.po_id = purchaseorders.po_id', 'left');
        $this->db->where('purchaseorders.po_number', $po_number);
        
        if ($exclude_invoice_id) {
            $this->db->where('invoice.invoice_id !=', $exclude_invoice_id);
        }
        
        return $this->db->get()->result_array();
    }
    
    
    

    /*
     * Add new shipment
     */
    function add_shipment($params) {
        $this->db->insert('shipments', $params);
        return $this->db->insert_id();
    }

    /*
     * Update shipment
     */
    function update_shipment($shipment_id, $params) {
        $this->db->where('shipment_id', $shipment_id);
        return $this->db->update('shipment', $params);
    }

    /*
     * Delete shipment
     */
    function delete_shipment($shipment_id) {
        return $this->db->delete('shipment', array('shipment_id' => $shipment_id));
    }
}