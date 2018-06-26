<?php 
 $host = "localhost";
 $vt_ad = "ornek";
 $kul = "root";
 $sifre = "";
 try {
      $conn = new PDO("mysql:host=$host;dbname=$vt_ad", $kul, $sifre);
      $conn->exec("SET CHARACTER SET utf8");
      $conn->query("SET NAMES 'utf8'");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
     }
 catch(PDOException $e)
    {
      echo "Bağlantı Hatası: " . $e->getMessage()."<br />";
    }
 ?>
<!DOCTYPE html>
<html>
<head>
<title>İndex</title>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>  
	<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>

</head>
<body>
	<table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
    	<thead>
    	    <tr>
    	        <th>İd</th>
    	        <th>E-mail</th>
    	        <th>Telefon</th>
    	        <th>Şehir</th>
    	        <th>Tarih</th>
    	        <th>Tutar</th>
    	    </tr>
    	</thead>
        <tbody>
        	<?php
				foreach ($sorgu=$conn->query("Select * from ornek") as $listele){      
					echo '<tr class="odd gradeX">';
						echo '<td align="center">'.$listele['id'].'</td>';
						echo '<td align="center">'.$listele['email'].'</td>';
						echo '<td align="center">'.$listele['telefon'].'</td>';
						echo '<td align="center">'.$listele['sehir'].'</td>';
						echo '<td align="center">'.$listele['tarih'].'</td>';
						echo '<td align="center">'.$listele['tutar'].'</td>';
					echo '</tr>';  }
			?>
                                    
		</tbody>
	</table>
</body>
</html>
<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>