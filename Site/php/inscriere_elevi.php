<?php 
echo '<body style="background:url(radial.jpg);">';
// conectare la server
$conexiune=new mysqli("localhost", "id1638562_sistem", "sistem", "id1638562_sistem");

// verifica conexiunea
if (mysqli_connect_errno()) {
  exit('Conectare esuata: '. mysqli_connect_error());
}
else {	echo '<font color="red" size="4" > Inscrierea se inregistreaza...<bR><BR><BR><hr> ';
	$nume1=$_POST['nume'];
	$prenume1=$_POST['prenume'];
        $clasa1=$_POST['clasa'];
        $email1=$_POST['email'];
        $username1=$_POST['username'];
        $parola1=$_POST['parola'];
        $nume_prof=$_POST['nume_profesor'];
        $prenume_prof=$_POST['prenume_profesor'];

    // executa interogarea in tabelul USERS si retine rezultatele
    $result1 = $conexiune->query("SELECT * FROM users WHERE nume = '$nume1' AND prenume='$prenume1'");

    // daca $result contine un rand
    if ($result1->num_rows > 0) {
    // echo $nume1.' '.$prenume1.' exista deja in baza de date.';
      echo '<script language="JavaScript"> alert("Elevul este deja inregistrat");</script>'; 
        echo '<script language="JavaScript">self.close();window.open("inscriere1.html");</script>';
       }
         else {
           $result2 = $conexiune->query("SELECT * FROM users WHERE username = '$username1'");

            if ($result2->num_rows > 0) {
    // echo $nume1.' '.$prenume1.' exista deja in baza de date.';
      echo '<script language="JavaScript"> alert("Username deja existent in baza de date.");</script>'; 
        echo '<script language="JavaScript">self.close();window.open("inscriere1.html");</script>';
       }
       else {

         $today=getdate();
         $data_azi=$today['mday'].$today['mon'].$today['year'].$today['hours'].$today['minutes'];

	$conexiune->query("INSERT INTO users (cod_user,nume,prenume,clasa,email,tip_user,username,parola, nume_profesor,prenume_profesor ) VALUES 
           ('$data_azi','$nume1','$prenume1','$clasa1','$email1','elev','$username1','$parola1', '$nume_prof', '$prenume_prof')"); 
    echo '<script language="JavaScript"> alert("Inscrierea se inregistreaza..");</script>'; 
   echo '<script language="JavaScript">self.close();window.open("index.html");</script>';
  }}
   echo $email;
 }

$conexiune->close();
?>