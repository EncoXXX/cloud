<title>Реєстрація</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <?php CSS::add("~/form_css/main.css"); ?>
	 <?php CSS::add("~/form_css/util.css"); ?>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST">

					<span class="txt1 p-b-11">
						Ім'я
					</span>
					<div class="wrap-input100 validate-input m-b-36" id="id_name">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Прізвище
					</span>
					<div class="wrap-input100 validate-input m-b-36"  id="id_sename">
						<input class="input100" type="text" name="sername" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						По Батькові
					</span>
					<div class="wrap-input100 validate-input m-b-36" id="id_faname">
						<input class="input100" type="text" name="father" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" id="id_email">
						<input class="input100" type="email" name="email" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Пароль
					</span>
					<div class="wrap-input100 validate-input m-b-12"  id="id_pass">
					<input class="input100" type="password" name="pass" >
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>

						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Підтвердити Пароль
					</span>
					<div class="wrap-input100 validate-input m-b-12" id="id_repass">
					<input class="input100" type="password" name="repass">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>

						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-48">
					<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<div class="contact100-form-checkbox">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn">
							Зареєструватися
						</button>
					</div>
					<div id="text_error">

					</div>
					<div style="text-align:right;">
						Уже маєте акаунт? <a href = "/login">Увійти</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>


	<?php //JS::add("~/main.js"); ?>
	<?php JS::add("~/register.js")?>