<?php
$conexiune=new mysqli("localhost", "id1638562_sistem", "sistem", "id1638562_sistem");
if(mysqli_connect_errno()){
	exit('Conectare esuata: '. mysqli_connect_error());
}
else {
echo ' <body background="black.jpg"><a href="administrator.html"><input type="submit" value="Cont administrator"></a><center><font color="white"> <h1>Conturi elevi</h1></center><h2> <ol>';


$result = $conexiune->query("SELECT * FROM users ORDER BY nume ");
 if ($result->num_rows > 0)
 {   
     while($row = $result->fetch_assoc())
      {   $cod=$row['cod_user'];
        $nume=$row['nume'];
       $prenume=$row['prenume'];
       $clasa=$row['clasa'];
       $user=$row['username'];
       $parola=$row['parola'];
       $email=$row['email'];
       $nume_profesor=$row['nume_profesor'];
       $prenume_profesor=$row['prenume_profesor'];
      
       $tip=$row['tip_user'];
      if($tip=='elev'){
       
      echo '<li>Nume: '.$nume.'<br>Prenume: '.$prenume.'<BR>Clasa: '.$clasa.'<BR>User: '.$user.'<br>Parola: '.$parola.'<BR>Email: '.$email.'<br>Nume profesor: '.$nume_profesor.'<BR>Prenume profesor: '.$prenume_profesor.'<BR><BR></li>';
     }
      }//end while
   }//end if result
 echo '</ol>';
 
}

$conexiune->close();

?>