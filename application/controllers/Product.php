<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
    }

    /*
     * Listing of product
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('product/index?');
        $config['total_rows'] = $this->Product_model->get_all_product_count();
        $this->pagination->initialize($config);

        $user_level = $this->session->userdata('user_level');
        $user_id = $this->session->userdata('user_id');

        $data['product'] = $this->Product_model->get_all_product($params);

        // echo '<pre>';
        // print_r($data['product']);
        // exit();

        $data['_view'] = 'product/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new product
     */

    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'product' => $this->input->post('product'),
                'material_code' => $this->input->post('material_code'),
                'material_description' => $this->input->post('material_description'),
            );

            $id_product = $this->Product_model->add_product($params);
            redirect('product/index');
        } else {
            $data['_view'] = 'product/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a product
     */

    function edit($id)
    {
        $config['upload_path'] = './assets/images/product/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $user_id = $this->session->userdata('user_id');

        $isi_product = $this->input->post('konten');

        $this->upload->initialize($config);

        // Check if the form is submitted
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (!empty($_FILES['product_img']['name'])) {
                if ($this->upload->do_upload('product_img')) {
                    // Delete existing image if any
                    $existing_product = $this->Product_model->get_product($id);
                    $existing_image_path = './assets/images/product/' . $existing_product['product_img'];
                    if (file_exists($existing_image_path)) {
                        unlink($existing_image_path);
                    }

                    $gbr = $this->upload->data();

                    // Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/product/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '60%';
                    $config['width'] = '20%';
                    $config['max_size'] = '5000';
                    $config['new_image'] = './assets/images/product/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $gambar = $gbr['file_name'];
                } else {
                    echo "else";
                    exit();
                    redirect('product/index');
                }
            } else {
                // No new image uploaded, use the existing one
                $gambar = $this->input->post('product_img');
            }

            $params = array(
                'kategori' => $this->input->post('kategori'),
                'travel' => $this->input->post('travel'),
                'konten' => $isi_product,
                'product_img' => $gambar,
                'judul_product' => $this->input->post('judul_product'),
            );

            // var_dump($params);
            // exit();

            $this->Product_model->edit_product($id, $params);
            redirect('product/index');
        } else {
            // If it's not a POST request, load the edit form
            $data['product'] = $this->Product_model->get_product($id);
            $data['_view'] = 'product/edit';
            $this->load->view('layouts/main', $data);
        }
    }




        function view()
    {
        $data = $this->Product_model->get_all_product();
        echo json_encode($data);
    }

    function detail($id_product)
    {
        $data['product'] = $this->Product_model->get_product_by_id($id_product);
        $data['_view'] = 'product/detail';
        $this->load->view('layouts/main', $data);
    }

    public function get_product_details($id_product)
    {
        $this->load->model('Product_model');
        $product = $this->Product_model->get_product_by_id($id_product);
        echo json_encode($product);
    }




    /*
     * Deleting product
     */
    function remove($id_product)
    {
        $product = $this->Product_model->get_product($id_product);

        $this->Product_model->delete_product($id_product);
        unlink(FCPATH . 'assets/images/product/' . $product['product_img']);
        redirect('product/index');
    }
}