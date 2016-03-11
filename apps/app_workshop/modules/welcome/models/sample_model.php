<?php

class sample_model extends CI_Model{
    function read_nilai($no_mahasiswa){
        $_e = 'SELECT * FROM mahasiswa WHERE no_mahasiswa = '.$no_mahasiswa.' ';
    }
}