
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 3 | Registration Page</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url();?>assets/back/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?=base_url();?>assets/back/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url();?>assets/back/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
	<div style="display: flex; align-items: center; justify-content: center;">
		<img src="<?=base_url();?>assets/back/Logo-Dimata.png" alt="Dimata Logo" height="50%" width="50%">
	</div>
	<div class="login-logo" style="margin-top: 1rem;">
		<a href="<?=base_url();?>assets/back/index2.html"><b>Register</b></a>
	</div>

	<div class="card">
		<div class="card-body register-card-body">
			<p class="login-box-msg">Register a new membership</p>
			<?=validation_errors();?>
			<form action="<?=base_url('auth/process_register');?>" method="post">
				<div class="input-group mb-3">
					<input type="text" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Username" name="username">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="text" value="<?=set_value('email');?>" class="form-control" placeholder="Email" name="email">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" placeholder="Password" name="password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" placeholder="Retype password" name="confirm_password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-8">
						<div class="icheck-primary">
							<input type="checkbox" id="agreeTerms" name="terms" value="agree">
							<label for="agreeTerms">
								I agree to the <a href="#">terms</a>
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block">Register</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

			<hr>

			All ready registered? <a href="login.html" class="text-center">Login</a>
		</div>
		<!-- /.form-box -->
	</div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?=base_url();?>assets/back/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url();?>assets/back/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/back/dist/js/adminlte.min.js"></script>
</body>
</html>
