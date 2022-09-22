<?php
// kelas Koneksi DATABASE
class database
{
    //properti yang dibuthkan
    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;
    //construc
    function __construct($a, $b, $c, $d)
    {
        $this->dbhost = $a;
        $this->dbuser = $b;
        $this->dbpass = $c;
        $this->dbname = $d;
    }
    //method koneksi mysql db
    function conn_mysql()
    {
        $konek_db = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        return  $konek_db;
    }
}