<style>
	
body {



}

table, tr {

	border: 1px solid #000000;
	padding:10px;
}
th {

	color: blue;
}
tr {

	color: green;
}
td {

	border: 1px solid grey;
	padding:10px;
}

</style>


<!DOCTYPE html>
<html>
<head>
	<title>Örnek Tablosu İçeriği</title>
</head>
<body>
	<?php

	$dsn = 'mysql:dbname=ayep;host=localhost';
	$user = 'root';
	$password = '';

	try {
		$dbh = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
		echo 'Bağlantı kurulamadı: ' . $e->getMessage();
	}

	$query='SELECT * FROM ornek';
	$sth = $dbh->prepare($query);
	$sth->execute(array());
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	$veri=$sth->fetchAll();

	?>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th>Telefon</th>
				<th>Şehir</th>
				<th>Tarih</th>
				<th>Tutar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($veri as $satir): ?>
				<tr>

					<td><?= $satir['id'] ?></td>
					<td><?= $satir['email'] ?></td>
					<td><?= $satir['telefon'] ?></td>
					<td><?= $satir['sehir'] ?></td>
					<td><?= $satir['tarih'] ?></td>
					<td><?= $satir['tutar'] ?></td>

				</tr>
			<?php endforeach; ?>


		</tbody>

		
	</table>
</body>
</html>








