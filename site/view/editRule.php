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
			<li class="active">
				<a href="?c=manage&a=manage"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Luật </a>
			</li>
			<li>
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
				<h1 class="page-header">Sửa luật</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default ">
					<div class="panel-heading" id="accordion">
						Sửa luật
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-3 col-lg-3 col-sm-9">
								<label>Điều kiện</label>
							</div>
							<div class="col-md-6 col-lg-6 col-sm-9">
								<p><?php echo $content; ?></p>
							</div>
						</div>
						<div class="row">
							<table class="table">
								<tbody>
									<tr>
										<td class="col-md-3"><label style="margin-left: 7px;">Kết quả</label></td>
										<td>
											<ul class="list-group">
												<?php foreach($lb as $b) {?>
											    <li class="list-group-item">
											    	<?php echo $b['title']; ?>
											    	<a href="?c=manage&a=delBookFromRule&idcondition=<?php echo $idcondition;?>&idbook=<?php echo $b['idbook']; ?>&content=<?php echo $content;?>" style="float: right;">Xóa</a>
											    </li>
												<?php } ?>
											</ul>
										</td>
									</tr>

									<tr>
										<td class="col-md-3"><label style="margin-left: 7px;">Thêm</label></td>
										<td>
											<ul class="list-group">
												<?php foreach($ab as $a) {
													$check = false;
													foreach ($lb as $l) {
														if ($a['idbook'] == $l['idbook']) {
															$check = true;
															break;
														}
													}
													if ($check == false) {
												?>
											    <li class="list-group-item">
											    	<?php echo $a['title']; ?>
											    	<a href="?c=manage&a=addBookToRule&idcondition=<?php echo $idcondition;?>&idbook=<?php echo $a['idbook']; ?>&content=<?php echo $content;?>" style="float: right;">Thêm</a>
											    </li>
												<?php }} ?>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /Content -->


	<script type="text/javascript" src="public/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>