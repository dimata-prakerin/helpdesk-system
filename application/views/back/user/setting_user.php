



<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">History Ticket</h1>
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
		<?php
		$roles = array("User"=> 0, "Admin" => 1, "Super Admin" =>2);
		echo $user[0]->username;
		echo $user[0]->role;
		?>
		<form action="<?=base_url('user/process_change_role');?>" method="post">
			<label class="form-label"  for="">Role</label><br>
			<input name="id_user" class="d-none" value="<?=$user[0]->id_user;?>">
			<select class="form-control mb-3" name="role">
				<?php
				$counter = 0;
				foreach ($roles as $key => $value){?>
					<option <?php
					if ($value == $user[0]->role){
						echo "selected";
					}?>
					value="<?=$value;?>"
					><?=$key;?></option>
				<?php $counter++; }

				?>
			</select>
			<button class="btn btn-primary" type="submit" name="submit">Update</button>
		</form>
	</div>
</section>
