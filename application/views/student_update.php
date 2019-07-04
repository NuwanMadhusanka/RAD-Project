
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
          <h2 class="boxmodel1" id="boxTitle">Update Student Details</h2>
         

            <form class="boxmodel" action="<?php echo site_url('/Student/updateStudent')?>" method="POST" name="myForm" onsubmit="return validateFrom()">
              <?php foreach($result as $val):?>
                <div class="form-group">
                  <label for="formGroupExampleInput">ID</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $val->id?>" name="id" readonly="readonly">
                </div>

                <div class="form-group">
                  <label for="formGroupExampleInput">Name</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $val->name?>" name="name">
                </div>

                 <div class="form-group">
                  <label for="formGroupExampleInput2">School</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" value="<?= $val->school?>" name="school">
                </div>

                <div class="form-group">
                  <label for="formGroupExampleInput2">Address</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" value="<?= $val->address?>" name="address">
                </div>

                 <div class="form-group">
                  <label for="formGroupExampleInput2">Grade</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" value="<?= $val->grade?>" name="grade">
                </div>

                 <div class="form-group">
                  <label for="formGroupExampleInput2">Mobile Num</label>
                  <input type="Number" class="form-control" id="formGroupExampleInput2" value="<?= $val->tel?>" name="tel">
                </div>

                <div class="form-group">
                  <label for="formGroupExampleInput2">Fees</label>
                  <input type="Number" class="form-control" id="formGroupExampleInput2" value="<?= $val->fee?>" name="fee">
                </div>

                <div class="form-group">
                  <label for="formGroupExampleInput2">Email</label>
                  <input type="Emaill" class="form-control" id="formGroupExampleInput2" value="<?= $val->email?>" name="email">
                </div>
                
                <div class="form-group">
                  <label for="formGroupExampleInput2">Password</label>
                  <input type="Password" class="form-control" id="formGroupExampleInput2" value="<?= $val->password?>" required name="password">
                </div>
              <?php endforeach;?>

               <button type="submit"  class="btn btn-primary" name="submit">Save</button>
            </form>
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

<?php

// public function showMessage($message, $redirectPath){

//             echo "<script 

//                 type='text/javascript'>

//                 if (!alert('$message'))

//                 {

//                     document.location = '" . $redirectPath . "';

//                 }

//                 </script>";

//                 exit();

//         }

?>