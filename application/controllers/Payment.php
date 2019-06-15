<?php
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
            
            $str_months = $this->get_str_months();

            $current_month = (int)date('m');
            $data['currMonth'] = $str_months[$current_month - 1];

            $data['selectedStudent'] = "";
            $data['students'] = $this->get_table_data('student', 'id, name, month, fee');

            foreach($data['students'] as $student){
                if ($student['id'] == $selectedStudentID){
                    
                    $student['payable'] = 0;
                    if ($current_month > $student['month']){
                        $student['payable'] = ($current_month - $student['month']) * (int)$student['fee'];
                    }

                    $student['nextMonth'] = $str_months[($student['month']) % 12];
                    $student['month'] = $str_months[$student['month'] - 1];
                    
                    $data['selectedStudent'] = $student;
                    break;
                }
            }

            $this->load_main_view($data);
        }

        public function confirm_pay(){

            $currMonth = $this->input->post("currMonth");
            $lastPaidMonth = $this->input->post("lastPaidMonth");
            $studentID = $this->input->post("studentID");
            $fee = $this->input->post("fee");
            $nextMonth = $this->input->post("nextMonth");

            if ($lastPaidMonth == "December" and  $currMonth == "December"){
                pass;
            }
            else{
                $this->load->model('payment_model');
                $this->payment_model->pay_next_month($studentID);
                
                $feesData = array(
                    "amount" => $fee,
                    "month" => $nextMonth,
                    "date" => date("Y-m-d"),
                    "student_id " => $studentID
                );
                $this->insert_data("fees", $feesData);
                $this->search_student($studentID);

                echo "
                        <script type=\"text/javascript\">
                        alert(\"Hello\nHow are you?\");
                        </script>
                    ";
            }

            
        }

        public function insert_data($table_name, $data){
            $this->load->model('payment_model');
            $this->payment_model->insert_data($table_name, $data);
        }

        public function get_str_months(){
            $str_months = array(
                "0"=>"January",
                "1"=>"February",
                "2"=>"March",
                "3"=>"April",
                "4"=>"May",
                "5"=>"June",
                "6"=>"July",
                "7"=>"August",
                "8"=>"September",
                "9"=>"Octomber",
                "10"=>"November",
                "11"=>"December"
            );

            return $str_months;
        }
        
        public function get_int_months(){
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

            return $int_months;
        }
    }
?>