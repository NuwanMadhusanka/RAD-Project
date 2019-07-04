<?php
<<<<<<< HEAD

    class Payment extends CI_Controller{



        public function index(){

            

            $role = $this->session->userdata('role');

            if ($role != "1") $this->showMessage("Please login as Admin.", site_url("User"));

            $data['students'] = $this->get_table_data('student', 'id, name');

            $data['selectedStudent'] = "";



            $this->load_main_view($data);

        }

        

        public function get_table_data($table_name, $column_names){

            $this->load->model('payment_model');

            $table_data = $this->payment_model->get_table_data($table_name, $column_names);

            return $table_data;

        }

        

        public function load_main_view($data){



            $header_data['title'] = "Payment";



            $this->load->view('header', $header_data);

            $this->load->view('payment', $data);

            $this->load->view('footer');

        }



        public function search_student($studentID = ""){

            

            if ($studentID == "") $selectedStudentID = $this->input->post("studentID");

            else $selectedStudentID = $studentID;



            $current_month = (int)date('m');

            $data['currMonth'] = $this->get_str_month($current_month);



            $data['selectedStudent'] = "";

            $data['students'] = $this->get_table_data('student', 'id, name, month, fee');



            // get details for selected student

            foreach($data['students'] as $student){

                if ($student['id'] == $selectedStudentID){

                    

                    $student['payable'] = 0;

                    if ($current_month > $student['month']){

                        $student['payable'] = ($current_month - $student['month']) * (int)$student['fee'];

                    }



                    $student['numberOfMonthsToPay'] = 12 - $student['month'];

                    $student['month'] = $this->get_str_month($student['month']);

                    $data['selectedStudent'] = $student;

                    break;

                }

            }



            $this->load_main_view($data);

        }



        public function confirm_pay(){



            $numberOfMonthsPaid = $this->input->post("numberOfMonthsPaid");

            $lastPaidMonth = $this->get_int_month($this->input->post("lastPaidMonth"));

            $studentID = $this->input->post("studentID");

            $amount = $this->input->post("amount");

            $paidMonths = "";



            // get string of paid months, ex: "January, February" 

            for ($i=$lastPaidMonth + 1; $i <= $lastPaidMonth + $numberOfMonthsPaid; $i++){

                if ($i == $lastPaidMonth + $numberOfMonthsPaid) $paidMonths = $paidMonths . $this->get_str_month($i);

                else $paidMonths = $paidMonths . $this->get_str_month($i) . ", ";

            }



            // values for new record to transaction

            $transactionData = array(

                "amount" => $amount,

                "month" => $paidMonths,

                "student_id " => $studentID

            );

            

            $this->new_transaction($transactionData);



            $newLastPaidMonth = $lastPaidMonth + $numberOfMonthsPaid;

            $this->update_student($studentID, $newLastPaidMonth);

            

            $message = "Payment Successfull!";

            $redirectPath = base_url() . "index.php/payment";

            $this->showMessage($message, $redirectPath);



        }



        public function showMessage($message, $redirectPath){

            echo "<script 

                type='text/javascript'>

                if (!alert('$message'))

                {

                    document.location = '" . $redirectPath . "';

                }

                </script>";

                exit();

        }



        public function new_transaction($data){

            $this->insert_data("transaction", $data);

        }



        public function update_student($studentID, $newValue){

            $this->load->model('payment_model');

            $this->payment_model->update_student($studentID, $newValue);

        }



        public function insert_data($table_name, $data){

            $this->load->model('payment_model');

            $this->payment_model->insert_data($table_name, $data);

        }



        public function get_str_month($monthNumber){

            $str_months = array(

                "1"=>"January",

                "2"=>"February",

                "3"=>"March",

                "4"=>"April",

                "5"=>"May",

                "6"=>"June",

                "7"=>"July",

                "8"=>"August",

                "9"=>"September",

                "10"=>"Octomber",

                "11"=>"November",

                "12"=>"December"

            );



            return $str_months[$monthNumber];

        }

        

        public function get_int_month($monthName){

            $int_months = array(

                "January" => "1",

                "February" => "2",

                "March" => "3",

                "April" => "4",

                "May" => "5",

                "June" => "6",

                "July" => "7",

                "August" => "8",

                "September" => "9",

                "Octomber" => "10",

                "November" => "11",

                "December" => "12"

            );



            return $int_months[$monthName];

        }

    }

