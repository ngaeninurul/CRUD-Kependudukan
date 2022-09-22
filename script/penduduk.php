<?php

class penduduk
{
    public $nik;
    public $nama;
    public $kelamin;
    public $alamat;
    public $perkawinan;
    public $pekerjaan;
    public $kewarganegaraan;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $golongan;

    function set_all_data($koneksi, $nik, $nama, $kelamin, $alamat, $perkawinan, $pekerjaan, $kewarganegaraan, $tempat_lahir, $tanggal_lahir, $golongan)
    {
        $this->nik = mysqli_real_escape_string($koneksi, $nik);
        $this->nama = mysqli_real_escape_string($koneksi, $nama);
        $this->kelamin = mysqli_real_escape_string($koneksi, $kelamin);
        $this->alamat = mysqli_real_escape_string($koneksi, $alamat);
        $this->perkawinan = mysqli_real_escape_string($koneksi, $perkawinan);
        $this->pekerjaan = mysqli_real_escape_string($koneksi, $pekerjaan);
        $this->kewarganegaraan = mysqli_real_escape_string($koneksi, $kewarganegaraan);
        $this->tempat_lahir = mysqli_real_escape_string($koneksi, $tempat_lahir);
        $this->tanggal_lahir = mysqli_real_escape_string($koneksi, $tanggal_lahir);
        $this->golongan = mysqli_real_escape_string($koneksi, $golongan);
    }

    function get_all_data()
    {
        return [
            'nik' => $this->nik,
            'nama' => $this->nama,
            'kelamin' => $this->kelamin,
            'alamat' => $this->alamat,
            'perkawinan' => $this->perkawinan,
            'pekerjaan' => $this->pekerjaan,
            'kewarganegaraan' => $this->kewarganegaraan,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'golongan' => $this->golongan
        ];
    }

    function tambahpenduduk($koneksi)
    {
        ['nik' => $nik, 'nama' => $nama, 'kelamin' => $kelamin, 'alamat' => $alamat, 'perkawinan' => $perkawinan, 'pekerjaan' => $pekerjaan, 'kewarganegaraan' => $kewarganegaraan, 'tempat_lahir' => $tempat_lahir, 'tanggal_lahir' => $tanggal_lahir, 'golongan' => $golongan] = $this->get_all_data();

        $tambahdata = "INSERT INTO tbl_kependudukan (nik,nama,kelamin,alamat,status,pekerjaan,kewarganegaraan,tempat_lahir,tanggal_lahir,golongan) VALUES ('$nik','$nama','$kelamin','$alamat','$perkawinan','$pekerjaan','$kewarganegaraan','$tempat_lahir','$tanggal_lahir','$golongan')";
        $proses_tambah = mysqli_query($koneksi, $tambahdata);
        return $proses_tambah;
    }

    function ambildata_penduduk($koneksi)
    {
        $data_penduduk = "select * from tbl_kependudukan";
        $proses_ambil = mysqli_query($koneksi, $data_penduduk);
        return  $proses_ambil;
    }

    function editdata_penduduk($koneksi, $id)
    {
        ['nik' => $nik, 'nama' => $nama, 'kelamin' => $kelamin, 'alamat' => $alamat, 'perkawinan' => $status, 'pekerjaan' => $pekerjaan, 'kewarganegaraan' => $kewarganegaraan, 'tempat_lahir' => $tempat_lahir, 'tanggal_lahir' => $tanggal_lahir, 'golongan' => $golongan] = $this->get_all_data();

        $editdata = "UPDATE tbl_kependudukan SET nik='$nik', nama='$nama', kelamin='$kelamin', alamat='$alamat', status='$status', pekerjaan='$pekerjaan',kewarganegaraan='$kewarganegaraan',tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', golongan='$golongan' WHERE id_penduduk='$id'";
        $proses_edit = mysqli_query($koneksi, $editdata);
        return $proses_edit;
    }

    function detaildata_penduduk($koneksi, $id)
    {
        $data_penduduk = "select * from tbl_kependudukan where id_penduduk='$id'";
        $proses_ambil = mysqli_query($koneksi, $data_penduduk);
        return  $proses_ambil;
    }

    function hapus_data($koneksi, $id)
    {
        $hapus = "DELETE FROM tbl_kependudukan WHERE id_penduduk = '$id'";
        $proses_hapus = mysqli_query($koneksi, $hapus);
        return $proses_hapus;
    }
}
