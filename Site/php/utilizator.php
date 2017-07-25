<?php
$conexiune=new mysqli("localhost", "id1638562_sistem", "sistem", "id1638562_sistem");
if(mysqli_connect_errno()){
	exit('Conectare esuata: '. mysqli_connect_error());
}
else {
  $ip=$_SERVER['REMOTE_ADDR'];
 $result = $conexiune->query("SELECT * FROM conectare WHERE adresa='$ip'");
 if ($result->num_rows > 0)
 {   
     while($row = $result->fetch_assoc())
      {  
       $cod=$row['cod_user'];
       $result1 = $conexiune->query("SELECT * FROM users WHERE cod_user='$cod'"); 
               if ($result1->num_rows > 0)
               {   
                 while($row = $result1->fetch_assoc())
                   {  
                  
                    $nume1=$row['nume'];
                    $prenume1=$row['prenume'];
                     $user1=$row['username'];
               
                  }//end while result1
               }//end if result1
      }//end while
   }//end if result
}

$conexiune->close();

?>