=======
    class Payment extends CI_Controller{

        public function index(){
            
            $data['students'] = $this->get_table_data('student', 'id, name');
            $data['selectedStudent'] = "";

            $this->load_main_view($data);
        }
        
        public function get_table_data($table_name, $column_names){
            $this->load->model('payment_model');
            $table_data = $this->payment_model->get_table_data($table_name, $column_names);
            return $table_data;
        }
        
        public function load_main_view($data){

            $header_data['title'] = "Payment";

            $this->load->view('header', $header_data);
            $this->load->view('payment', $data);
            $this->load->view('footer');
        }

        public function search_student($studentID = ""){
            
            if ($studentID == "") $selectedStudentID = $this->input->post("studentID");
            else $selectedStudentID = $studentID;

            $current_month = (int)date('m');
            $data['currMonth'] = $this->get_str_month($current_month);

            $data['selectedStudent'] = "";
            $data['students'] = $this->get_table_data('student', 'id, name, month, fee');

            // get details for selected student
            foreach($data['students'] as $student){
                if ($student['id'] == $selectedStudentID){
                    
                    $student['payable'] = 0;
                    if ($current_month > $student['month']){
                        $student['payable'] = ($current_month - $student['month']) * (int)$student['fee'];
                    }

                    $student['numberOfMonthsToPay'] = 12 - $student['month'];
                    $student['month'] = $this->get_str_month($student['month']);
                    $data['selectedStudent'] = $student;
                    break;
                }
            }

            $this->load_main_view($data);
        }

        public function confirm_pay(){

            $numberOfMonthsPaid = $this->input->post("numberOfMonthsPaid");
            $lastPaidMonth = $this->get_int_month($this->input->post("lastPaidMonth"));
            $studentID = $this->input->post("studentID");
            $amount = $this->input->post("amount");
            $paidMonths = "";

            // get string of paid months, ex: "January, February" 
            for ($i=$lastPaidMonth + 1; $i <= $lastPaidMonth + $numberOfMonthsPaid; $i++){
                if ($i == $lastPaidMonth + $numberOfMonthsPaid) $paidMonths = $paidMonths . $this->get_str_month($i);
                else $paidMonths = $paidMonths . $this->get_str_month($i) . ", ";
            }

            // values for new record to transaction
            $transactionData = array(
                "amount" => $amount,
                "month" => $paidMonths,
                "student_id " => $studentID
            );
            
            $this->new_transaction($transactionData);

            $newLastPaidMonth = $lastPaidMonth + $numberOfMonthsPaid;
            $this->update_student($studentID, $newLastPaidMonth);
            
            $message = "Payment Successfull!";
            $redirectPath = base_url() . "index.php/payment";
            $this->showMessage($message, $redirectPath);

        }

        public function showMessage($message, $redirectPath){
            echo "<script 
                type='text/javascript'>
                if (!alert('$message'))
                {
                    document.location = '" . $redirectPath . "';
                }
                </script>";
                exit();
        }

        public function new_transaction($data){
            $this->insert_data("transaction", $data);
        }

        public function update_student($studentID, $newValue){
            $this->load->model('payment_model');
            $this->payment_model->update_student($studentID, $newValue);
        }

        public function insert_data($table_name, $data){
            $this->load->model('payment_model');
            $this->payment_model->insert_data($table_name, $data);
        }

        public function get_str_month($monthNumber){
            $str_months = array(
                "1"=>"January",
                "2"=>"February",
                "3"=>"March",
                "4"=>"April",
                "5"=>"May",
                "6"=>"June",
                "7"=>"July",
                "8"=>"August",
                "9"=>"September",
                "10"=>"Octomber",
                "11"=>"November",
                "12"=>"December"
            );

            return $str_months[$monthNumber];
        }
        
        public function get_int_month($monthName){
            $int_months = array(
                "January" => "1",
                "February" => "2",
                "March" => "3",
                "April" => "4",
                "May" => "5",
                "June" => "6",
                "July" => "7",
                "August" => "8",
                "September" => "9",
                "Octomber" => "10",
                "November" => "11",
                "December" => "12"
            );

            return $int_months[$monthName];
        }
    }
>>>>>>> 830f3f483062c46e0ce4046649ead3b8d5abc91e
?>