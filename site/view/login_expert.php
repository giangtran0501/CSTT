<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/vendor/bootstrap/css/bootstrap-theme.min.css">
</head>
<body>
	<div class="container">
		<div id="loginbox" style="margin-top: 50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title"><center>Đăng nhập</center></div>
				</div>

				<div class="panel-body" id="body-login" style="padding-top: 30px;">
					<div style="display: none;" id="login-alert" class="alert alert-danger col-sm-12"></div>

					<form id="loginform" class="form-horizontal" role="form" action="?c=manage&a=loginhandle" method="post">
						<div class="input-group" style="margin-bottom: 25px;">
							<div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
							<input type="text" id="username" name="username" class="form-control" value="" placeholder="Nhập username..........">
						</div>

						<div class="input-group" style="margin-bottom: 25px;">
							<div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
							<input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu............">
						</div>

						<div class="form-group" style="margin-top: 10px;">
							<div class="col-sm-12 controls">
								<center><input type="submit" href="?c=manage&a=loginhandle" id="btn-login" name="btn-login" class="btn btn-success" value="Đăng nhập" /></center>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="public/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		window.onload = function (){
			var login = document.getElementById('btn-login');
			login.onclick = function(){
				var error = false;
				var username = document.getElementById('username');
				var password = document.getElementById('password');
				var span_u = document.createElement('span');
				var p_u = username.parentNode;
				if(p_u.lastChild.nodeName == 'SPAN'){
					p_u.removeChild(p_u.lastChild);
				}
				var span_p = document.createElement('span');
				var p_p = password.parentNode;
				if(p_p.lastChild.nodeName == 'SPAN'){
					p_p.removeChild(p_p.lastChild);
				}
				if(username.value == ''){
					span_u.innerHTML = 'Hãy nhập username!';
				}
				if(password.value == ''){
					span_p.innerHTML = 'Hãy nhập password!';
				}
				
				if(span_u.innerHTML != '' || span_p.innerHTML != ''){
					if (span_u.innerHTML != '') {
						username.parentNode.appendChild(span_u);
					}
					if (span_p.innerHTML != '') {
						password.parentNode.appendChild(span_p);
					}
					error = true;
				}
				return !error;
			}
		}
	</script>
	<script type="text/javascript">
		window.onload = function(){
			var mess = "<?php echo $mess; ?>";
			if(mess != ''){
				var alertlg = document.getElementById('login-alert');
				alertlg.style.display = 'block';
				alertlg.innerHTML = mess;
			}
		}
	</script>
</body>
</html>