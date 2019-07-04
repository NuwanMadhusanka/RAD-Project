<?php
$role = $this->session->userdata('role');
if ($role != "1"){
    redirect('user', 'refresh');
 }
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Students details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<style>
	body{
		background-image: url("./images/r.jpg");
	}
	</style>

<!-- <div style= "background-image : url(images/d.jpg)"> -->
<body>


<div class="container">
	<h1 class="page-header text-center">Amount Details </h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<a href="<?php echo site_url('UserDriver/addnew') ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a><br><br>
			<span class="pull-right"><a href="<?php echo base_url();?>index.php/Student" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Amount</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
				</thead> 
				<tbody>
					<?php
					foreach($users as $user){
						?>
						<tr>
							<td><?php echo $user->main_id; ?></td>
							<td><?php echo $user->title; ?></td>
							<td><?php echo $user->amount; ?></td>
							<td><?php echo $user->date; ?></td>
							<td><a href="<?php echo base_url(); ?>index.php/UserDriver/edit/<?php echo $user->main_id; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a> || <a href="<?php echo base_url(); ?>index.php/UserDriver/delete/<?php echo $user->main_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</div>
</html>
