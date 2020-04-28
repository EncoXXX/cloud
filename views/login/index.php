
	<title>Вхід</title>
	 <?php CSS::add("~/form_css/main.css"); ?>
	 <?php CSS::add("~/form_css/util.css"); ?>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w">

					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Поле має бути не пустим">
						<input class="input100" type="email" name="email" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Пароль
					</span>

					<div class="wrap-input100 validate-input m-b-12" data-validate = "Поле має бути не пустим">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt3">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn">
							Увійти
						</button>
					</div>
					<div id = "text_error">

					</div>
					<div style="text-align:right;">
						Ще не маєте акаунту? <a href = "/register">Зареєструватись</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>


	<?php JS::add("~/main.js"); ?>
	<?php JS::add("~/login.js");?>
