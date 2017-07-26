<?php


echo '<body style="background:url(black.jpg);"> <font color="white"> ';
    $user=$_POST['username'];
	$pass=$_POST['parola'];
    $tip_user1=$_POST['tip'];

//inscriere
if(isset($_POST['inscriere']))
{echo '<script language="javascript"> window.open("inscriere1.html"); </script> ';
}

if(isset($_POST['conectare']))
{
// conectare la server
$conexiune=new mysqli("localhost", "id1638562_sistem", "sistem", "id1638562_sistem");

// verifica conexiunea
if (mysqli_connect_errno()) {
  exit('Conectare esuata: '. mysqli_connect_error());
}
else
{
if($tip_user1=='administrator')
{
   $ip3=$_SERVER['REMOTE_ADDR'];
	 $sterge3 = $conexiune->query("DELETE FROM conectare WHERE adresa='$ip3'"); 
 // executa interogarea in tabelul USERS si retine rezultatele pentru administrator
 $result = $conexiune->query("SELECT * FROM users WHERE username = '$user' AND parola='$pass' AND tip_user='$tip_user1'");

    // daca $result contine un rand
    if ($result->num_rows > 0)
 {   
      
     while($row = $result->fetch_assoc())
      {  
       $cod=$row['cod_user'];
       $ip=$_SERVER['REMOTE_ADDR'];
       // se adauga inregistrarea conectarii in tabelul "conectare". Aceasta inregistrare se va sterge dupa Log Out
	   $conect=$conexiune->query("INSERT INTO conectare (cod_user, adresa) VALUES ('$cod', '$ip')");
       
	   // se adauga inregistrarea conectarii in tabelul "istoric_conectari"
	   $today=getdate();
       $data_azi=$today['mday'].'/'.$today['mon'].'/'.$today['year'];
	   $ora_acum=$today['hours'].':'.$today['minutes'].':'.$today['seconds'];
	   $conect2=$conexiune->query("INSERT INTO istoric_conectari (cod_user, adresa,data_login,ora_login) VALUES ('$cod', '$ip','$data_azi','$ora_acum')");
   }
   echo ' <script language="JavaScript">self.close(); window.open("administrator.html"); </script>';
 }
else {	
	echo '<script language="JavaScript">alert("Nu exista acest administrator"); self.close();window.open("index.html");</script>';
    }  	
}
else
if($tip_user1=='elev')
{
   $ip=$_SERVER['REMOTE_ADDR'];
	 $sterge = $conexiune->query("DELETE FROM conectare WHERE adresa='$ip'"); 
 // executa interogarea in tabelul USERS si retine rezultatele pentru elev
 $result = $conexiune->query("SELECT * FROM users WHERE username = '$user' AND parola='$pass' AND tip_user='$tip_user1'");

    // daca $result contine un rand
    if ($result->num_rows > 0)
 {   
      
     while($row = $result->fetch_assoc())
      {  
       $cod=$row['cod_user'];
       $ip=$_SERVER['REMOTE_ADDR'];
       // se adauga inregistrarea conectarii in tabelul "conectare". Aceasta inregistrare se va sterge dupa Log Out
	   $conect=$conexiune->query("INSERT INTO conectare (cod_user, adresa) VALUES ('$cod', '$ip')");
       
	   // se adauga inregistrarea conectarii in tabelul "istoric_conectari"
	   $today=getdate();
       $data_azi=$today['mday'].'/'.$today['mon'].'/'.$today['year'];
	   $ora_acum=$today['hours'].':'.$today['minutes'].':'.$today['seconds'];
	   $conect2=$conexiune->query("INSERT INTO istoric_conectari (cod_user, adresa,data_login,ora_login) VALUES ('$cod', '$ip','$data_azi','$ora_acum')");
   }
echo ' <script language="JavaScript">self.close(); window.open("index1.html"); </script>';

 }
else {	
	echo '<script language="JavaScript">alert("Nu exista acest elev"); self.close();window.open("index.html");</script>';
    }

}
else 
  if($tip_user1=='profesor'){
    $ip2=$_SERVER['REMOTE_ADDR']; 
    $sterge2 = $conexiune->query("DELETE FROM conectare WHERE adresa='$ip2'"); 
    echo '<b>Cont profesor</b><br>';
 // executa interogarea in tabelul USERS si retine rezultatele pentru profesor
   $result = $conexiune->query("SELECT * FROM users WHERE username = '$user' AND parola='$pass' AND 
    tip_user='$tip_user1'");

    // daca $result contine un rand
    if ($result->num_rows > 0)
   {
     // afiseaza datele pentru fiecare rand din $result
      while($row = $result->fetch_assoc())
      {
       $cod=$row['cod_user'];
       $ip=$_SERVER['REMOTE_ADDR'];
       // se adauga inregistrarea conectarii in tabelul "conectare". Aceasta inregistrare se va sterge dupa Log Out
	   $conect=$conexiune->query("INSERT INTO conectare (cod_user, adresa) VALUES ('$cod', '$ip2')");
       // se adauga inregistrarea conectarii in tabelul "istoric_conectari"
	   $today=getdate();
           $data_azi=$today['mday'].'/'.$today['mon'].'/'.$today['year'];
	   $ora_acum=$today['hours'].':'.$today['minutes'].':'.$today['seconds'];
	   $conect2=$conexiune->query("INSERT INTO istoric_conectari (cod_user, adresa,data_login,ora_login) VALUES ('$cod', '$ip','$data_azi','$ora_acum')");
 echo'<a href="index1.html"><input type="submit" action="index1.html" value="Acces la site"></input></a href>';
      echo '<br> <BR>NUME: '. $row['nume']. '<BR>PRENUME: '. $row['prenume'].' <BR> ';
	 $lastname=$row['nume'];  
         $firstname=$row['prenume'];
       
	 echo '<BR><BR><B>Situatia elevilor si notelor</B><BR>'; 
         $result2 = $conexiune->query("SELECT * FROM users WHERE nume_profesor = '$lastname' AND prenume_profesor='$firstname' ");
      if ($result2->num_rows > 0)
        { 
       while($row = $result2->fetch_assoc())
        { 
        echo '<b><br><BR> NUME: '. $row['nume']. '  PRENUME: '. $row['prenume'].'  clasa '.$row['clasa'].'<br></b>';
          //  $nume_elev=$row['nume'];
           // $prenume_elev=$row['prenume'];
            $cod=$row['cod_user']; 
             $result3 = $conexiune->query("SELECT * FROM note WHERE cod_user = '$cod' ");
          if ($result3->num_rows > 0)
        { 
       while($row = $result3->fetch_assoc())
        {
            echo '<br> NOTA: '. $row['nota']. '  TEST: '. $row['test'].'  DATA '.$row['data'];           
         }//end while row->3
        }//end if result3
        } //end while row 2       
      } // end if result2
   } // end while result
 } // end if result
else {	
	echo 'Nu exista acest profesor';
    }
}
} 
}

?>