<?php
    class Payment_model extends CI_Model{

        public function get_table_data($table, $columns){
            $this->db->select($columns);
            $query_result = $this->db->get($table);
            return $query_result->result_array();
        }

        public function insert_data($table_name, $data){
            $this->db->insert($table_name, $data);
        }

        public function pay_next_month($studentID){
            $this->db->select('month');
            $result = $this->db->get_where('student', array('id' => $studentID));
            $resultArray = $result->result_array();
            $lastMonth = "";
            foreach ($resultArray as $element){
                foreach ($element as $element2){
                    $lastMonth = $element2;
                }
            }

            $newValue = 0;
            if ($lastMonth + 1 == 13) $newValue = 1;
            else $newValue = $lastMonth + 1;

            $this->db->set('month', $newValue);
            $this->db->where('id', $studentID);
            $this->db->update('student');
        }
    }
?>