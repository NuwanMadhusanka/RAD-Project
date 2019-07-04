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
	<title>Add payment</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

</head>
	
<body>

<style>
	body{
		background-image: url("./images/r.jpg");
	}
</style>

<div class="container">
	<h1 class="page-header text-center">Add Payment Details</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Add Form
				<span class="pull-right"><a href="<?php echo base_url(); ?>index.php/UserDriver" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<form method="POST" action="<?php echo base_url(); ?>/index.php/UserDriver/insert">
				<div class="form-group">
					<label>Title:</label>
					<input type="text" class="form-control" name="title">
				</div>
				<div class="form-group">
					<label>Amount:</label>
					<input type="text" class="form-control" name="amount">
				</div>
				<div class="form-group">
					<label>Date:</label>
					<input type="date" class="form-control" name="date">
				</div>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>
