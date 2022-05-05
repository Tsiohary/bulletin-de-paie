<!DOCTYPE html>
<html>
<head>
	<title>Bulletin</title>
	<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Table/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Table/jquery.dataTables.min.css">
</head>
<body>
<div class="conrainer-fluid">
<!-- Modal Admin -->
        <div class="modal fade" id="nou" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-user-circle"></i>&nbsp;Fiche d'enrégistrement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php require_once 'bdd.php'; ?>
        <form action="bdd.php" method="post">
        <div class="modal-body">
        	<div class="form-group">
	            <input type="number" class="form-control form-control-sm" placeholder="Identification" name="id" value="<?php echo $id; ?>" readonly>
	        </div>
        	<div class="form-row">
	            <div class="form-group col-md-4">
	                <input type="text" class="form-control form-control-sm" placeholder="Mois" name="mois" value="<?php echo $mois; ?>">
	            </div>
	            <div class="form-group col-md-4">
	                <input type="date" class="form-control form-control-sm" name="du" value="<?php echo $du; ?>" min="2022-01-01" id="demo">
	            </div>
	            <div class="form-group col-md-4">
	                <input type="date" class="form-control form-control-sm" name="au" value="<?php echo $au; ?>" min="2022-01-01" id="demos">
	            </div>
           	</div>
           	<div class="form-group">
	            <input type="text" class="form-control form-control-sm" placeholder="Nom et prénom" name="nom" value="<?php echo $nom; ?>">
	        </div>
            <div class="form-row">
	            <div class="form-group col-md-4">
	                <input type="text" class="form-control form-control-sm" placeholder="Emploi" name="emploi" value="<?php echo $emploi; ?>">
	            </div>
	            <div class="form-group col-md-4">
	                <input type="number" class="form-control form-control-sm" placeholder="Salaire" name="salaire" value="<?php echo $salaire; ?>">
	            </div>
	            <div class="form-group col-md-4">
	                <input type="number" class="form-control form-control-sm" placeholder="Heure Supp" name="heure" value="<?php echo $heure; ?>">
	            </div>
           	</div>
           	<div class="form-row">
	            <div class="form-group col-md-4">
	                <input type="number" class="form-control form-control-sm" placeholder="Indemnité" name="indemnite" value="<?php echo $indemnite; ?>">
	            </div>
	            <div class="form-group col-md-4">
	                <input type="number" class="form-control form-control-sm" placeholder="CNaPS" name="cnaps" value="<?php echo $cnaps; ?>">
	            </div>
	            <div class="form-group col-md-4">
	                <input type="number" class="form-control form-control-sm" placeholder="OSTIE" name="ostie" value="<?php echo $ostie; ?>">
	            </div>
           	</div>
        </div>
        <div class="modal-footer">
         	<button type="reset" class="btn btn-outline-warning" >Réessayer</button>
         	<?php
		      if ($valide == true): 
		    ?>
		      <button type="submit" class="btn btn-outline-info" name="valide">Valider</button>
		    <?php else: ?>
		  		<button class="btn btn-outline-success" type="submit" name="save">Enrégistrer</button>
		    <?php endif ?>
            
        </div>
        </form>
        </div>
        </div>
        </div>

<h2><center>BULLETIN INDIVIDUEL DE PAYE</center></h2>
<a href="" data-toggle="modal" data-target="#nou">Nouveau</a>
<form method="post" action="excel.php">
    <button class="btn btn-outline-success" type="submit" name="excel">Exportation</button>
<br><br>
<table id="mydata">
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
            <th>CNaPS</th>
            <th>OSTIE</th>
            <th>Action</th>
        </tr>
        </thead>
    <?php
		$connexion = new PDO("mysql:host=localhost;dbname=paye", "root", "");
        $slc="SELECT * FROM bulletin ORDER BY Numero DESC";
		$result = $connexion -> query($slc);
		while ($data = $result -> fetch())
		{
	?>
    <tbody>
    <tr>
    	<td><?= $data['Numero']; ?></td>
    	<td><?= $data['Mois']; ?></td>
    	<td><?= $data['Du']; ?></td>
    	<td><?= $data['Au']; ?></td>
    	<td><?= $data['Nom']; ?></td>
    	<td><?= $data['Emploi']; ?></td>
    	<td><?= $data['Base']; ?></td>
    	<td><?= $data['Supple']; ?></td>
    	<td><?= $data['Indemnite']; ?></td>
    	<td><?= $data['cnaps']; ?></td>
    	<td><?= $data['ostie']; ?></td>
    	<td>
    		<a href="idEdit=<?=$data['Numero']?>" data-toggle="modal" data-target="#nou" onclick="return confirm('Vous avez vraiment modifier ?');"><img src="sary/Edit.png"/></a>
            <a href="bdd.php?idSup=<?=$data['Numero'] ?>" onclick="return confirm('Vous avez vraiment supprimer ?');"><img src="sary/Delete.png"/></a>
            <a href="print.php?idPrint=<?=$data['Numero']  ?>" onclick="return confirm('Vous avez vraiment imprimer ?');"><img src="sary/Download.png"/></a>
    	</td>
    </tr>
    </tbody>
    <?php 
    	}
    ?>
</table>
</div>
<!-- Mi-appel resaka animation atao ato. Ex : modal,...   -->
    <script type="text/javascript" src="bootstrap/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="bootstrap/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="bootstrap/popper.min.js"></script>

<!--DataTable -->
    <script type="text/javascript" src="Table/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="Table/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
         $("#mydata").dataTable();
    </script>
<!-- Personaliser date -->
<script>
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
        {
            month = "0" + month;
        }
        if (day < 10)
        {
            day = "0" + day;
        }
        var maxDate = year + '-' + month + '-' + day;
        document.getElementById("demo").setAttribute("max", maxDate);
        document.getElementById("demos").setAttribute("max", maxDate);
 </script>
</body>
</html>