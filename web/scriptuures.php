<?php 
// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
    // example localhost configuration URL with postgres username and a database called cs313db
    $dbUrl = "postgres://postgres@localhost:5432/scriptures";
}

$dbopts = parse_url($dbUrl);


$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');


try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
    print "<p>error: $ex->getMessage() </p>\n\n";
    die();
}
?>
  
<!DOCTYPE html>
<html lang="en">
<body>
	<h1>Scripture Resources</h1>
  <?php 
    $statement = $db->prepare("SELECT book, chapter, verse, content FROM scriptures");
		$statement->execute();
		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
			echo '<p>';
			echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
			echo $row['verse'] . '</strong>' . ' - "' . $row['content'] . '"'; // instructions say the verse needs to be in quotes
			echo '</p>';
		}
  ?>
</body>

</html>
  
