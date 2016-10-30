<?php require_once('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Wordpress migration queries</title>
</head>
<body>
<form method="post">
	<p>Enter your old and new urls and get the scripts that should run on your database</p>
	<label for="old_url">Old url</label>
	<input type="url" name="old_url" id="old_url" required placeholder="http://my-old-url.com" />
	<label for="new_url">New url</label>
	<input type="url" name="new_url" id="new_url" required placeholder="http://my-new-url.com" />
	<button type="submit">Submit</button>
</form>
<?php $queries = get_queries(); ?>
<?php foreach($queries as $query) : ?>
	<p><?php echo $query; ?>
<?php endforeach; ?>
</body>
</html>