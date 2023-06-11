<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
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
					<h5><i class="fas fa-info mr-2"></i> ID Ticket: <?= $ticket->id_ticket; ?></h5>
				</div>
				<!-- Main content -->
				<div class="invoice p-3 mb-3">
					<!-- title row -->
					<div class="row">
						<div class="col-12">
							<h4>
								<i class="fas fa-globe"></i> PT Dimata IT Solutions
								<small class="float-right">Date: <?= $ticket->created; ?></small>
							</h4>
						</div>
						<!-- /.col -->
					</div>
					<!-- info row -->
					<div class="row invoice-info">
						<div class="col-sm-4 invoice-col">
							From
							<address>
								<strong><?= $ticket->username; ?></strong><br>
								Email: <?= $ticket->email; ?>
							</address>
						</div>
						<!-- /.col -->
						<div class="col-sm-4 invoice-col">
							<br>
							<b>ID Ticket:</b> <?= $ticket->id_ticket; ?><br>
							<b>Status:</b> <?php
							if ($ticket->status == 0) {
								echo "Pending";
							} else if ($ticket->status == 1) {
								echo "Process";
							} else {
								echo "Closed";
							}
							?><br>
							<b>Subject:</b> <?= $ticket->subject; ?>
						</div>
						<!-- /.col -->
						<div class="col-sm-4 invoice-col">
							<br>
							<?php
							for ($i = 0; $i < 3; $i++) { ?>
								<b>Administrator Lv. <?= $i + 1; ?>:</b>
								<?php
								if (isset($assignee[$i]->username)) {
									echo $assignee[$i]->username;
								} else {
									echo "-";
								}
								echo "<br>";
							}
							?>

						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
					<hr>
					<label class="form-check-label">Message</label>
					<div class="mt-3">
						<div class="my-1 d-flex flex-column align-items-start">
							<div class="bg-gradient-gray rounded p-2", style="width: fit-content; max-width: 60%">
								<?=$ticket->message;?>
							</div>
							<small class="text-right"><?php echo $ticket->username . ' | ' . substr($ticket->created, 11,5);?></small>
						</div>
					</div>
					<?php
						if (isset($chat)){
							$counter = 1;
							foreach ($chat as $c){
							$align = "end";

							if ($c->role == 0){
								$align = "start";
							}
								?>
								<div class="d-flex my-1 flex-column align-items-<?=$align;?>">
									<div class="bg-gradient-gray rounded p-2", style="width: fit-content; max-width: 60%">
										<?=$c->message;?>
									</div>
										<?php
										if ($counter < count($chat) && $chat[$counter-1]->username != $chat[$counter]->username){ ?>
											<small class="text-right"><?php echo $c->username . ' | ' . substr($c->created, 11,5);?></small>
										<?php }else if ($counter == count($chat)){ ?>
											<small class="text-right"><?php echo $c->username . ' | ' . substr($c->created, 11,5);?></small>
										<?php } ?>
								</div>
						<?php
							$counter++;
							}
						}?>

				</div>


				<?php
				if (!isset($p_ticket)){ ?>
					<div id="chat" class="invoice p-3 mb-3">
						<form action="<?=base_url('chat/process_new_message');?>" method="post">
							<div class="d-flex">
								<input class="d-none" name="id_user" value="<?=$this->session->id_user;?>">
								<input class="d-none" name="role" value="<?=$this->session->role;?>">
								<input class="d-none" name="id_ticket" value="<?=$ticket->id_ticket?>">
								<input name="message" class="form-control mr-2">
								<button type="submit" value="submit" class="btn btn-primary">send</button>
							</div>
							<label class="text-danger mt-2"><?= $this->session->flashdata('message'); ?></label>
							<?php
							$this->session->set_flashdata('message', '');
							?>
						</form>
					</div>
				<?php } ?>

			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

