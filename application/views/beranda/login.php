<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<form class="login100-form validate-form p-t-50" method="POST" action="">
				<div>

					<?= $this->session->flashdata('message');  ?>
					<span class="login100-form-title">
						<div class="">
							<img height="100px" width="100px" src="https://github.com/aderohmatmaulana98/pusdiklat/blob/main/LOGO_UTY.png?raw=true" alt="IMG">
						</div>
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" value="<?= set_value('email') ?>" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="<?= base_url('auth/forgotpassword'); ?>">
							Password?
						</a>
					</div>

					<div class="text-center p-t-120">
						<a class="txt2" href="<?= base_url('auth/registration') ?>">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
