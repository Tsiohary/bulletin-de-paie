<?php
$mysqli = new mysqli('localhost', 'root', '', 'paye') or die(mysqli_error($mysqli));
$mois = '';
$du = '';
$au = '';
$nom = '';
$emploi = '';
$salaire = 0;
$heure = 0;
$indemnite = 0;
$cnaps = 0;
$ostie = 0;
$valide = false;
$id = 0;
//Mampiditra valeur @ base des données
if(isset($_POST['save']))
{
	$M = $_POST['mois'];
	$D = $_POST['du'];
	$A = $_POST['au'];
	$N = $_POST['nom'];
	$E = $_POST['emploi'];
	$S = $_POST['salaire'];
	$H = $_POST['heure'];
	$I = $_POST['indemnite'];
	$R = ($S + $H + $I);
	$C = $_POST['cnaps'];
	$O = $_POST['ostie'];
	$DD = ($C + $O);
	$NET = ($R - $DD);

	$mysqli->query("INSERT INTO bulletin (Mois, Du, Au, Nom, Emploi, Base, Supple, Indemnite, Renumeration, cnaps, ostie, Deduites, Net) VALUES('$M', '$D', '$A', '$N', '$E', '$S', '$H', '$I', '$R', '$C', '$O', '$DD', '$NET')") or die($mysqli->error);
	header ("location: index.php");
}

//Mamafa zavatra @ db
if(isset($_GET['idSup']))
{
	$id = $_GET['idSup'];
	$mysqli->query("DELETE FROM bulletin WHERE Numero=$id") or 
		die($mysqli->error);
	header ("location: index.php");
}

//Efa hanova fa: mbola manao selection ilay zavatra hovaina
if(isset($_GET['idEdit']))
{
	$id = $_GET['idEdit'];
	$valide = true;
	$resul = $mysqli->query("SELECT * FROM bulletin WHERE Numero=$id") or 
		die($mysqli->error);
	if(count($resul)==1)
	{
		$row = $resul->fetch_array();
		$mois = $row['Mois'];
		$du = $row['Du'];
		$au = $row['Au'];
		$nom = $row['Nom'];
		$emploi = $row['Emploi'];
		$salaire = $row['Base'];
		$heure = $row['Supple'];
		$indemnite = $row['Indemnite'];
		$cnaps = $row['cnaps'];
		$ostie = $row['ostie'];
	}
}
?>