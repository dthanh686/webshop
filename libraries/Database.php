<?php 

    /**
    * 
    */
    class Database
    {
        /**
         * Khai báo biến kết nối
         * @var [type]
         */
        public $link;

        public function __construct()
        {
            $this->link = mysqli_connect("127.0.0.1","root","","quanao",3306) or die ("Errors Connect DB");
            mysqli_set_charset($this->link,"utf8");
        }

        

        /**
         * [insert description] hàm insert 
         * @param  $table
         * @param  array  $data  
         * @return integer
         */
        public function insert($table, array $data)
        {
            //code
            $sql = "INSERT INTO {$table} ";
            $columns = implode(',', array_keys($data));
            $values  = "";
            $sql .= '(' . $columns . ')';
            foreach($data as $field => $value) {
                if(is_string($value)) {
                    $values .= "'". mysqli_real_escape_string($this->link,$value) ."',";
                } else {
                    $values .= mysqli_real_escape_string($this->link,$value) . ',';
                }
            }
            $values = substr($values, 0, -1);
            $sql .= " VALUES (" . $values . ')';
            mysqli_query($this->link, $sql) or die("Lỗi  query  insert ----" .mysqli_error($this->link));
            return mysqli_insert_id($this->link);
        }

        public function update($table, array $data, array $conditions)
        {
            $sql = "UPDATE {$table}";

            $set = " SET ";

            $where = " WHERE ";

            foreach($data as $field => $value) {
                if(is_string($value)) {
                    $set .= $field .'='.'\''. mysqli_real_escape_string($this->link, xss_clean($value)) .'\',';
                } else {
                    $set .= $field .'='. mysqli_real_escape_string($this->link, xss_clean($value)) . ',';
                }
            }

            $set = substr($set, 0, -1);


            foreach($conditions as $field => $value) {
                if(is_string($value)) {
                    $where .= $field .'='.'\''. mysqli_real_escape_string($this->link, xss_clean($value)) .'\' AND ';
                } else {
                    $where .= $field .'='. mysqli_real_escape_string($this->link, xss_clean($value)) . ' AND ';
                }
            }

            $where = substr($where, 0, -5);

            $sql .= $set . $where;
            // _debug($sql);die;

            mysqli_query($this->link, $sql) or die( "Lỗi truy vấn Update -- " .mysqli_error());

            return mysqli_affected_rows($this->link);
        }

        public function countTable($table)
        {
            $sql = "SELECT id FROM  {$table}";
            $result = mysqli_query($this->link, $sql) or die("Lỗi Truy Vấn countTable----" .mysqli_error($this->link));
            $num = mysqli_num_rows($result);
            return $num;
        }


        /**
         * [delete description] hàm delete
         * @param  $table      [description]
         * @param  array  $conditions [description]
         * @return integer             [description]
         */
        public function delete ($table ,  $id )
        {
            $sql = "DELETE FROM {$table} WHERE id = $id ";

            mysqli_query($this->link,$sql) or die (" Lỗi Truy Vấn delete   --- " .mysqli_error($this->link));
            return mysqli_affected_rows($this->link);
        }

        public function fetchsql( $sql )
        {
            $result = mysqli_query($this->link,$sql) or die("Lỗi  truy vấn sql " .mysqli_error($this->link));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        } 

        public function fetchID($table , $id )
        {
            $sql = "SELECT * FROM {$table} WHERE id = $id ";
            $result = mysqli_query($this->link,$sql) or die("Lỗi  truy vấn fetchID " .mysqli_error($this->link));
            return mysqli_fetch_assoc($result);
        }

        public function fetchOne($table , $query)
        {
            $sql  = "SELECT * FROM {$table} WHERE ";
            $sql .= $query;
            $sql .= "LIMIT 1";
            $result = mysqli_query($this->link,$sql) or die("Lỗi  truy vấn fetchOne " .mysqli_error($this->link));
            return mysqli_fetch_assoc($result);
        }

        public function deletesql ($table ,  $sql )
        {
            $sql = "DELETE FROM {$table} WHERE " .$sql;
            // _debug($sql);die;
            mysqli_query($this->link,$sql) or die (" Lỗi Truy Vấn delete   --- " .mysqli_error($this->link));
            return mysqli_affected_rows($this->link);
        }

        

         public function fetchAll($table)
        {
            $sql = "SELECT * FROM {$table} WHERE 1" ;
            $result = mysqli_query($this->link,$sql) or die("Lỗi Truy Vấn fetchAll " .mysqli_error($this->link));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }

        public  function fetchJone($table,$sql ,$page = 0,$row ,$pagi = false )
        {
            
            $data = [];
            if ($pagi == true )
            {
                $total = $this->totalSql($sql);
                $sotrang = ceil($total / $row);
                $start = ($page - 1 ) * $row ;
                $sql .= " LIMIT $start,$row";
                $data = [ "page" => $sotrang];
                $result = mysqli_query($this->link,$sql) or die("Lỗi truy vấn fetchJone ---- " .mysqli_error($this->link));
            }
            else
            {
                $result = mysqli_query($this->link,$sql) or die("Lỗi truy vấn fetchJone ---- " .mysqli_error($this->link));
            }
            
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            // _debug($data);
            return $data;
        }

        public function totalSql($sql)
        {
            $result = mysqli_query($this->link  , $sql);
            $count  = mysqli_num_rows($result);
            return $count;
        }

        public function total($sql)
        {
            $result = mysqli_query($this->link  , $sql);
            $tien = mysqli_fetch_assoc($result);
            return $tien;
        }
    }
   
?>
