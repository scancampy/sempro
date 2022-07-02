<?php 
class Student_model extends CI_Model {

        public $id;
        public $username;
        public $name;

        public function update($csv) {
                while (($row = fgetcsv($handle, 10000, ",")) != FALSE) //get row vales
                {
                        // cek fileny betul atau tidak
                    print_r($row); //rows in array

                   //here you can manipulate the values by accessing the array


                }
        }

}

?>