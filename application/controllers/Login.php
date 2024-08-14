<?php

class Login extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('login_model');
  }

  function index()
  {
    $this->load->view('login_view');
  }

  function auth()
  {
    $email    = $this->input->post('user_name', TRUE);
    $password = md5($this->input->post('user_password', TRUE));
    $validate = $this->login_model->validate($email, $password);
    if ($validate->num_rows() > 0) {
      $data  = $validate->row_array();
      $user_id  = $data['user_id'];
      $id_petani  = $data['id_petani'];
      $name  = $data['user_name'];
      $email = $data['user_email'];
      $level = $data['user_level'];
      $created_by = $data['created_by'];
      $sesdata = array(
        'user_id' => $user_id,
        'id_petani' => $id_petani,
        'user_name'  => $name,
        'user_email'     => $email,
        'user_level'     => $level,
        'created_by'     => $created_by,
        'logged_in' => TRUE
      );
      $this->session->set_userdata($sesdata);
      // access login for admin
      if ($level === '1') {
        redirect('dashboard/index');

        // access login for staff
      } elseif ($level === '2') {
        redirect('dashboard/index');

        // access login for author
      } else {
        redirect('dashboard/index');
      }
    } else {
      echo $this->session->set_flashdata('err', 'Username or Password is Wrong');
      redirect('login');
    }
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
  }

  public function register()
  {

    // create the data object
    $data = new stdClass();

    // load form helper and validation library
    $this->load->helper('form');

    // set variables from the form
    $user_name = $this->input->post('user_name');
    $user_email = $this->input->post('user_email');
    $user_password = $this->input->post('user_password');

    if ($this->user_model->create_user($user_name, $user_email, $user_password)) {

      // user creation ok
      $this->load->view('login/login_view', $data);
    } else {

      // user creation failed, this should never happen
      $data->error = 'There was a problem creating your new account. Please try again.';

      // send error to the view
      $this->load->view('login/register_view', $data);
    }
  }

  // MOBILE API

  public function login_mobile()
  {
    $email    = $this->input->post('user_email');
    $password = md5($this->input->post('user_password'));

    $dataAdmin = array();
    $dataLogin = $this->db->query("SELECT *,  CASE WHEN DATE_ADD(keberangkatan.tanggal_keberangkatan, INTERVAL paket.lama_hari DAY) < CURDATE()   THEN '0'   ELSE CONCAT('', record_keberangkatan.id_record) END AS id_record, keberangkatan.tanggal_keberangkatan, record_keberangkatan.created_at FROM tbl_users LEFT JOIN jamaah ON tbl_users.fk_id_jamaah = jamaah.id_jamaah LEFT JOIN (SELECT id_jamaah, MAX(created_at) AS max_created_at FROM record_keberangkatan GROUP BY id_jamaah) AS max_created_at_table ON jamaah.id_jamaah = max_created_at_table.id_jamaah LEFT JOIN record_keberangkatan ON max_created_at_table.id_jamaah = record_keberangkatan.id_jamaah AND max_created_at_table.max_created_at = record_keberangkatan.created_at LEFT JOIN paket ON record_keberangkatan.id_paket = paket.id_paket LEFT JOIN keberangkatan ON paket.fk_id_keberangkatan = keberangkatan.id_keberangkatan WHERE tbl_users.user_email = '" . $email . "' AND tbl_users.user_password = '" . $password . "'");
    // $dataLogin = $this->db->query("SELECT * FROM tbl_users LEFT JOIN jamaah ON tbl_users.fk_id_jamaah = jamaah.id_jamaah where user_email = '" . $email . "' AND user_password = '" . $password . "'");

    // sudah ada filter ambil terbaru
    // SELECT *,  CASE WHEN DATE_ADD(keberangkatan.tanggal_keberangkatan, INTERVAL paket.lama_hari DAY) < CURDATE()   THEN '0'   ELSE CONCAT('', record_keberangkatan.id_record) END AS id_record, keberangkatan.tanggal_keberangkatan, record_keberangkatan.created_at FROM tbl_users LEFT JOIN jamaah ON tbl_users.fk_id_jamaah = jamaah.id_jamaah LEFT JOIN (SELECT id_jamaah, MAX(created_at) AS max_created_at FROM record_keberangkatan GROUP BY id_jamaah) AS max_created_at_table ON jamaah.id_jamaah = max_created_at_table.id_jamaah LEFT JOIN record_keberangkatan ON max_created_at_table.id_jamaah = record_keberangkatan.id_jamaah AND max_created_at_table.max_created_at = record_keberangkatan.created_at LEFT JOIN paket ON record_keberangkatan.id_paket = paket.id_paket LEFT JOIN keberangkatan ON paket.fk_id_keberangkatan = keberangkatan.id_keberangkatan WHERE tbl_users.user_email = '3579023010810001' AND tbl_users.user_password = '276ba51206df5d73207265d14bed9de1'

    foreach ($dataLogin->result() as $dl) {
      $dataAdmin = $dl;
    }
    if ($dataAdmin == []) {
      http_response_code(404);
      $dataAdmin = "Data Anda Tidak Ditemukan";
      echo json_encode($dataAdmin);
    } else {
      echo json_encode($dataAdmin);
    }
  }
  public function login_qr()
  {
    $qr_code_benar = $this->input->post('qr_code_benar');

    $dataAdminqr = array();
    // $dataLoginqr = $this->db->query("SELECT * FROM tbl_users LEFT JOIN jamaah ON tbl_users.fk_id_jamaah = jamaah.id_jamaah where qr_code_benar = '" . $qr_code_benar . "'");
    $dataLoginqr = $this->db->query("SELECT *,  CASE WHEN DATE_ADD(keberangkatan.tanggal_keberangkatan, INTERVAL paket.lama_hari DAY) < CURDATE()   THEN '0'   ELSE CONCAT('', record_keberangkatan.id_record) END AS id_record, keberangkatan.tanggal_keberangkatan, record_keberangkatan.created_at FROM tbl_users LEFT JOIN jamaah ON tbl_users.fk_id_jamaah = jamaah.id_jamaah LEFT JOIN (SELECT id_jamaah, MAX(created_at) AS max_created_at FROM record_keberangkatan GROUP BY id_jamaah) AS max_created_at_table ON jamaah.id_jamaah = max_created_at_table.id_jamaah LEFT JOIN record_keberangkatan ON max_created_at_table.id_jamaah = record_keberangkatan.id_jamaah AND max_created_at_table.max_created_at = record_keberangkatan.created_at LEFT JOIN paket ON record_keberangkatan.id_paket = paket.id_paket LEFT JOIN keberangkatan ON paket.fk_id_keberangkatan = keberangkatan.id_keberangkatan where qr_code_benar = '" . $qr_code_benar . "'");

    foreach ($dataLoginqr->result() as $dl) {
      $dataAdminqr = $dl;
    }
    if ($dataAdminqr == []) {
      http_response_code(404);
      $dataAdminqr = "Data Anda Tidak Ditemukan";
      echo json_encode($dataAdminqr);
    } else {
      echo json_encode($dataAdminqr);
    }
  }
}
