<?php
class Login_model extends CI_Model
{

  function validate($user_email, $user_password)
  {
    $this->db->where('user_email', $user_email);
    $this->db->where('user_password', $user_password);
    $result = $this->db->get('tbl_users', 1);
    return $result;
  }

  public function empty_response()
  {
    $response['status'] = 502;
    $response['error'] = true;
    $response['message'] = 'Field tidak boleh kosong';
    return $response;
  }

  public function update_person($user_id, $user_name, $user_password)
  {
    if ($user_id == '' || empty($user_name) || empty($user_password)) {
      return $this->empty_response();
    } else {
      $where = array(
        "user_id" => $user_id
      );
      $set = array(
        "user_name" => $user_name,
        "user_password" => $user_password,
      );
      $this->db->where($where);
      $update = $this->db->update("tbl_users", $set);
      if ($update) {
        $response['status'] = 200;
        $response['error'] = false;
        $response['message'] = 'Data person diubah.';
        return $response;
      } else {
        $response['status'] = 502;
        $response['error'] = true;
        $response['message'] = 'Data person gagal diubah.';
        return $response;
      }
    }
  }
}
