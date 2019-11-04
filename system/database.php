<?php 

require_once 'setting/setting.php';

class Database extends Settings{
    
    public function cekDatbase(){
        $conn = mysqli_connect($this->host, $this->user, $this->pass);
        if ($conn) {
            $cekDb = mysqli_select_db($conn, $this->db);
            if ($cekDb) {
                return "tersedia";
            }else{
                $queryCreateDb = mysqli_query($conn, "CREATE DATABASE ".$this->db);
                if ($queryCreateDb) {
                    return "dibuat";
                }
            }
        }else{
            return "this not connect";
        }
    }


    public function getDepartment(){
        return mysqli_connect($this->host, $this->user, $this->pass, $this->db);
    }

    public function dbquery($qr, $type=""){
        $getConnection = $this->getDepartment();
        $query = mysqli_query($getConnection, $qr);
        $box = [];
        while ($data = mysqli_fetch_object($query) ) {
            $box[] = $data;
        }
        if ($type == "count") {
            return count($box);
        }else{
            return $box;
        }
    }

    public function getColumnName($table, $row){
        $data = $this->dbquery("
            SELECT
                COLUMN_NAME as nama_kolom
            FROM
                information_schema. COLUMNS
            WHERE
                TABLE_SCHEMA = '".$this->db."'
            AND TABLE_NAME = '".$table."'
            AND ORDINAL_POSITION = ".$row."
        ");
        $nama = "";
        foreach ($data as $key => $value) {
            $nama .= $value->nama_kolom;
        }

        return $nama;
    }

    public function ArrColumnName($table){
        $data = $this->dbquery("
            SELECT
                COLUMN_NAME as nama_kolom
            FROM
                information_schema. COLUMNS
            WHERE
                TABLE_SCHEMA = '".$this->db."'
                AND TABLE_NAME = '".$table."'
        ");
        $nama = array();
        foreach ($data as $key => $value) {
            $nama[] = $value->nama_kolom;
        }

        return $nama;
    }

    public function cekColumn($table, $row){
        return $this->dbquery("
            SELECT
                COLUMN_NAME as nama_kolom
            FROM
                information_schema. COLUMNS
            WHERE
                TABLE_SCHEMA = '".$this->db."'
            AND TABLE_NAME = '".$table."'
            AND ORDINAL_POSITION = ".$row."
        ", "count");
    }

    public function cekTable($table, $tablestruktur){
        $getConnection = $this->getDepartment();
        $query = mysqli_query($getConnection, "DESCRIBE $table ");
        if ($query) {

            $aa = $this->ArrColumnName($table);
            $bb = array_keys($tablestruktur);

            if (count($aa) > count($bb)) {
                foreach ($aa as $ay => $ax) {
                    if (in_array($ax, $bb)) {
                    }else{
                        $this->query("
                            ALTER TABLE ".$table."
                            DROP COLUMN ".$ax.";
                        ");
                    }
                }
            }else{
                $no = 1;
                foreach ($tablestruktur as $key => $value) {
                    if ($this->cekColumn($table, $no) == 0) {
                        $this->query("
                            
                            ALTER TABLE ".$table."
                            ADD ".$key." ".$value.";

                        ");
                    }else{
                        if ($this->getColumnName($table, $no) != $key) {
                            $this->query("
                            
                                ALTER TABLE ".$table."
                                CHANGE COLUMN ".$this->getColumnName($table, $no)." ".$key." ".$value.";

                            ");
                        }
                    }
                    $no++;
                }
            }

            return 'tersedia';
        }else{

            $mystructure = "";

            $no = 0;
            foreach ($tablestruktur as $key => $value) {
                if ($no == 0) {
                    $mystructure .= $key.' '.$value;
                }else{
                    $mystructure .= ','.$key.' '.$value;
                }
                $no++;
            }
            $createtable = mysqli_query($getConnection, 'CREATE TABLE '.$table.' ('.$mystructure.') ');
            if ($createtable) {
                return 'dibuat';
            }else{
                return 'gagal';
            }
        }
    }


    // query data ke database
    public function query($e)
    {
        $conn = $this->getDepartment();
        $query = mysqli_query($conn, $e);
        return $query;
    }

    // ambuil data secara objek
    public function query_result_object($e)
    {
        $conn = $this->getDepartment();
        $query = mysqli_query($conn, $e);
        $box = [];
        while ($data = mysqli_fetch_object($query) ) {
            $box[] = $data;
        }
        return $box;
    }

    public function query_result_object_row($e)
    {
        $conn = $this->getDepartment();
        $query = mysqli_query($conn, $e);
        $box = [];
        while ($data = mysqli_fetch_object($query) ) {
            $box[] = $data;
        }
        return $box[0];
    }

    // ambil data secara arrray 
    public function query_result_assoc($e)
    {
        $conn = $this->getDepartment();
        $query = mysqli_query($conn, $e);
        $box = [];
        while ($data = mysqli_fetch_assoc($query) ) {
            $box[] = $data;
        }
        return $box;
    }
    // hitung total query data
    public function count_query($e)
    {
        $conn = $this->getDepartment();
        $query = mysqli_query($conn, $e);
        $box = [];
        while ($data = mysqli_fetch_object($query) ) {
            $box[] = $data;
        }
        return count($box);
    }
    // nah ini rumusnya tadi 
    public function sql_like_table($arr, $search){
        $table_row_data = "";
        $table_row_data .= "(";
        foreach ($arr as $key => $value) {
            if ($key == 0) {
                $table_row_data .= $value." LIKE '%".$search."%' ";
            }else{
                $table_row_data .= ' OR '.$value." LIKE '%".$search."%' ";
            }
        }
        $table_row_data .= ")";
        return $table_row_data;
    }

    public function sql_order_table($arr, $order){
        if ($order != "") {
            $columnName = "";
            foreach ($arr as $key => $nilaicolumn) {
                if ($key == $order[0]["column"]) {
                    $columnName = $nilaicolumn;
                }
            }
            $columnOrder = $_POST["order"][0]["dir"];
            $order = 'ORDER BY '.$columnName.' '.$columnOrder.' ';
        }else{
            $order = ' ORDER BY id DESC ';
        }

        return $order;
    }

    public function sql_save_query($table, $data_arr){
        $conn = $this->getDepartment();

        $data = "data saya ok";
        $keys = array_keys($data_arr);
        $name_of_query = "INSERT INTO ";
        $namaTable = $table;
        $data_keys = " (";
        foreach ($keys as $key => $nilai_key) {
            if ($key == 0) {
                $data_keys .= $nilai_key;
            }else{
                $data_keys .= ','.$nilai_key;
            }
        }
        $data_keys .= ")";
        $data_keys .= " VALUES ";
        $nilai_data = "(";
        for ($i=0; $i < count($data_arr); $i++) { 
            if ($i == 0) {
                $nilai_data .= '"'.$data_arr[$keys[$i]].'"';
            }else{
                $nilai_data .= ',"'.$data_arr[$keys[$i]].'"';
            }
        }
        $nilai_data .= ")";
        $nilai_query = $name_of_query.$namaTable.$data_keys.$nilai_data;
        $query = mysqli_query($conn, $nilai_query);
        return $query;
    }

    public function sql_update_query($table, $data_arr, $where){
        $conn = $this->getDepartment();

        $data = "data saya ok";
        $keys = array_keys($data_arr);
        $keys2 = array_keys($where);
        $name_of_query = "UPDATE ";
        $namaTable = $table;
        $nilai_data = " SET ";
        for ($i=0; $i < count($data_arr); $i++) { 
            if ($i == 0) {
                $nilai_data .= $keys[$i].' = "'.$data_arr[$keys[$i]].'"';
            }else{
                $nilai_data .= ', '.$keys[$i].' = "'.$data_arr[$keys[$i]].'"';
            }
        }
        $argument = " WHERE ";
        for ($y=0; $y < count($where); $y++) { 
            if ($y == 0) {
                $argument .= $keys2[$y]." = '".$where[$keys2[$y]]."' ";
            }else{
                $argument .= " AND ".$keys2[$y]." = '".$where[$keys2[$y]]."' ";
            }
        }
        $nilai_query = $name_of_query.$namaTable.$nilai_data.$argument;
        $query = mysqli_query($conn, $nilai_query);
        return $query;
    }

    public function sql_delete_query($table, $where){
        $conn = $this->getDepartment();
        $keys2 = array_keys($where);
        $argument = " WHERE ";
        for ($y=0; $y < count($where); $y++) { 
            if ($y == 0) {
                $argument .= $keys2[$y]." = '".$where[$keys2[$y]]."' ";
            }else{
                $argument .= " AND ".$keys2[$y]." = '".$where[$keys2[$y]]."' ";
            }
        }
        $delete_query = "DELETE FROM ".$table.$argument;

        $query = mysqli_query($conn, $delete_query);
        return $query;

    }
}