<?php

$this->load->view('admin/elements/header');
$data['where'] = @$where;
$this->load->view($pageName,$data);

$this->load->view('admin/elements/footer',$data);

?>