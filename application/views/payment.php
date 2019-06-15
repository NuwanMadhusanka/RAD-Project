<div class="card">
    <div class="card-header">MONTHLY PAYMENT</div>
    <div class="card-body justify-content-left">
        <form method="post" action="<?php echo base_url()?>index.php/Payment/search_student">
            <div class="form-row">
                    <div class="form-group col-md-10">
                        <select class="custom-select mr-sm-2" name="studentID" >
                            <option value="" disabled <?php if ($selectedStudent == "") echo 'selected'?> hidden>Select Student</option>
                            <?php 
                                foreach($students as $row){
                                    $selected = "";
                                    if ($selectedStudent != ""){
                                        if ($row['id'] == $selectedStudent['id']) $selected = "selected";
                                    }
                                    echo '<option value="' . $row['id'] . '"' . $selected . '>' . $row['name'] . '</option>';
                                }   
                            ?>
                        </select>
                    </div>
            </div>
            <button type="submit" class="btn btn-info col-md-4">SEARCH</button>
        </form>
        <hr>
        <form  method="post" action="<?php echo base_url()?>index.php/Payment/confirm_pay">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">Current Month</span>
                        </div>
                        <input type="text" class="form-control col-md-10" name="currMonth" value="<?php if ($selectedStudent != "") echo $currMonth?>" disabled>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">Last Paid Month</span>
                        </div>
                        <input type="text" class="form-control col-md-10" name="lastPaidMonth" value="<?php if ($selectedStudent != "") echo $selectedStudent['month']?>" disabled>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10">   
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">Total Amount Payable</span>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">Rs.</span>
                            </div>
                            <input type="text" class="form-control" id="totalAmountPayable" placeholder="<?php if ($selectedStudent != "") echo $selectedStudent['payable']?>" disabled>
                        </div>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Paying for</span>
                        </div>
                        <input type="text" class="form-control col-md-10" name="nextMonthDisplay" value="<?php if ($selectedStudent != "") echo $selectedStudent['nextMonth']?>" disabled>
                        <input type="hidden" name="nextMonth" value="<?php if ($selectedStudent != "") echo $selectedStudent['nextMonth']?>">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">Fee</span>
                        </div>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">Rs.</span>
                        </div>
                        <input type="text" class="form-control" name="feeDisplay" placeholder="" value="<?php if ($selectedStudent != "") echo $selectedStudent['fee']?>" disabled>
                        <input type="hidden" name="fee" value="<?php if ($selectedStudent != "") echo $selectedStudent['fee']?>">
                    </div>
                </div>
            </div>
            <input type="hidden" name="studentID" value="<?php if ($selectedStudent != "") echo $selectedStudent['id']?>">
            <div class="container d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col-md-6" name="pay">CONFIRM PAYMENT</button>
            </div>
        </form>
    </div>
</div>

