<?php
echo '<body style="background:url(radial.jpg);">';
$conexiune=new mysqli("localhost", "id1638562_sistem", "sistem", "id1638562_sistem");
if(mysqli_connect_errno()){
	exit('Conectare esuata: '. mysqli_connect_error());
}

else {
	$nume1=$_POST['nume'];
	$prenume1=$_POST['prenume'];
	$email1=$_POST['email'];
	$mesaj1=$_POST['mesaj'];
	$today=getdate();
        $data=$today['mday'].'/'.$today['mon'].'/'.$today['year'];
        $ora=$today['hours'].':'.$today['minutes'].':'.$today['seconds'];
	$rezultat=$conexiune->query("INSERT INTO contact (nume, prenume, email, mesaj, Data,ora) VALUES ('$nume1', '$prenume1', '$email1', '$mesaj1', '$data','$ora')");

	

}
$conexiune->close();
	echo '
<script language="javascript">
self.close();
window.open("contact.html");
</script>';
?>