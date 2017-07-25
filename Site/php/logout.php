<?php
$conexiune=new mysqli("localhost", "id1638562_sistem", "sistem", "id1638562_sistem");
if(mysqli_connect_errno()){
	exit('Conectare esuata: '. mysqli_connect_error());
}

else {
	 $ip=$_SERVER['REMOTE_ADDR'];
	 $sterge = $conexiune->query("DELETE FROM conectare WHERE adresa='$ip'"); 
	 echo '<script language="JavaScript">self.close(); window.open("index.html");</script>';
    }


?>