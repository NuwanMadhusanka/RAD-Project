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

        public function update_student($studentID, $newValue){
        
            $this->db->set('month', $newValue);
            $this->db->where('id', $studentID);
            $this->db->update('student');
        }

        public function get_student_name($studentID){
            $this->db->select('name');
            $query_result = $this->db->get_where('student', array('id' => $studentID));
            return $query_result->result_array()[0]['name'];
        }
    }
?>