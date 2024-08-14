<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Suratjalan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Suratjalan_model');
    }

    /*
     * Listing of suratjalan
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('suratjalan/index?');
        $config['total_rows'] = $this->Suratjalan_model->get_all_suratjalan_count();
        $this->pagination->initialize($config);

        $user_level = $this->session->userdata('user_level');
        $user_id = $this->session->userdata('user_id');

        $data['suratjalan'] = $this->Suratjalan_model->get_all_suratjalan($params);

        // echo '<pre>';
        // print_r($data['suratjalan']);
        // exit();

        $data['_view'] = 'suratjalan/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new suratjalan
     */

    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'fk_id_invoice' => $this->input->post('fk_id_invoice'),
                'suratjalan_number' => $this->input->post('suratjalan_number'),
                'collie' => $this->input->post('collie'),
                'netto' => $this->input->post('netto'),
                'price' => $this->input->post('price'),
                'amount' => $this->input->post('amount'),
            );

            $id_suratjalan = $this->Suratjalan_model->add_suratjalan($params);
            redirect('suratjalan/index');
        } else {
            $data['_view'] = 'suratjalan/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a suratjalan
     */

    function edit($id)
    {
        $config['upload_path'] = './assets/images/suratjalan/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $user_id = $this->session->userdata('user_id');

        $isi_suratjalan = $this->input->post('konten');

        $this->upload->initialize($config);

        // Check if the form is submitted
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (!empty($_FILES['suratjalan_img']['name'])) {
                if ($this->upload->do_upload('suratjalan_img')) {
                    // Delete existing image if any
                    $existing_suratjalan = $this->Suratjalan_model->get_suratjalan($id);
                    $existing_image_path = './assets/images/suratjalan/' . $existing_suratjalan['suratjalan_img'];
                    if (file_exists($existing_image_path)) {
                        unlink($existing_image_path);
                    }

                    $gbr = $this->upload->data();

                    // Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/suratjalan/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '60%';
                    $config['width'] = '20%';
                    $config['max_size'] = '5000';
                    $config['new_image'] = './assets/images/suratjalan/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $gambar = $gbr['file_name'];
                } else {
                    echo "else";
                    exit();
                    redirect('suratjalan/index');
                }
            } else {
                // No new image uploaded, use the existing one
                $gambar = $this->input->post('suratjalan_img');
            }

            $params = array(
                'kategori' => $this->input->post('kategori'),
                'travel' => $this->input->post('travel'),
                'konten' => $isi_suratjalan,
                'suratjalan_img' => $gambar,
                'judul_suratjalan' => $this->input->post('judul_suratjalan'),
            );

            // var_dump($params);
            // exit();

            $this->Suratjalan_model->edit_suratjalan($id, $params);
            redirect('suratjalan/index');
        } else {
            // If it's not a POST request, load the edit form
            $data['suratjalan'] = $this->Suratjalan_model->get_suratjalan($id);
            $data['_view'] = 'suratjalan/edit';
            $this->load->view('layouts/main', $data);
        }
    }




        function view()
    {
        $data = $this->Suratjalan_model->get_all_suratjalan();
        echo json_encode($data);
    }




    /*
     * Deleting suratjalan
     */
    function remove($id_suratjalan)
    {
        $suratjalan = $this->Suratjalan_model->get_suratjalan($id_suratjalan);

        $this->Suratjalan_model->delete_suratjalan($id_suratjalan);
        unlink(FCPATH . 'assets/images/suratjalan/' . $suratjalan['suratjalan_img']);
        redirect('suratjalan/index');
    }
}