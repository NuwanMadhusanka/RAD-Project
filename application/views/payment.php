<div class="card">
    <div class="card-header">MONTHLY PAYMENT</div>
    <div class="card-body justify-content-left">
        <form method="post" name="searchForm" action="<?php echo base_url()?>index.php/Payment/search_student">
            <div class="form-row">
                    <div class="form-group col-sm-10 col-lg-10">
                        <select class="custom-select mr-sm-2" onchange="submitForm();" name="studentID" >
                            <option value="" disabled <?php if ($selectedStudent == "") echo 'selected'?> hidden>Select Student</option>
                            <?php 
                                foreach($students as $student){
                                    $selected = "";
                                    if ($selectedStudent != ""){
                                        if ($student['id'] == $selectedStudent['id']) $selected = "selected";
                                    }
                                    echo '<option value="' . $student['id'] . '"' . $selected . '>' . $student['name'] . '</option>';
                                }   
                            ?>
                        </select>
                    </div>
            </div>
            
        </form>
        <hr>
        <form  method="post" action="<?php echo base_url()?>index.php/Payment/confirm_pay">
            <fieldset <?php if ($selectedStudent == "") echo 'disabled="disabled"';?>>
                <div class="form-row">
                    <div class="form-group col-sm-8 col-lg-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">Current Month</span>
                            </div>
                            <input type="text" class="form-control col-sm-10 col-lg-10" name="currMonth" value="<?php if ($selectedStudent != "") echo $currMonth?>" readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-8 col-lg-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">Last Paid For</span>
                            </div>
                            <input type="text" class="form-control col-sm-10 col-lg-10" name="lastPaidMonth" value="<?php if ($selectedStudent != "") echo $selectedStudent['month']?>" readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-10 col-lg-10">   
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">Total Amount Payable</span>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">Rs.</span>
                            </div>
                            <input type="text" class="form-control" id="totalAmountPayable" value="<?php if ($selectedStudent != "") echo $selectedStudent['payable']?>" readonly="readonly">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-sm-8 col-lg-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">Fee</span>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">Rs.</span>
                            </div>
                            <input type="text" class="form-control" name="feeDisplay" placeholder="" value="<?php if ($selectedStudent != "") echo $selectedStudent['fee']?>" readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-10 col-lg-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Paying for next</span>
                            </div>
                            <select class="custom-select mr-sm-2" <?php if ($selectedStudent != "" && $selectedStudent['month'] == "December") echo 'disabled'?> onchange="setAmountValue(this.value,<?php echo $selectedStudent['fee'];?>);" name="numberOfMonthsPaid">
                                <?php
                                    for ($i = 1; $i <= $selectedStudent['numberOfMonthsToPay']; $i++){
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                ?>
                            </select>
                            <div class="input-group-append">
                                <span class="input-group-text">Months</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-8 col-lg-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">Amount</span>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">Rs.</span>
                            </div>
                            <input type="text" <?php if ($selectedStudent != "" && $selectedStudent['month'] == "December") echo 'disabled'?> class="form-control" id="amount" name="amount" placeholder="" value="<?php if ($selectedStudent != "" && $selectedStudent['month'] != "December") echo $selectedStudent['fee']?>" readonly="readonly">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="studentID" value="<?php if ($selectedStudent != "") echo $selectedStudent['id']?>">
                <div class="container d-flex justify-content-center">
                    <?php
                        if ($selectedStudent != "" && $selectedStudent['month'] == "December") echo '
                                <h3><span class="badge badge-success">All Payments Done!</span></h3>
                            ';
                        
                        else echo '
                                <button type="submit" class="btn btn-primary col-sm-6 col-lg-6" name="pay">SUBMIT</button>
                            ';
                    ?>
                </div>
            </fieldset>
        </form>
    </div>
</div>

