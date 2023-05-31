<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Master Ticket</h1>
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
				<th>Topic</th>
				<th>Status</th>
				<th>Created</th>
				<th>Assignee</th>
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
					<td><?= $t->created; ?></td>
					<td></td>
					<td>
						<a href="<?=base_url("ticket/detail_ticket/") . $t->id_ticket;?>">
							<button class="btn btn-primary">Detail</button>
						</a>
					</td>

				</tr>
			<?php }
			?>
		</table>


		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-end">
				<li class="page-item <?php
				if ($active_page == 1 || $total_page == 0) {
					echo "disabled";
				}
				?> "><a class="page-link" href="<?php echo "?page=" . ($active_page - 1); ?>">Previous</a></li>
				<?php
				for ($i = 1; $i <= $total_page; $i++) { ?>
					<li class="page-item <?php
					if ($i == $active_page) {
						echo "active";
					}
					?>"><a class="page-link" href="<?php echo "?page=" . $i; ?>"><?= $i; ?></a></li>
				<?php }
				?>
				<li class="page-item <?php
				if ($active_page == $total_page || $total_page == 0) {
					echo "disabled";
				}
				?>"><a class="page-link" href="<?php echo "?page=" . ($active_page + 1); ?>">Next</a></li>
			</ul>
		</nav>
	</div><!-- /.container-fluid -->

</section>


