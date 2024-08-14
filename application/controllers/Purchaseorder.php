<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Purchaseorder extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Purchaseorder_model');
        $this->load->model('Supplier_model');
        $this->load->model('Product_model');
        $this->load->model('Invoice_model');
    }

    /*
     * Listing of purchaseorder
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('purchaseorder/index?');
        $config['total_rows'] = $this->Purchaseorder_model->get_all_purchaseorder_count();
        $this->pagination->initialize($config);

        $user_level = $this->session->userdata('user_level');
        $user_id = $this->session->userdata('user_id');

        $data['purchaseorder'] = $this->Purchaseorder_model->get_all_purchaseorder($params);

        // echo '<pre>';
        // print_r($data['purchaseorder']);
        // exit();

        $data['_view'] = 'purchaseorder/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new purchaseorder
     */

    function add()
    {
        $data['supplier'] = $this->Supplier_model->get_all_supplier();
        $data['product'] = $this->Product_model->get_all_product();
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'po_number' => $this->input->post('po_number'),
                'product_id' => $this->input->post('product_id'),
                'quantity' => $this->input->post('quantity'),
                'price' => $this->input->post('price'),
                'supplier_id' => $this->input->post('supplier_id'),
            );

            $po_id = $this->Purchaseorder_model->add_purchaseorder($params);
            redirect('purchaseorder/index');
        } else {
            $data['_view'] = 'purchaseorder/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a purchaseorder
     */

    function edit($id)
    {
        $config['upload_path'] = './assets/images/purchaseorder/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $user_id = $this->session->userdata('user_id');

        $isi_purchaseorder = $this->input->post('konten');

        $this->upload->initialize($config);

        // Check if the form is submitted
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (!empty($_FILES['purchaseorder_img']['name'])) {
                if ($this->upload->do_upload('purchaseorder_img')) {
                    // Delete existing image if any
                    $existing_purchaseorder = $this->Purchaseorder_model->get_purchaseorder($id);
                    $existing_image_path = './assets/images/purchaseorder/' . $existing_purchaseorder['purchaseorder_img'];
                    if (file_exists($existing_image_path)) {
                        unlink($existing_image_path);
                    }

                    $gbr = $this->upload->data();

                    // Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/purchaseorder/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '60%';
                    $config['width'] = '20%';
                    $config['max_size'] = '5000';
                    $config['new_image'] = './assets/images/purchaseorder/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $gambar = $gbr['file_name'];
                } else {
                    echo "else";
                    exit();
                    redirect('purchaseorder/index');
                }
            } else {
                // No new image uploaded, use the existing one
                $gambar = $this->input->post('purchaseorder_img');
            }

            $params = array(
                'kategori' => $this->input->post('kategori'),
                'travel' => $this->input->post('travel'),
                'konten' => $isi_purchaseorder,
                'purchaseorder_img' => $gambar,
                'judul_purchaseorder' => $this->input->post('judul_purchaseorder'),
            );

            // var_dump($params);
            // exit();

            $this->Purchaseorder_model->edit_purchaseorder($id, $params);
            redirect('purchaseorder/index');
        } else {
            // If it's not a POST request, load the edit form
            $data['purchaseorder'] = $this->Purchaseorder_model->get_purchaseorder($id);
            $data['_view'] = 'purchaseorder/edit';
            $this->load->view('layouts/main', $data);
        }
    }

    function detail($po_id)
    {
        $data['purchaseorder'] = $this->Purchaseorder_model->get_purchaseorder($po_id);
        // $data['invoice'] = $this->Invoice_model->get_invoice($id_invoice);
        // echo '<pre>';
        // var_dump($data['record']);
        // exit();
        $data['_view'] = 'purchaseorder/detail';
        $this->load->view('layouts/main', $data);
    }


    public function view()
    {
        // Ambil parameter po_number dari request
        $po_number = $this->input->post('po_number');

        // Ambil semua purchaseorder yang sesuai dengan po_number
        if (!empty($po_number)) {
            $purchaseorders = $this->Purchaseorder_model->get_purchaseorder_by_po_number($po_number);
        } else {
            $purchaseorders = $this->Purchaseorder_model->get_all_purchaseorder();
        }

        // Ambil semua supplier
        $suppliers = $this->Supplier_model->get_all_supplier();

        // Buat array associative untuk supplier ID ke supplier name
        $supplier_name = [];
        foreach ($suppliers as $supplier) {
            $supplier_name[$supplier['supplier_id']] = $supplier['supplier_name'];
        }

        // Tambahkan nama supplier ke setiap purchaseorder
        foreach ($purchaseorders as &$purchaseorder) {
            $purchaseorder['supplier_id'] = isset($supplier_name[$purchaseorder['supplier_id']]) ? $supplier_name[$purchaseorder['supplier_id']] : 'Unknown';
        }

        // Ambil semua produk
        $products = $this->Product_model->get_all_product();

        // Buat array associative untuk product ID ke product name
        $product_name = [];
        foreach ($products as $product) {
            $product_name[$product['product_id']] = $product['product'];
        }

        // Tambahkan nama product ke setiap purchaseorder
        foreach ($purchaseorders as &$purchaseorder) {
            $purchaseorder['product_id'] = isset($product_name[$purchaseorder['product_id']]) ? $product_name[$purchaseorder['product_id']] : 'Unknown';
        }

        echo json_encode($purchaseorders);
    }



    /*
     * Deleting purchaseorder
     */
    function remove($po_id)
    {
        $purchaseorder = $this->Purchaseorder_model->get_purchaseorder($po_id);

        $this->Purchaseorder_model->delete_purchaseorder($po_id);
        unlink(FCPATH . 'assets/images/purchaseorder/' . $purchaseorder['purchaseorder_img']);
        redirect('purchaseorder/index');
    }
}