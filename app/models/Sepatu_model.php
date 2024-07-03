<?php

class Sepatu_model{
   
    private $table = 'sepatu';
    private $db;

public function __construct ()
{
    $this->db = new Database;
}
    public function view(){
       $this->db->query("SELECT * FROM $this->table");
       return $this->db->resultSet();
    }

    public function viewOne($kode_sepatu){
        $this->db->query("SELECT * FROM $this->table WHERE kode_sepatu=:kode_sepatu");
        $this->db->bind('kode_sepatu', $kode_sepatu);
        return $this->db->single();
    }

    public function delete($kode_sepatu){
        $this->db->query("DELETE FROM sepatu WHERE `sepatu`.`kode_sepatu` = :kode_sepatu");
        $this->db->bind('kode_sepatu', $kode_sepatu);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function save($data){
        $query = "INSERT INTO `sepatu` (`kode_sepatu`, `merk_sepatu`, `warna_sepatu`, `jenis_sepatu`, `bahan_sepatu`, `deskripsi_sepatu`, `tanggal_launching_sepatu`) VALUES (null, :merk_sepatu, :warna_sepatu, :jenis_sepatu, :bahan_sepatu, :deskripsi_sepatu, :tanggal_launching_sepatu)";

      $this->db->query($query);
       $this->db->bind('merk_sepatu', $data['merk_sepatu']);
       $this->db->bind('warna_sepatu', $data['warna_sepatu']);
       $this->db->bind('jenis_sepatu', $data['jenis_sepatu']);
       $this->db->bind('bahan_sepatu', $data['bahan_sepatu']);
       $this->db->bind('deskripsi_sepatu', $data['deskripsi_sepatu']);
       $this->db->bind('tanggal_launching_sepatu', $data['tanggal_launching_sepatu']);

       $this->db->execute();
       return $this->db->rowCount();
    }
    public function update($data){
        // var_dump($data);
        // exit;
        $query = "UPDATE `sepatu` SET `merk_sepatu` = :merk_sepatu, `warna_sepatu` = :warna_sepatu, `jenis_sepatu` = :jenis_sepatu, `bahan_sepatu` = :bahan_sepatu, `deskripsi_sepatu` = :deskripsi_sepatu, `tanggal_launching_sepatu` = :tanggal_launching_sepatu WHERE `sepatu`.`kode_sepatu` = :kode_sepatu";

      $this->db->query($query);
       $this->db->bind('merk_sepatu', $data['merk_sepatu']);
       $this->db->bind('warna_sepatu', $data['warna_sepatu']);
       $this->db->bind('jenis_sepatu', $data['jenis_sepatu']);
       $this->db->bind('bahan_sepatu', $data['bahan_sepatu']);
       $this->db->bind('deskripsi_sepatu', $data['deskripsi_sepatu']);
       $this->db->bind('tanggal_launching_sepatu', $data['tanggal_launching_sepatu']);
       $this->db->bind('kode_sepatu', $data['kode_sepatu']);

       $this->db->execute();
       return $this->db->rowCount();
    }
}