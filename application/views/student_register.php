
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
          <h1 class="boxmodel1" id="boxTitle">Registration Form</h1>

            <form class="boxmodel" action="<?php echo site_url('/Student/getDataStudent')?>" method="POST" name="myForm" onsubmit="return validateFrom()">
                <div class="form-group">
                  <label for="formGroupExampleInput">Name</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name" name="name">
                </div>

                 <div class="form-group">
                  <label for="formGroupExampleInput2">School</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="School" name="school">
                </div>

                <div class="form-group">
                  <label for="formGroupExampleInput2">Address</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Address" name="address">
                </div>

                 <div class="form-group">
                  <label for="formGroupExampleInput2">Grade</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Grade" name="grade">
                </div>

                 <div class="form-group">
                  <label for="formGroupExampleInput2">Mobile Num</label>
                  <input type="Number" class="form-control" id="formGroupExampleInput2" placeholder="Mobile Number" name="tel">
                </div>

                <div class="form-group">
                  <label for="formGroupExampleInput2">Fees</label>
                  <input type="Number" class="form-control" id="formGroupExampleInput2" placeholder="Monthly Fee" name="fee">
                </div>

                <div class="form-group">
                  <label for="formGroupExampleInput2">Email</label>
                  <input type="Emaill" class="form-control" id="formGroupExampleInput2" placeholder="Email" name="email">
                </div>
                
                <div class="form-group">
                  <label for="formGroupExampleInput2">Password</label>
                  <input type="Password" class="form-control" id="formGroupExampleInput2" placeholder="Password" required name="password">
                </div>


               <button type="submit"  class="btn btn-primary" name="submit">Submit</button>
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