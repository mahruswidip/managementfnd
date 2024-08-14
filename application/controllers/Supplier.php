<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model');
    }

    /*
     * Listing of supplier
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('supplier/index?');
        $config['total_rows'] = $this->Supplier_model->get_all_supplier_count();
        $this->pagination->initialize($config);

        $user_level = $this->session->userdata('user_level');
        $user_id = $this->session->userdata('user_id');

        $data['supplier'] = $this->Supplier_model->get_all_supplier($params);

        // echo '<pre>';
        // print_r($data['supplier']);
        // exit();

        $data['_view'] = 'supplier/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new supplier
     */

    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'supplier_name' => $this->input->post('supplier_name'),
                'contact_info' => $this->input->post('contact_info'),
            );

            $supplier_id = $this->Supplier_model->add_supplier($params);
            redirect('supplier/index');
        } else {
            $data['_view'] = 'supplier/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a supplier
     */

    function edit($id)
    {
        $config['upload_path'] = './assets/images/supplier/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $user_id = $this->session->userdata('user_id');

        $isi_supplier = $this->input->post('konten');

        $this->upload->initialize($config);

        // Check if the form is submitted
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (!empty($_FILES['supplier_img']['name'])) {
                if ($this->upload->do_upload('supplier_img')) {
                    // Delete existing image if any
                    $existing_supplier = $this->Supplier_model->get_supplier($id);
                    $existing_image_path = './assets/images/supplier/' . $existing_supplier['supplier_img'];
                    if (file_exists($existing_image_path)) {
                        unlink($existing_image_path);
                    }

                    $gbr = $this->upload->data();

                    // Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/supplier/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '60%';
                    $config['width'] = '20%';
                    $config['max_size'] = '5000';
                    $config['new_image'] = './assets/images/supplier/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $gambar = $gbr['file_name'];
                } else {
                    echo "else";
                    exit();
                    redirect('supplier/index');
                }
            } else {
                // No new image uploaded, use the existing one
                $gambar = $this->input->post('supplier_img');
            }

            $params = array(
                'kategori' => $this->input->post('kategori'),
                'travel' => $this->input->post('travel'),
                'konten' => $isi_supplier,
                'supplier_img' => $gambar,
                'judul_supplier' => $this->input->post('judul_supplier'),
            );

            // var_dump($params);
            // exit();

            $this->Supplier_model->edit_supplier($id, $params);
            redirect('supplier/index');
        } else {
            // If it's not a POST request, load the edit form
            $data['supplier'] = $this->Supplier_model->get_supplier($id);
            $data['_view'] = 'supplier/edit';
            $this->load->view('layouts/main', $data);
        }
    }




        function view()
    {
        $data = $this->Supplier_model->get_all_supplier();
        echo json_encode($data);
    }

    function detail($supplier_id)
    {
        $data['supplier'] = $this->Supplier_model->get_supplier_by_id($supplier_id);
        $data['_view'] = 'supplier/detail';
        $this->load->view('layouts/main', $data);
    }

    public function get_supplier_details($supplier_id)
    {
        $this->load->model('Supplier_model');
        $supplier = $this->Supplier_model->get_supplier_by_id($supplier_id);
        echo json_encode($supplier);
    }




    /*
     * Deleting supplier
     */
    function remove($supplier_id)
    {
        $supplier = $this->Supplier_model->get_supplier($supplier_id);

        $this->Supplier_model->delete_supplier($supplier_id);
        unlink(FCPATH . 'assets/images/supplier/' . $supplier['supplier_img']);
        redirect('supplier/index');
    }
}