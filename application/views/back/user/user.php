<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Master User</h1>
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
				<th>ID User</th>
				<th>Username</th>
				<th>Email</th>
				<th>Role</th>
			</tr>
			</thead>
			<tbody>

			<?php
			$counter = 1;
			foreach ($users as $user) { ?>
				<tr>
					<td><?= $counter++; ?></td>
					<td><?= $user->id_user; ?></td>
					<td><?= $user->username; ?></td>
					<td><?= $user->email; ?></td>
					<td><?php
						if($user->role == 0){
							echo '<button class="btn btn-primary">User</button>';
						}else if ($user->role == 1){
							echo '<button class="btn btn-danger">Admin</button>';
						}
						?>
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
	</div>
</section>
