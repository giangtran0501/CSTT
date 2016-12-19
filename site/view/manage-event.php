<!-- <?php session_start() ?> -->
<!DOCTYPE html>
<html>
<head>
	<title>Quản trị tri thức</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="public/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/vendor/fonts/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/css.css">

</head>
<body>
	<!-- Menu-user -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand"><span>AppleTree</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-o" aria-hidden="true"></i> User (<?php echo $_SESSION['name']; ?>)<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="?c=manage&a=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất </a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- /Menu-user -->
	<!-- Sidebar -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<!-- Menu -->
		<ul class="nav menu" style="margin-top: 30px;">
			<li>
				<a href="?c=manage&a=manage"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Luật </a>
			</li>
			<li class="active">
				<a href="?c=manage&a=event"><i class="fa fa-briefcase" aria-hidden="true"></i> Sự kiện </a>
			</li>
		</ul>
		<!-- /Menu -->
	</div>
	<!-- /Sidebar -->

	<!-- Content -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sự kiện</h1>
			</div>
		</div>

		<!-- Event - Age -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default ">
					<div class="panel-heading" id="accordion">
						Độ tuổi
					</div>

					<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th style="width: 150px;">Mã sự kiện</th>
									<th>Nội dung</th>
									<th style="width: 50px;"></th>
									<th style="width: 50px;"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($age as $a) {?>
								<tr>
									<td><?php echo $a["evencode"]; ?></td>
									<td><?php echo $a["content"]; ?></td>
									<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAge<?php echo $a["idevent"];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Sửa</button>
									<!-- Modal content -->
									<div id="modalAge<?php echo $a["idevent"];?>" class="modal fade" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Sửa sự kiện</h4>
												</div>
												<div class="modal-body">
													<form action="?c=manage&a=editEvent" method="post">
														<div class="form-group">
														    <label for="event">Nội dung:</label>
														    <input type="text" class="form-control" id="event" name="event" value="<?php echo $a["content"]; ?>">
														    <input type="hidden" name="eventid" value="<?php echo $a["idevent"]; ?>">
														</div>
														<button type="submit" name="edit" value="Sửa" class="btn btn-primary">Sửa</button>
													</form>
												</div>
											</div>
										</div>
									</div>
									<!-- /Modal content -->
									</td>
									
									<td><button class="btn btn-warning" onclick="delEvent(<?php echo $a["idevent"];?>)"><i class="fa fa-ban" aria-hidden="true"></i>   Xóa</button></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<div class="addEvent">
							<form class="form-inline" action="?c=manage&a=addEvent" method="post">
								<div class="form-group">
								    <label for="addevent">Nội dung:  </label>
								    <input type="text" class="form-control" id="addevent1" name="addevent" value="" style="width: 450px;">
								  	<input type="hidden" name="type" value="1">
								</div>
								<button type="submit" class="btn btn-primary" name="add" id="add1" value="Thêm">Thêm</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Event - Age -->
		<!-- Event - Sex -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default ">
					<div class="panel-heading" id="accordion">
						Giới tính
					</div>

					<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th style="width: 150px;">Mã sự kiện</th>
									<th>Nội dung</th>
									<th style="width: 50px;"></th>
									<th style="width: 50px;"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($sex as $s) {?>
								<tr>
									<td><?php echo $s["evencode"]; ?></td>
									<td><?php echo $s["content"]; ?></td>
									<td><button class="btn btn-primary disabled"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Sửa</button></td>
									<td><button class="btn btn-warning disabled"><i class="fa fa-ban" aria-hidden="true"></i>   Xóa</button></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<div class="addEvent">
							<form class="form-inline">
								<div class="form-group">
								    <label for="addevent">Nội dung:  </label>
								    <input type="text" class="form-control" id="addevent2" name="addevent" value="" style="width: 450px;">
								  	<input type="hidden" name="type" value="2">
								</div>
								<button type="button" class="btn btn-primary disabled" name="add" id="add2" value="Thêm">Thêm</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Event - Sex -->
		<!-- Event - Characters -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default ">
					<div class="panel-heading" id="accordion">
						Tính cách
					</div>

					<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th style="width: 150px;">Mã sự kiện</th>
									<th>Nội dung</th>
									<th style="width: 50px;"></th>
									<th style="width: 50px;"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($characters as $c) {?>
								<tr>
									<td><?php echo $c["evencode"]; ?></td>
									<td><?php echo $c["content"]; ?></td>
									<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAge<?php echo $c["idevent"];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Sửa</button>
									<!-- Modal content -->
									<div id="modalAge<?php echo $c["idevent"];?>" class="modal fade" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Sửa sự kiện</h4>
												</div>
												<div class="modal-body">
													<form action="?c=manage&a=editEvent" method="post">
														<div class="form-group">
														    <label for="event">Nội dung:</label>
														    <input type="text" class="form-control" id="event" name="event" value="<?php echo $c["content"]; ?>">
														    <input type="hidden" name="eventid" value="<?php echo $c["idevent"]; ?>">
														</div>
														<button type="submit" name="edit" value="Sửa" class="btn btn-primary">Sửa</button>
													</form>
												</div>
											</div>
										</div>
									</div>
									<!-- /Modal content -->
									</td>
									<td><button class="btn btn-warning" onclick="delEvent(<?php echo $c["idevent"];?>)"><i class="fa fa-ban" aria-hidden="true"></i>   Xóa</button></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<div class="addEvent">
							<form class="form-inline" action="?c=manage&a=addEvent" method="post">
								<div class="form-group">
								    <label for="addevent">Nội dung:  </label>
								    <input type="text" class="form-control" id="addevent3" name="addevent" value="" style="width: 450px;">
								  	<input type="hidden" name="type" value="3">
								</div>
								<button type="submit" class="btn btn-primary" name="add" id="add3" value="Thêm">Thêm</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Event - Characters -->
		<!-- Event - Desire -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default ">
					<div class="panel-heading" id="accordion">
						Mong muốn của phụ huynh
					</div>

					<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th style="width: 150px;">Mã sự kiện</th>
									<th>Nội dung</th>
									<th style="width: 50px;"></th>
									<th style="width: 50px;"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($desire as $d) {?>
								<tr>
									<td><?php echo $d["evencode"]; ?></td>
									<td><?php echo $d["content"]; ?></td>
									<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAge<?php echo $d["idevent"];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Sửa</button>
									<!-- Modal content -->
									<div id="modalAge<?php echo $d["idevent"];?>" class="modal fade" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Sửa sự kiện</h4>
												</div>
												<div class="modal-body">
													<form action="?c=manage&a=editEvent" method="post">
														<div class="form-group">
														    <label for="event">Nội dung:</label>
														    <input type="text" class="form-control" id="event" name="event" value="<?php echo $d["content"]; ?>">
														    <input type="hidden" name="eventid" value="<?php echo $d["idevent"]; ?>">
														</div>
														<button type="submit" name="edit" value="Sửa" class="btn btn-primary">Sửa</button>
													</form>
												</div>
											</div>
										</div>
									</div>
									<!-- /Modal content -->
									</td>
									<td><button class="btn btn-warning" onclick="delEvent(<?php echo $d["idevent"];?>)"><i class="fa fa-ban" aria-hidden="true"></i>   Xóa</button></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<div class="addEvent">
							<form class="form-inline" action="?c=manage&a=addEvent" method="post">
								<div class="form-group">
								    <label for="addevent">Nội dung:  </label>
								    <input type="text" class="form-control" id="addevent4" name="addevent" value="" style="width: 450px;">
								  	<input type="hidden" name="type" value="4">
								</div>
								<button type="submit" class="btn btn-primary" name="add" id="add4" value="Thêm">Thêm</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Event - Desire -->
	</div>
	<!-- /Content -->


	<script type="text/javascript" src="public/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function delEvent(id){
			var c = confirm("Bạn thực sự muốn xóa sự kiện này!");
			if(c == true){
				window.location.href = "/cstt/index.php?c=manage&a=delEvent&id=" + id;
			}
		}
	</script>
	<script type="text/javascript">
		window.onload = function(){
			var add1 = document.getElementById('add1');
			add1.onclick = function(){
				var event1 = document.getElementById('addevent1');
				if(event1.value == ""){
					alert("Xin hãy nhập nội dung!!!");
					return false;
				}
				return true;
			}
			var add3 = document.getElementById('add3');
			add3.onclick = function(){
				var event3 = document.getElementById('addevent3');
				if(event3.value == ""){
					alert("Xin hãy nhập nội dung!!!");
					return false;
				}
				return true;
			}
			var add4 = document.getElementById('add4');
			add4.onclick = function(){
				var event4 = document.getElementById('addevent4');
				if(event4.value == ""){
					alert("Xin hãy nhập nội dung!!!");
					return false;
				}
				return true;
			}
		}
	</script>
</body>
</html>