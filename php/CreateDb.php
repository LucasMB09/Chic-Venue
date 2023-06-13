<?php


class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;


        // class constructor
    public function __construct(
        $dbname = "chicvenue",
        $tablename = "articulo",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // create connection
        $this->con = mysqli_connect($servername, $username, $password,$dbname);

        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }
    }

    // get product from the database
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

    public function filtrado($color,$talla,$precio){
        $sql = "SELECT * FROM $this->tablename WHERE color = '$color' AND talla = '$talla' AND precio = '$precio'";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
        else{
            $_SESSION['base'] = "No hay";
            return $this->getData();
        }
    }

    public function filtrado2($color,$talla){
        $sql = "SELECT * FROM $this->tablename WHERE color = '$color' AND talla = '$talla'";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
        else{
            $_SESSION['base'] = "No hay";
            return $this->getData();
        }
    }

    public function filtrado3($color){
        $sql = "SELECT * FROM $this->tablename WHERE color = '$color'";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
        else{
            $_SESSION['base'] = "No hay";
            return $this->getData();
        }
    }

    public function filtrado4($talla,$precio){
        $sql = "SELECT * FROM $this->tablename WHERE talla = '$talla' AND precio = '$precio'";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
        else{
            $_SESSION['base'] = "No hay";
            return $this->getData();
        }
    }

    public function filtrado5($talla){
        $sql = "SELECT * FROM $this->tablename WHERE talla = '$talla'";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
        else{
            $_SESSION['base'] = "No hay";
            return $this->getData();
        }
    }

    public function filtrado6($precio){
        if($precio == "ascendente"){
            $sql = "SELECT * FROM $this->tablename ORDER BY precio ASC";
        }
        elseif($precio == "descendente"){
            $sql = "SELECT * FROM $this->tablename ORDER BY precio DESC";
        }
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
        else{
            $_SESSION['base'] = "No hay";
            return $this->getData();
        }
    }
}






