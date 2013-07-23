<?php
/**
 * This file is part of PhpCocktail. PhpCocktail is free software: you can redistribute it and/or modify it under the
 * 		terms of the GNU Lesser General Public License as published by the Free Software Foundation, either version 3
 * 		of the License, or (at your option) any later version.
 * PhpCocktail is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * 		warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Lesser General Public License for
 * 		more details. You should have received a copy of the GNU Lesser General Public License along with PhpCocktail.
 * 		If not, see <http://www.gnu.org/licenses/>.
 * @author t
 * @since 1.0
 * @license LGPL
 * @copyright Copyright 2013 t
 */?>
<?php /* @todo this could be sent to the JS agregator */ ?>
<script>
	$(function() {
		$("#nav-login-box a.login").click(function() {
			$("#nav-login-box ul.nav").hide();
			$("#nav-login-box form").show();
		})
	})
</script>
					<section id="nav-login-box" class="pull-right">
						<ul class="nav">
							<li><a href="#" class="login">Login</a></li>
							<li><a href="register">Register</a></li>
						</ul>
						<form class="navbar-form form-inline" style="display: none;" action="<?= $loginFormAction ?>" method="POST">
							<input type="text" name="login" class="input-small" placeholder="Email" />
							<input type="password" name="password" class="input-small" placeholder="Password" />
							<label class="checkbox"><input type="checkbox" name="stayloggedin" />Remember me</label>
							<button type="submit" class="btn">Sign in</button>
						</form>
					</section>
