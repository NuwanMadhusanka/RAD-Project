<?php
$role = $this->session->userdata('role');
if ($role != "1"){
    redirect('user', 'refresh');
 }
?>

<body>
  
	<div class="container-fluid">
    <div class="jumbotron" id="top">
      <a href="<?php echo site_url('User/user_logout') ?>" class="btn btn-danger" id="logout">LOGOUT</a>
      <h1>School Service</h1>
    </div>
  </div>
	
   <div class="container-fluid">
    <div class="row">
      
       <div class="col-md-3">
        <div class="list-group">
          <a href="<?php echo site_url('Student/registerStudent')?>" class="list-group-item active">Add Student</a>
          <a href="<?php echo site_url('Student')?>" class="list-group-item">Student Details</a>
          <a href="<?php echo site_url('Payment')?>" class="list-group-item">Payment</a>
          <a href="<?php echo site_url('Transaction')?>" class="list-group-item">Transaction</a>
          <a href="<?php echo site_url('UserDriver')?>" class="list-group-item">Expences</a>
        </div>
      </div>
     
       <div class="col-md-6">
       	
       	
        <div class="jumbotron">
        
          <h1>Student Details</h1>
         
          <table class="table">
          		<tr>
          			<th>ID</th>
          			<th>Name</th>
          			<th>School</th>
          			<th>Grade</th>
          			<th>Tel</th>
          			<th>Option</th>
          		</tr>
          		
          		<?php foreach($result as $val):?>
              <tr>
                <td><?= $val->id ?></td>
                <td><?= $val->name ?></td>
                <td><?= $val->school ?></td>
                <td><?= $val->grade ?></td>
                <td><?= $val->tel ?></td>
                <td>
                      <a href='<?php echo site_url('Student/getStudent/'.$val->id) ?>' class='btn btn-warning'><i class='far fa-edit' title='Edit'></i></a>
                      <a href="<?php echo site_url('Student/deleteStudent/'.$val->id) ?>" class='btn btn-danger'><i class='fas fa-trash' title='Delete'></i></a>
                </td>
              </tr> 
              <?php endforeach; ?>
          </table>
        </div>
      </div>
       <div class="col-md-3">
        <div class="jumbotron">
          
        </div>
      </div>
    </div>
  </div>
</body>
</html>

