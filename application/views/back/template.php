<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>
<div class="wrapper">
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
<?php if (isset($contents)) {
	echo $contents;
} ?>
</div>
<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<?php $this->load->view('back/template/footer'); ?>
<?php $this->load->view('back/template/script'); ?>


