<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">New Ticket</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<!--							<li class="breadcrumb-item"><a href="#">Home</a></li>-->
					<!--							<li class="breadcrumb-item active">Dashboard v1</li>-->
				</ol>
			</div><!-- /.col -->

		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
	<div class="container-fluid">
		<?= validation_errors(); ?>
		<?= $this->session->flashdata('message'); ?>
		<form method="post" action="<?= base_url('ticket/submit_ticket'); ?>">
			<label for="" class="form-label">Subject</label>
			<div class="mb-3">
				<input name="subject" type="text" class="form-control" required>
			</div>
			<div class="mb-3">
				<label for="message" class="form-label">Message</label>
				<textarea required name="message" class="form-control" rows="5"></textarea>
			</div>
			<button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</section>

<?php
$this->session->set_flashdata('message', '');
?>
