<?php
$conexiune=new mysqli("localhost", "id1638562_sistem", "sistem", "id1638562_sistem");
if(mysqli_connect_errno()){
	exit('Conectare esuata: '. mysqli_connect_error());
}
else {
echo ' <body background="black.jpg"><a href="administrator.html"><input type="submit" value="Cont administrator"></a><center><font color="white"> <h1>Istoric conectari</h1></center><h2> <ol>';
 $result = $conexiune->query("SELECT * FROM istoric_conectari  ");
 if ($result->num_rows > 0)
 {   
     while($row = $result->fetch_assoc())
      {  
       $cod=$row['cod_user'];
       $adresa=$row['adresa'];
       $data=$row['data_login'];
       $ora=$row['ora_login'];
      echo '<li>Cod user: '.$cod.'<br>Adresa: '.$adresa.'<BR>Data: '.$data.'<BR>Ora: '.$ora.'<BR><BR></li>';
     
      }//end while
   }//end if result
 
 echo '</ol>';
}

$conexiune->close();

?>