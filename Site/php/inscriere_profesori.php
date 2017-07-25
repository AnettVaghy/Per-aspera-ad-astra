<?php 
echo '<body style="background:url(radial.jpg);">';
// conectare la server
$conexiune=new mysqli("localhost", "id1638562_sistem", "sistem", "id1638562_sistem");

// verifica conexiunea
if (mysqli_connect_errno()) {
  exit('Conectare esuata: '. mysqli_connect_error());
}
else {	echo '<font color="red" size="4" > Inscrierea se inregistreaza...<bR><BR><BR><hr> ';
	$nume1=$_POST['nume2'];
	$prenume1=$_POST['prenume2'];
        $email1=$_POST['email2'];
        $username1=$_POST['username2'];
        $parola1=$_POST['parola2'];

    // executa interogarea in tabelul USERS si retine rezultatele
    $result1 = $conexiune->query("SELECT * FROM users WHERE nume = '$nume1' AND prenume='$prenume1'");

    // daca $result contine un rand
    if ($result1->num_rows > 0) {
    //  echo $nume1.' '.$prenume1.' exista deja in baza de date.';
      echo '<script language="JavaScript"> alert("Profesorul este deja inregistrat");</script>'; 
     echo '<script language="JavaScript">self.close();window.open("inscriere1.html");</script>';
       }
         else {
           $result2 = $conexiune->query("SELECT * FROM users WHERE username = '$username1'");
          if ($result2->num_rows > 0) {
      echo '<script language="JavaScript"> alert("Username deja existent in baza de date.");</script>'; 
     echo '<script language="JavaScript">self.close();window.open("inscriere1.html");</script>';
       }
       else{
         $today=getdate();
         $data_azi=$today['mday'].$today['mon'].$today['year'].$today['hours'].$today['minutes'];

	$conexiune->query("INSERT INTO users (cod_user,nume,prenume,email,tip_user,username,parola ) VALUES 
           ('$data_azi','$nume1','$prenume1','$email1','profesor','$username1','$parola1')"); 
      echo '<script language="JavaScript"> alert("Inscrierea se inregistreaza..");</script>'; 
      echo '<script language="JavaScript"> self.close(); window.open("index.html");</script>';
 }}
    
 }


$conexiune->close();
?>