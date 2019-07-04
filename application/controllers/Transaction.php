<?php

    class Transaction extends CI_Controller{



        public function index(){
            $role = $this->session->userdata('role');

            if ($role != "1") $this->showMessage("Please login as Admin.", site_url("User"));

            $this->load_main_view();

        }



        public function load_main_view(){

            $header_data['title'] = "Transaction";



            $column_names = 'transaction_id, amount, month, date, student_id';

            $data['transactionData'] = $this->get_transaction_data($column_names);



            // get the student name for each transaction

            foreach($data['transactionData'] as $key =>  $row){

                $data['transactionData'][$key]['student_name'] = $this->get_student_name($row['student_id']);

            }



            $this->load->view('header', $header_data);

            $this->load->view('transaction', $data);

            $this->load->view('footer');

        }



        public function get_transaction_data($column_names){

            $table_name = "transaction";

            $transactionData = $this->get_table_data($table_name, $column_names);

            return $transactionData;

        }



        public function get_student_name($studentID){

            $this->load->model('payment_model');

            $studentName = $this->payment_model->get_student_name($studentID);

            return $studentName;

        }

        

        public function get_table_data($table_name, $column_names){

            $this->load->model('payment_model');

            $table_data = $this->payment_model->get_table_data($table_name, $column_names);

            return $table_data;

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

    }

?>