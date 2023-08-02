<!doctype html><html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<title>Macs R Poo</title>
	
	<style>
	.inline-80 {
		display: inline-block; 
		width: 80px;
	}
	</style>
</head>
<body>
	
	<div class="container" id="listing">
		<h3>Tous les articles</h3>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Titre</th>
					<th>Image</th>
					<th>Description</th>
					<th>Catégorie</th>
					<th>Citation</th>
				</tr>
			</thead>
			<?php foreach ($articles as $article):?>
			<tbody>
				<tr>
					<td><?= $article->nom ?></td>
					<td><?= $article->image->image ?></td>
					<td><?= $article->description ?></td>
					<td><?= $article->catégorie ?></td>
					<td><?= $article->citation ?></td>
					<td>
						<a href="#" class="btn btn-default">Edit</a> &nbsp; 
						<a href="#" class="btn btn-default">Delete</a>
					</td>
				</tr>
			</tbody>
			<?php endforeach;?>
		</table>
	</div>


    <a href="?admin=&action=addArticleForm">Ajouter un article</a>
    <a href="?action=signedUp">Blog</a>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>