<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Manage Ticket</h1>
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

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<table class="table table-bordered table-hover">
			<thead>
			<tr>
				<th>No</th>
				<th>ID Ticket</th>
				<th>User</th>
				<th>Email</th>
				<th>Topic</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>

			<?php
			$counter = 1;
			foreach ($ticket as $t) { ?>
				<tr>
					<td><?= $counter++; ?></td>
					<td><?= $t->id_ticket; ?></td>
					<td><?= $t->username; ?></td>
					<td><?= $t->email; ?></td>
					<td><?= $t->subject; ?></td>
					<td><?php
						if($t->status == 0){
							echo '<button class="btn btn-warning">Pending</button>';
						}else if ($t->status == 1){
							echo '<button class="btn btn-primary">Process</button>';
						}else{
							echo '<button class="btn btn-success">Closed</button>';
						}
						?>
					</td>
					<td>
						<a href="<?=base_url("ticket/detail_ticket/") . $t->id_ticket;?>">
							<button class="btn btn-primary">Detail</button>
						</a>
					</td>
				</tr>
			<?php }
			?>
		</table>

	</div><!-- /.container-fluid -->

</section>


