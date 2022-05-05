<?php
$mysqli = mysqli_connect("localhost", "root", "", "paye");
$sortie ='';

if(isset($_POST['excel']))
{
	$sql = "SELECT * FROM bulletin";
	$result = mysqli_query($mysqli, $sql);
	if (mysqli_num_rows($result) > 0) 
	{
		$sortie.='
				<table class="table" bordered="1">
			    <thead>
			        <tr>
			            <th>N°</th>
			            <th>Mois de</th>
			            <th>Du</th>
			            <th>Au</th>
			            <th>Nom</th>
			            <th>Emploi</th>
			            <th>Salaire de base</th>
			            <th>Heure supp</th>
			            <th>Indemnités</th>
			            <th>Rénumération</th>
			            <th>CNaPS</th>
			            <th>OSTIE</th>
			            <th>Déduites</th>
			            <th>Net à payer</th>
			        </tr>
		';
		while ($data = mysqli_fetch_array($result)) 
		{
			$sortie.='
				<tr>
			    	<td>'.$data["Numero"].'</td>
			    	<td>'.$data["Mois"].'</td>
			    	<td>'.$data["Du"].'</td>
			    	<td>'.$data["Au"].'</td>
			    	<td>'.$data["Nom"].'</td>
			    	<td>'.$data["Emploi"].'</td>
			    	<td>'.$data["Base"].'</td>
			    	<td>'.$data["Supple"].'</td>
			    	<td>'.$data["Indemnite"].'</td>
			    	<td>'.$data["Renumeration"].'</td>
			    	<td>'.$data["cnaps"].'</td>
			    	<td>'.$data["ostie"].'</td>
			    	<td>'.$data["Deduites"].'</td>
			    	<td>'.$data["Net"].'</td>
			    </tr>
			';
		}
		$sortie.='</table>';
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=Rapport.xls");
		echo $sortie;
	}
}
?>