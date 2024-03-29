<!-- Content Wrapper. Contains page content -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Ticket Detail</h1>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="callout callout-info">
					<h5><i class="fas fa-info mr-2"></i> ID Ticket: <?=$ticket->id_ticket;?></h5>
				</div>
				<!-- Main content -->
				<div class="invoice p-3 mb-3">
					<!-- title row -->
					<div class="row">
						<div class="col-12">
							<h4>
								<i class="fas fa-globe"></i> PT Dimata IT Solutions
								<small class="float-right">Date: <?=$ticket->created;?></small>
							</h4>
						</div>
						<!-- /.col -->
					</div>
					<!-- info row -->
					<div class="row invoice-info">
						<div class="col-sm-4 invoice-col">
							From
							<address>
								<strong><?=$ticket->username;?></strong><br>
								Email: <?=$ticket->email;?>
							</address>
						</div>
						<!-- /.col -->
						<div class="col-sm-4 invoice-col">
							<br>
							<b>ID Ticket:</b> <?=$ticket->id_ticket;?><br>
							<b>Status:</b> <?php
							if ($ticket->status == 0){
								echo "Pending";
							}else if  ($ticket->status == 1){
								echo "Process";
							}else{
								echo "Closed";
							}
							?><br>
							<b>Subject:</b>  <?=$ticket->subject;?>
						</div>
						<!-- /.col -->
						<div class="col-sm-4 invoice-col"><br>
							<?php
								for ($i = 0; $i < 3; $i++){
									$uname = "-";
									if (isset($temp[$i]->username)){
										$uname = $temp[$i]->username;
									}
									?>
									<b>Administrator Lv. <?=$i+1;?>:</b> <?=$uname;?><br>
								<?php }
							?>
						</div>
						<!-- /.col -->

					</div>
					<!-- /.row -->
					<hr>
					<label class="form-check-label">Message</label>
					<div class="mt-3">
						<textarea disabled class="form-control w-100" rows="2"><?=$ticket->message;?></textarea>
					</div>
					<label class="form-check-label mt-3">Assignee Settings</label>
					<form class="mt-3" action="<?=base_url('assignee/process_update');?>" method="post">
						<input type="text" class="d-none" name="id_ticket" value="<?=$ticket->id_ticket;?>" id="">
							<?php
							for($i = 0; $i < 3; $i++){ ?>
								<label for="">Admin <?=$i+1;?>:</label>
								<select class="form-select form-control" name="admin<?=$i;?>">
									<option
										<?php
										if (!isset($temp[$i]->username)){
											echo "selected";
										}
										?>
										value="<?=null;?>"
									>-
									</option>
									<?php for ($j = 0; $j < count($admin); $j++){ ?>
										<option <?php
										if (isset($temp[$i]->username)){
											if ($temp[$i]->username == $admin[$j]->username){
												echo "selected";
											}
										}
										?>
											value="<?=$admin[$j]->id_user;?> "
										>
											<?=$admin[$j]->username;?>  </option>
									<?php }?>
								</select><br>
							<?php } ?>
						<button class="btn btn-primary" type="submit" name="submit">Update</button>
					</form>
				</div>
				<!-- /.invoice -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

