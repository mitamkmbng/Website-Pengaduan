<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Random_id {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function generate_random_id() {
        $id_length = 8;
        $id_number = '';
        for ($i = 0; $i < $id_length; $i++) {
            $digit = mt_rand(0, 9);
            $id_number .= $digit;
        }
        return $id_number;
    }
}