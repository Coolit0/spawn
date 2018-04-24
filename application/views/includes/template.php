<?php
	# $Id:$

$viewData['view'] = $view;

$this->load->view('includes/header',$viewData);
$this->load->view('includes/menu',$viewData);
echo '<div id="pageContent" class="clearfix">';
$this->load->view($view,$viewData);
echo '</div>';
$this->load->view('includes/footer',$viewData);

?>
