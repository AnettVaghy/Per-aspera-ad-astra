<?php
$conexiune=new mysqli("localhost", "id1638562_sistem", "sistem", "id1638562_sistem");
if(mysqli_connect_errno()){
	exit('Conectare esuata: '. mysqli_connect_error());
}

else {
	$nota1=$_POST['nota'];
	$test1=$_POST['test'];
  
	  $ip=$_SERVER['REMOTE_ADDR'];
	 $result = $conexiune->query("SELECT * FROM conectare WHERE adresa='$ip'");
    //  $result contine cod_user
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        $cod=$row['cod_user'];}
	$today=getdate();
    $data_azi=$today['mday'].'/'.$today['mon'].'/'.$today['year'];
  
 


    $cauta_test = $conexiune->query("SELECT * FROM note WHERE test='$test1' AND cod_user='$cod'");
       if ($cauta_test->num_rows == 0) {
	 //se adauga nota in tabelul note
 echo '<script language="javascript">  alert ("Nota la testul '.$test1.' este '.$nota1.'" );</script> ';

	$conexiune->query("INSERT INTO note (cod_user,nota,data,test) VALUES ('$cod','$nota1','$data_azi','$test1')"); 
        }
       else echo '<script language="JavaScript">alert("Acest test a fost dat. Nu se inregistreaza acest rezultat. Nota la testul '.$test1.' este '.$nota1.'");</script> ';
     }
echo '<script language="javascript"> self.close();</script>';
}
?>