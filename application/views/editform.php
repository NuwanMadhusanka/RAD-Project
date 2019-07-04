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
	<title>Edits payment</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
	<style>
	body{
		background-image: url("./images/f.jpg");
	}
	</style>
</head>
<body>


<div class="container">
	<h1 class="page-header text-center">Edits Payment Details</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Edit Form
				<span class="pull-right"><a href="<?php echo base_url();?>index.php/UserDriver" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<?php extract($user); ?>
			<form method="POST" action="<?php echo base_url(); ?>/index.php/UserDriver/update/<?php echo $main_id; ?>">
				<div class="form-group">
					<label>Title:</label>
					<input type="text" class="form-control" value="<?php echo $title; ?>" name="title">
				</div>
				<div class="form-group">
					<label>Amount:</label>
					<input type="text" class="form-control" value="<?php echo $amount; ?>" name="amount">
				</div>
				<div class="form-group">
					<label>Date:</label>
					<input type="date" class="form-control" value="<?php echo $date; ?>" name="date">
				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>