<?php
$config['pagination']['page_query_string'] = TRUE;
$config['pagination']['uri_segment'] = 4;

$config['pagination']['per_page'] = RECORDS_PER_PAGE;

$config['pagination']['page_query_string'] = TRUE;
$config['pagination']['query_string_segment'] = 'page';
$config['pagination']['full_tag_open'] = '<nav aria-label="Page navigation example" class="px-4"><ul class="pagination justify-content-end">';
$config['pagination']['full_tag_close'] = '</ul></nav>';
$config['pagination']['first_link'] = TRUE;
$config['pagination']['last_link'] = FALSE;
$config['pagination']['prev_link'] = '<i class="fa fa-angle-left"></i>';
$config['pagination']['next_link'] = '<i class="fa fa-angle-right"></i>';
$config['pagination']['num_tag_open'] = '<li class="page-item"><a class="page-link">';
$config['pagination']['num_tag_close'] = '</a></li>';
$config['pagination']['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
$config['pagination']['cur_tag_close'] = '</a></li>';
$config['pagination']['prev_tag_open'] = '<li class="page-item">';
$config['pagination']['prev_tag_close'] = '</li>';
$config['pagination']['next_tag_open'] = '<li class="page-item">';
$config['pagination']['next_tag_close'] = '</li>';

// $config['pagination']['prev_link'] = '‹';
// $config['pagination']['next_link'] = '<h2><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
// <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
// </svg></h2>';
// $config['pagination']['full_tag_open'] = '<ul class="pagination">';
// $config['pagination']['next_tag_open'] = '<li class="page-item">';
// $config['pagination']['next_tag_close'] = '</li>';
// $config['pagination']['prev_tag_open'] = '<li>';
// $config['pagination']['prev_tag_close'] = '</li>';
// $config['pagination']['num_tag_open'] = '<li class="alert alert-dark">';
// $config['pagination']['num_tag_close'] = '</li>';
// $config['pagination']['cur_tag_open'] = '<li class="active alert alert-primary"><a class="alert-link" href="">';
// $config['pagination']['cur_tag_close'] = '</a></li>';
// $config['pagination']['full_tag_close'] = '</ul>';
// $config['pagination']['first_link'] = '‹‹';
// $config['pagination']['first_tag_open'] = '<li>';
// $config['pagination']['first_tag_close'] = '</li>';
// $config['pagination']['last_link'] = '››';
// $config['pagination']['last_tag_open'] = '<li>';
// $config['pagination']['last_tag_close'] = '</li>';


// $config['pagination']['prev_link'] = '‹';
// $config['pagination']['next_link'] = '›';
// $config['pagination']['full_tag_open'] = '<ul class="pagination">';
// $config['pagination']['next_tag_open'] = '<li class="mx-2 my-3" style="font-size:3rem;">';
// $config['pagination']['next_tag_close'] = '</li>';
// $config['pagination']['prev_tag_open'] = '<li>';
// $config['pagination']['prev_tag_close'] = '</li>';
// $config['pagination']['num_tag_open'] = '<li class="mx-4 my-3" style="font-size:1.5rem; text-align="center">';
// $config['pagination']['num_tag_close'] = '</li>';
// $config['pagination']['cur_tag_open'] = '<li class="active"><a class="btn btn-success" style="font-size:1.5rem!important;" href="">';
// $config['pagination']['cur_tag_close'] = '</a></li>';
// $config['pagination']['full_tag_close'] = '</ul>';
// $config['pagination']['first_link'] = '‹‹';
// $config['pagination']['first_tag_open'] = '<li>';
// $config['pagination']['first_tag_close'] = '</li>';
// $config['pagination']['last_link'] = '››';
// $config['pagination']['last_tag_open'] = '<li>';
// $config['pagination']['last_tag_close'] = '</li>';
