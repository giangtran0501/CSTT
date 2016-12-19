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
	    <!-- Datatables -->
    <link href="public/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="public/vendor/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="public/vendor/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="public/vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="public/vendor/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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
				<h1 class="page-header">Luật</h1>
				<?php if ($mess != '') { ?>
					<div class="alert alert-warning"><?php echo $mess; ?></div>
				<?php }  ?>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body tabs">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#1dk" data-toggle="tab">Luật 1 điều kiện</a></li>
							<li><a href="#2dk" data-toggle="tab">Luật 2 điều kiện</a></li>
							<li><a href="#3dk" data-toggle="tab">Luật 3 điều kiện</a></li>
							<li><a href="#4dk" data-toggle="tab">Luật 4 điều kiện</a></li>
						</ul>

						<div class="tab-content">
							<!-- Luật 1 điều kiện -->
							<div class="tab-pane fade in active" id="1dk">
								<div class="panel panel-default ">
									<div class="panel-heading" id="accordion">
										Luật 1 điều kiện
									</div>

									<div class="panel-body">
										<table id="table1" class="table table-striped table-bordered">
											<thead>
												<tr>
													<th style="width: 50px;">STT</th>
													<th style="width: 200px;">Điều kiện</th>
													<th>Kết quả</th>
													<th style="width: 150px;">Chuyên gia</th>
													<th style="width: 50px;"></th>
													<th style="width: 50px;"></th>
												</tr>
											</thead>
											<tbody>
												<?php   
												$i = 0;
												foreach ($dk1 as $d1) {
												?>
												<tr style="height: 150px;">
													<td><?php echo $i+1; ?></td>
													<td><?php echo $ev1[$i]['event']; ?></td>
													<td style="overflow: auto;">
														<?php foreach ($b1[$i]['books'] as $b) {
													 		echo $b['title'];
													 		echo "<br/>";
													 	} ?>
													</td>
													<td><?php echo $d1['name_pro']; ?></td>
													<td><button type="button" class="btn btn-primary" onclick="editRule(<?php echo $d1['idcondition'];?>, '<?php echo $ev1[$i]['event'];?>')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Sửa</button></td>
													<td><button class="btn btn-warning" onclick="delRule(<?php echo $d1["idcondition"];?>)"><i class="fa fa-ban" aria-hidden="true"></i>   Xóa</button></td>
												</tr>
												<?php $i++; } ?>
											</tbody>
										</table>
									</div>
									<!-- Thêm luật 1 điều kiện -->
									<div class="panel panel-footer">
										<button class="btn btn-primary" data-toggle="modal" data-target="#m1" >Thêm</button>
										<div id="m1" class="modal fade" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Thêm luật 1 điều kiện</h4>
													</div>
													<div class="modal-body">
														<form action="?c=manage&a=add1Dk" method="post">
															<div class="form-group">
															    <label for="con1">Chọn điều kiện:</label>
															    <select class="form-control" id="con1" name="con1">
																    <optgroup label="Độ tuổi">
																	    <?php foreach($age as $a) {?>
																    		<option value="<?php echo $a['evencode']; ?>"><?php echo $a['content']; ?></option>
																    	<?php } ?>
																	</optgroup>
															    	<optgroup label="Giới tính">
																	    <?php foreach($sex as $s) {?>
																    		<option value="<?php echo $s['evencode']; ?>"><?php echo $s['content']; ?></option>
																    	<?php } ?>
																	</optgroup>	
																	<optgroup label="Tính cách">
																	    <?php foreach($characters as $c) {?>
																    		<option value="<?php echo $c['evencode']; ?>"><?php echo $c['content']; ?></option>
																    	<?php } ?>
																	</optgroup>
																	<optgroup label="Mong muốn của phụ huynh">
																	    <?php foreach($desire as $d) {?>
																    		<option value="<?php echo $d['evencode']; ?>"><?php echo $d['content']; ?></option>
																    	<?php } ?>
																	</optgroup>									
																</select>
															</div>
															<button type="submit" name="add1R" value="Thêm" class="btn btn-primary" id="check1">Thêm</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /Thêm luật 1 điều kiện -->
								</div>
							</div>
							<!-- /Luật 1 điều kiện -->
							<!-- Luật 1 điều kiện -->
							<div class="tab-pane fade" id="2dk">
								<div class="panel panel-default ">
									<div class="panel-heading" id="accordion">
										Luật 2 điều kiện
									</div>

									<div class="panel-body">
										<table id="table2"  class="table table-striped table-bordered">
											<thead>
												<tr>
													<th style="width: 50px;">STT</th>
													<th style="width: 200px;">Điều kiện</th>
													<th>Kết quả</th>
													<th style="width: 150px;">Chuyên gia</th>
													<th style="width: 50px;"></th>
													<th style="width: 50px;"></th>
												</tr>
											</thead>
											<tbody>
												<?php   
												$i = 0;
												foreach ($dk2 as $d2) {
												?>
												<tr style="height: 150px;">
													<td><?php echo $i+1; ?></td>
													<td><?php echo $ev2[$i]['event']; ?></td>
													<td style="overflow: auto;">
														<?php foreach ($b2[$i]['books'] as $b) {
													 		echo $b['title'];
													 		echo "<br/>";
													 	} ?>
													</td>
													<td><?php echo $d2['name_pro']; ?></td>
													<td><button type="button" class="btn btn-primary" onclick="editRule(<?php echo $d2['idcondition'];?>, '<?php echo $ev2[$i]['event'];?>')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Sửa</button></td>
													<td><button class="btn btn-warning" onclick="delRule(<?php echo $d2["idcondition"];?>)"><i class="fa fa-ban" aria-hidden="true"></i>   Xóa</button></td>
												</tr>
												<?php $i++; } ?>
											</tbody>
										</table>
									</div>
									<!-- Thêm luật 2 điều kiện -->
									<div class="panel panel-footer">
										<button class="btn btn-primary" data-toggle="modal" data-target="#m2" >Thêm</button>
										<div id="m2" class="modal fade" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Thêm luật 2 điều kiện</h4>
													</div>
													<div class="modal-body">
														<form action="?c=manage&a=add2Dk" method="post">
															<div class="form-group">
															    <label for="con1">Chọn điều kiện thứ nhất:</label>
															    <select class="form-control" id="con1" name="con1">
																    <optgroup label="Độ tuổi">
																	    <?php foreach($age as $a) {?>
																    		<option value="<?php echo $a['evencode']; ?>"><?php echo $a['content']; ?></option>
																    	<?php } ?>
																	</optgroup>
															    	<optgroup label="Giới tính">
																	    <?php foreach($sex as $s) {?>
																    		<option value="<?php echo $s['evencode']; ?>"><?php echo $s['content']; ?></option>
																    	<?php } ?>
																	</optgroup>	
																	<optgroup label="Tính cách">
																	    <?php foreach($characters as $c) {?>
																    		<option value="<?php echo $c['evencode']; ?>"><?php echo $c['content']; ?></option>
																    	<?php } ?>
																	</optgroup>
																	<optgroup label="Mong muốn của phụ huynh">
																	    <?php foreach($desire as $d) {?>
																    		<option value="<?php echo $d['evencode']; ?>"><?php echo $d['content']; ?></option>
																    	<?php } ?>
																	</optgroup>									
																</select>
															</div>
															<div class="form-group">
															    <label for="con2">Chọn điều kiện thứ hai:</label>
															    <select class="form-control" id="con2" name="con2">
																    <optgroup label="Độ tuổi">
																	    <?php foreach($age as $a) {?>
																    		<option value="<?php echo $a['evencode']; ?>"><?php echo $a['content']; ?></option>
																    	<?php } ?>
																	</optgroup>
															    	<optgroup label="Giới tính">
																	    <?php foreach($sex as $s) {?>
																    		<option value="<?php echo $s['evencode']; ?>"><?php echo $s['content']; ?></option>
																    	<?php } ?>
																	</optgroup>	
																	<optgroup label="Tính cách">
																	    <?php foreach($characters as $c) {?>
																    		<option value="<?php echo $c['evencode']; ?>"><?php echo $c['content']; ?></option>
																    	<?php } ?>
																	</optgroup>
																	<optgroup label="Mong muốn của phụ huynh">
																	    <?php foreach($desire as $d) {?>
																    		<option value="<?php echo $d['evencode']; ?>"><?php echo $d['content']; ?></option>
																    	<?php } ?>
																	</optgroup>									
																</select>
															</div>
															<button type="submit" name="add2R" value="Thêm" class="btn btn-primary" id="check2">Thêm</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /Thêm luật 2 điều kiện -->
								</div>
							</div>
							<!-- /Luật 2 điều kiện -->
							<!-- Luật 3 điều kiện -->
							<div class="tab-pane fade" id="3dk">
								<div class="panel panel-default ">
									<div class="panel-heading" id="accordion">
										Luật 3 điều kiện
									</div>

									<div class="panel-body">
										<table id="table3" class="table table-striped table-bordered">
											<thead>
												<tr>
													<th style="width: 50px;">STT</th>
													<th style="width: 200px;">Điều kiện</th>
													<th>Kết quả</th>
													<th style="width: 150px;">Chuyên gia</th>
													<th style="width: 50px;"></th>
													<th style="width: 50px;"></th>
												</tr>
											</thead>
											<tbody>
												<?php   
												$i = 0;
												foreach ($dk3 as $d3) {
												?>
												<tr style="height: 150px;">
													<td><?php echo $i+1; ?></td>
													<td><?php echo $ev3[$i]['event']; ?></td>
													<td style="overflow: auto;">
														<?php foreach ($b3[$i]['books'] as $b) {
													 		echo $b['title'];
													 		echo "<br/>";
													 	} ?>
													</td>
													<td><?php echo $d3['name_pro']; ?></td>
													<td><button type="button" class="btn btn-primary" onclick="editRule(<?php echo $d3['idcondition'];?>, '<?php echo $ev3[$i]['event'];?>')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Sửa</button></td>
													<td><button class="btn btn-warning" onclick="delRule(<?php echo $d3["idcondition"];?>)"><i class="fa fa-ban" aria-hidden="true"></i>   Xóa</button></td>
												</tr>
												<?php $i++; } ?>
											</tbody>
										</table>
									</div>
									<!-- Thêm luật 3 điều kiện -->
									<div class="panel panel-footer">
										<button class="btn btn-primary" data-toggle="modal" data-target="#m3" >Thêm</button>
										<div id="m3" class="modal fade" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Thêm luật 3 điều kiện</h4>
													</div>
													<div class="modal-body">
														<form action="?c=manage&a=add3Dk" method="post">
															<div class="form-group">
															    <label for="con1">Chọn điều kiện thứ nhất:</label>
															    <select class="form-control" id="con1" name="con1">
																    <optgroup label="Độ tuổi">
																	    <?php foreach($age as $a) {?>
																    		<option value="<?php echo $a['evencode']; ?>"><?php echo $a['content']; ?></option>
																    	<?php } ?>
																	</optgroup>
															    	<optgroup label="Giới tính">
																	    <?php foreach($sex as $s) {?>
																    		<option value="<?php echo $s['evencode']; ?>"><?php echo $s['content']; ?></option>
																    	<?php } ?>
																	</optgroup>	
																	<optgroup label="Tính cách">
																	    <?php foreach($characters as $c) {?>
																    		<option value="<?php echo $c['evencode']; ?>"><?php echo $c['content']; ?></option>
																    	<?php } ?>
																	</optgroup>
																	<optgroup label="Mong muốn của phụ huynh">
																	    <?php foreach($desire as $d) {?>
																    		<option value="<?php echo $d['evencode']; ?>"><?php echo $d['content']; ?></option>
																    	<?php } ?>
																	</optgroup>									
																</select>
															</div>
															<div class="form-group">
															    <label for="con2">Chọn điều kiện thứ hai:</label>
															    <select class="form-control" id="con2" name="con2">
																    <optgroup label="Độ tuổi">
																	    <?php foreach($age as $a) {?>
																    		<option value="<?php echo $a['evencode']; ?>"><?php echo $a['content']; ?></option>
																    	<?php } ?>
																	</optgroup>
															    	<optgroup label="Giới tính">
																	    <?php foreach($sex as $s) {?>
																    		<option value="<?php echo $s['evencode']; ?>"><?php echo $s['content']; ?></option>
																    	<?php } ?>
																	</optgroup>	
																	<optgroup label="Tính cách">
																	    <?php foreach($characters as $c) {?>
																    		<option value="<?php echo $c['evencode']; ?>"><?php echo $c['content']; ?></option>
																    	<?php } ?>
																	</optgroup>
																	<optgroup label="Mong muốn của phụ huynh">
																	    <?php foreach($desire as $d) {?>
																    		<option value="<?php echo $d['evencode']; ?>"><?php echo $d['content']; ?></option>
																    	<?php } ?>
																	</optgroup>									
																</select>
															</div>
															<div class="form-group">
															    <label for="con3">Chọn điều kiện thứ ba:</label>
															    <select class="form-control" id="con3" name="con3">
																    <optgroup label="Độ tuổi">
																	    <?php foreach($age as $a) {?>
																    		<option value="<?php echo $a['evencode']; ?>"><?php echo $a['content']; ?></option>
																    	<?php } ?>
																	</optgroup>
															    	<optgroup label="Giới tính">
																	    <?php foreach($sex as $s) {?>
																    		<option value="<?php echo $s['evencode']; ?>"><?php echo $s['content']; ?></option>
																    	<?php } ?>
																	</optgroup>	
																	<optgroup label="Tính cách">
																	    <?php foreach($characters as $c) {?>
																    		<option value="<?php echo $c['evencode']; ?>"><?php echo $c['content']; ?></option>
																    	<?php } ?>
																	</optgroup>
																	<optgroup label="Mong muốn của phụ huynh">
																	    <?php foreach($desire as $d) {?>
																    		<option value="<?php echo $d['evencode']; ?>"><?php echo $d['content']; ?></option>
																    	<?php } ?>
																	</optgroup>									
																</select>
															</div>
															<button type="submit" name="add3R" value="Thêm" class="btn btn-primary" id="check3">Thêm</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /Thêm luật 3 điều kiện -->
								</div>
							</div>
							<!-- /Luật 3 điều kiện -->
							<!-- Luật 4 điều kiện -->
							<div class="tab-pane fade" id="4dk">
								<div class="panel panel-default ">
									<div class="panel-heading" id="accordion">
										Luật 4 điều kiện
									</div>

									<div class="panel-body">
										<table id="table4" class="table table-striped table-bordered">
											<thead>
												<tr>
													<th style="width: 50px;">STT</th>
													<th style="width: 200px;">Điều kiện</th>
													<th>Kết quả</th>
													<th style="width: 150px;">Chuyên gia</th>
													<th style="width: 50px;"></th>
													<th style="width: 50px;"></th>
												</tr>
											</thead>
											<tbody>
												<?php   
												$i = 0;
												foreach ($dk4 as $d4) {
												?>
												<tr style="height: 150px;">
													<td><?php echo $i+1; ?></td>
													<td><?php echo $ev4[$i]['event']; ?></td>
													<td style="overflow: auto;">
														<?php foreach ($b4[$i]['books'] as $b) {
													 		echo $b['title'];
													 		echo "<br/>";
													 	} ?>
													</td>
													<td><?php echo $d4['name_pro']; ?></td>
													<td><button type="button" class="btn btn-primary" onclick="editRule(<?php echo $d4['idcondition'];?>, '<?php echo $ev4[$i]['event'];?>')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Sửa</button></td>
													<td><button class="btn btn-warning" onclick="delRule(<?php echo $d4["idcondition"];?>)"><i class="fa fa-ban" aria-hidden="true"></i>   Xóa</button></td>
												</tr>
												<?php $i++; } ?>
											</tbody>
										</table>
									</div>
									<!-- Thêm luật 4 điều kiện -->
									<div class="panel panel-footer">
										<button class="btn btn-primary" data-toggle="modal" data-target="#m4" >Thêm</button>
										<div id="m4" class="modal fade" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Thêm luật 4 điều kiện</h4>
													</div>
													<div class="modal-body">
														<form action="?c=manage&a=add4Dk" method="post">
															<div class="form-group">
															    <label for="con1">Chọn độ tuổi:</label>
															    <select class="form-control" id="con1" name="con1">
																	    <?php foreach($age as $a) {?>
																    		<option value="<?php echo $a['evencode']; ?>"><?php echo $a['content']; ?></option>
																    	<?php } ?>
																</select>
															</div>
															<div class="form-group">
															    <label for="con2">Chọn giới tính:</label>
															    <select class="form-control" id="con2" name="con2">
																	    <?php foreach($sex as $s) {?>
																    		<option value="<?php echo $s['evencode']; ?>"><?php echo $s['content']; ?></option>
																    	<?php } ?>
																</select>
															</div>
															<div class="form-group">
															    <label for="con3">Chọn độ tuổi:</label>
															    <select class="form-control" id="con3" name="con3">
																	    <?php foreach($characters as $c) {?>
																    		<option value="<?php echo $c['evencode']; ?>"><?php echo $c['content']; ?></option>
																    	<?php } ?>
																</select>
															</div>
															<div class="form-group">
															    <label for="con4">Chọn độ tuổi:</label>
															    <select class="form-control" id="con4" name="con4">
																	    <?php foreach($desire as $d) {?>
																    		<option value="<?php echo $d['evencode']; ?>"><?php echo $d['content']; ?></option>
																    	<?php } ?>							
																</select>
															</div>
															<button type="submit" name="add4R" value="Thêm" class="btn btn-primary" id="check4">Thêm</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /Thêm luật 4 điều kiện -->
								</div>
							</div>
							<!-- /Luật 4 điều kiện -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Content -->


	<script type="text/javascript" src="public/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- Datatables -->
    <script src="public/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="public/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="public/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="public/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="public/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="public/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="public/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="public/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="public/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="public/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="public/vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="public/vendor/datatables.net-scroller/js/datatables.scroller.min.js"></script>

     <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#table1').DataTable();

		$('#table2').DataTable();

		$('#table3').DataTable();

		$('#table4').DataTable();

        $('#datatable-keytable').DataTable({
          	keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          	ajax: "js/datatables/json/scroller-demo.json",
          	deferRender: true,
          	scrollY: 380,
          	scrollCollapse: true,
          	scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          	fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          	'order': [[ 1, 'asc' ]],
          	'columnDefs': [
            	{ orderable: false, targets: [0] }
          	]
        });
        $datatable.on('draw.dt', function() {
          	$('input').iCheck({
            	checkboxClass: 'icheckbox_flat-green'
          	});
        });

        	TableManageButtons.init();
      	});
    </script>
    <!-- /Datatables -->
    <script type="text/javascript">
    	function editRule(idcondition, content){
    		window.location.href = "/cstt/index.php?c=manage&a=editRule&idcondition=" + idcondition +"&content=" + content;
    	}

    	function delRule(idcondition){
    		window.location.href = "/cstt/index.php?c=manage&a=delRule&idcondition=" + idcondition;
    	}
    </script>
</body>
</html>
