<?php
    
    session_start();
    require 'config.php';
   
    

    function getUsersdetails($id)
    {
        $q = sql_query("SELECT * FROM 'registereduser' WHERE 'userid'=".$id);


        while($row = $result->fetch_assoc($q))
        {
            $array['userid']=$row['userid'];

            $array['fname']= $row["fname"];
            $array['lname']=$row['lname'];
            $array['unic']=$row["unic"];
            $array['uaddress']=$row["uaddress"];
            $array['udistrict']= $row["udistrict"];
            $array['uemail']=$row["uemail"];
            $array['tpnumber']=$row["tpnumber"];
            $array['gender']=$row["gender"];
            $array['uage']=$row["uage"];
            $array['dob']= $row["dob"];

        }
        return $array;
    }


    function getId($email)
    {
        $q= sql_querysql_query("SELECT 'userid' FROM 'registereduser' WHERE 'uemail'=".$email)
        while($row = $result->fetch_assoc($q))
        {
            return $row['userid'];
        }
    }

?>