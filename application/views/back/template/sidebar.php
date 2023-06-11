<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?=base_url();?>assets/back/dist/img/dimata-logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .9">
		<span class="brand-text font-weight-light">Dimata Helpdesk</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?=base_url();?>assets/back/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?=$this->session->username;?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
	   with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?=base_url('dashboard');?>" class="nav-link  <?php if (isset($p_dashboard)){
						echo "active";
					}?>">
						<i class="nav-icon fas fa-home"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<?php
					if ($this->session->role != 0){?>
						<li class="nav-header">DATA MASTER</li>
						<li class="nav-item">
							<a href="<?=base_url('user');?>" class="nav-link <?php if (isset($p_user)){
								echo "active";
							}?>">
								<i class="nav-icon fas fa-users"></i>
								<p>
									Master User
									<!--							<span class="badge badge-info right">2</span>-->
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('ticket');?>" class="nav-link  <?php if (isset($p_ticket)){
								echo "active";
							}?>">
								<i class="nav-icon fas fa-clipboard-list"></i>
								<p>
									Master Tiket
								</p>
							</a>
						</li>

					<?php }

				?>
				<li class="nav-header">TICKET</li>
				<li class="nav-item">
					<a href="<?=base_url('ticket/new_ticket');?>" class="nav-link <?php if (isset($p_new_ticket)){
						echo "active";
					}?>">
						<i class="nav-icon fas fa-ticket-alt"></i>
						<p>New Ticket</p>
					</a>
				</li>
				<?php
				if ($this->session->role != 0){?>
					<li class="nav-item">
						<a href="<?=base_url('ticket/manage_ticket');?>" class="nav-link <?php if (isset($p_manage_ticket)){
							echo "active";
						}?>">
							<i class="nav-icon fas fa-folder"></i>
							<p>Manage Ticket</p>
						</a>
					</li>
				<?php } ?>
				<li class="nav-item">
					<a href="<?=base_url('ticket/history_ticket');?>" class="nav-link <?php if (isset($p_history_ticket)){
						echo "active";
					}?>">
						<i class="nav-icon fas fa-clock"></i>
						<p>History Ticket</p>
					</a>
				</li>
				<li class="nav-header">ACCOUNT</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="fas fa-user nav-icon"></i>
						<p>Profile</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=base_url('auth/logout');?>" class="nav-link">
						<i class="fas fa-sign-out-alt nav-icon"></i>
						<p>Logout</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
