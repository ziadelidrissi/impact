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
	
	<div class="container" id="new-entry">
		<h3>Nouvel article</h3>
		<form method="post" action="?admin=&action=addArticle">
			<div class="form-group">
				<label class="inline-80">Titre</label> &nbsp;
				<input type="text" name="titre" id="code" />
			</div>
			<div class="form-group">
				<label class="inline-80">Image</label> &nbsp;
				<input type="file" name="image" id="uom" />
			</div>
			<div class="form-group">
				<label class="inline-80">Description</label> &nbsp;
				<input type="text" id="description" name="description" />
			</div>
			<div class="form-group">
				<label class="inline-80">Catégorie</label> &nbsp;
				<input type="text" id="categorie" name="categorie" />
			</div>
			<div class="form-group">
				<label class="inline-80">Citation</label> &nbsp;
				<input type="text" id="citation" name="citation" />
			</div>
			<div class="form-group">
				<input type="submit" value="Save" class="btn btn-primary" />
			</div>
		</form>
	</div>


    <a href="?action=signedUp">Blog</a>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>