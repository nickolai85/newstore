<?php
namespace liw\library;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 class DBconnect{

                public $server = 'localhost';
                public $user = 'root';
                public $passwd ='';
                public $db_name ='netstore';


        public   function __construct()

        {
                   $this->dbCon = mysqli_connect($this->server, $this->user, $this->passwd, $this->db_name);
                        if(!$this->dbCon){
                        echo' Error connection to Database '.mysqli_connect_error().' Error code:'.mysqli_connect_errno();
                        exit;
                        }

        }

        public  function __destruct()
        {
                mysqli_close($this->dbCon);
        }
        
        
        public  function Execute($sql){
        

                $this->_result=mysqli_query($this->dbCon, $sql);
                
                if(!$this->_result){
                     
                    echo'Query error: '.mysqli_error($this->dbCon).' Error code: '.mysqli_errno($this->dbCon);
                    exit;
                } else{
                    
                   return  $this->_result;
                }
        }
        public  function lastId(){
                return $this->dbCon->insert_id;
         }

       public  function SELECT($query)
       {
        $set=array();
        $this->Execute($query);
        while($row=mysqli_fetch_array($this->_result)){
                $set[]=$row;
                            }
            return $set;
       }


    public  function selectDb($query){
        $set=array();
        $this->Execute($query);
        while($row=mysqli_fetch_array($this->_result)){
                $set[]=$row;
                            }
            return $set;
        }



        public function selectAll($table)
       {
            $sql='SELECT * FROM $table';
           return $this->selectDb($sql);
        }




        public function selectBy($table, $atribute='')
        {
          
            
         if (isset($atribute['fields'])) {

                 foreach ($atribute['fields'] as $key => $value) {

                    $fieldsSql[]=$value;
               
            }


            $sqlFields.=implode(" , ", $fieldsSql );
            }
            else {

             $sqlFields.=" * ";   
            }

            $sql="SELECT $sqlFields FROM $table ";



            if (isset($atribute['whereIn'])) {

                $field=key($atribute['whereIn']);


                $newArray=$atribute['whereIn'][$field];

                 foreach ($newArray as $key => $value) {


                $wherSql[]=$value;
               
            }

            $sql.=" WHERE $field IN (".implode(" , ", $wherSql ).")";

            }

            

            if (isset($atribute['where'])) {

                 foreach ($atribute['where'] as $key => $value) {

                    $wherSql[]=$key."="."'".$value."'";
               
            }

            $sql.=" WHERE ".implode(" AND ", $wherSql );
            }

            if (isset($atribute['ASC'])) {


                $sql.=" ORDER BY ".$atribute['ASC']." ASC";
            }

            if (isset($atribute['DESC'])) {


                $sql.=" ORDER BY ".$atribute['DESC']." DESC";
            }

            if (isset($atribute['GROUP'])) {

                $sql.=" GROUP BY ".$atribute['GROUP'];

            }


            if (isset($atribute['LIMIT'])) {

                $sql.=" LIMIT ".$atribute['LIMIT'];

            }

          

            return $this->selectDb($sql);
           

        }


        //get table fields
      public function tabFields ($table)
        {
            $sql1="SHOW COLUMNS FROM $table ";
            return $this->SELECT($sql1);
        }


      public function filter_input($data) 
      {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          $data = mysqli_real_escape_string($this->dbCon,$data); 
        return $data;
      }



      public function insertdb($table,$request)
         {
                        $getFields=$this->tabFields($table);
                        $Fields=array();
                       // $firstF=$rs1[0]['Field'];
                        for ($i=0; $i<count($getFields); $i++)
                        {
                        $Fields[]=$getFields[$i]['Field'];
                        }

                        foreach ($Fields as $key => $value) {

                            

                            if ($value=='created_at')  {

                                $postValue[$value]='created_at=now()';
                                
                            }
/*                            elseif ($value=='password') {
                                $postValue[$value]="password='".md5($request['password'])."'";
                              
                            }
*/
                        else{
                            if($request[$value]!=''){
                            $postValue[$value]=$value."='". $this->filter_input($request[$value]) ."'";
                            }
                            }

                        }
                        


                        $sql=" INSERT INTO $table SET ".implode(", ", $postValue );
                      
                       if ($this->execute($sql)) {
                            return $rs['error']=null;
                        } 
                        return $rs['error']=1;


        }



         
        public function updatedb($table,$request)
         {
                        $getFields=$this->tabFields($table);
                        $Fields=array();
                       // $firstF=$rs1[0]['Field'];
                        for ($i=0; $i<count($getFields); $i++)
                        {
                        $Fields[]=$getFields[$i]['Field'];
                        }

                        foreach ($Fields as $key => $value) {

                            if ($value=='updated_at') {

                                $postValue[$value]='updated_at=now()';
                                
                            }

                        else{

                            $postValue[$value]=$value."='". $this->filter_input($request[$value]) ."'";

                            }

                        }


                        $sql=" UPDATE $table SET ".implode(", ", $postValue );
                        $this->execute($sql);


         }


  }




