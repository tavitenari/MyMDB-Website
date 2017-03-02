<?php
/*
Ioane "Tavi" Tenari
3/12/16
CSE 154 AK
T.A. Courtney Dowell
HW8

-search-all.php-
This page is loaded when the user submits a search in the form "All movies".

*/

include("common.php");

$firstname = $_GET["firstname"];
$lastname = $_GET["lastname"];

$db = new PDO("mysql:dbname=imdb;host=localhost;charset=utf8", "tenarii", "PGNRHggI37");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$first = $db->quote($firstname . "%");
$last = $db->quote($lastname);

#Gets the actor's ID.
$ids = $db->query("SELECT id FROM actors WHERE first_name LIKE $first 
						AND last_name = $last ORDER BY film_count DESC 
						LIMIT 1"); 

htmBegin();

#Checks whether actor exists
if($ids->rowCount()){
	
	foreach($ids as $id){
		$aid = $id["id"];
	}					
	#Query returns all movies from the actor in question.
	$rows = $db->query("SELECT name, year FROM movies JOIN roles ON roles.movie_id
							= movies.id JOIN actors ON actors.id = roles.actor_id 
							WHERE roles.actor_id = $aid ORDER BY movies.year 
							DESC");
	#HTML which builds a table based on the sql query
	?>
		<div class="main">
			<h1>All movies with "<?=$firstname . " " . $lastname ?>"</h1>
			<table>
			<caption>All Films</caption>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Year</th>
				</tr>
				<?php
				$num = 1;
				foreach($rows as $row){
				?>
					<tr>
						<td><?=$num ?></td>
						<td><?=$row["name"] ?></td>
						<td><?=$row["year"] ?></td>
					</tr>
				<?php
				$num++;
				}
				?>
			</table>
	<?php
}
#Error if actor doesn't exist.
else{
?>	
	<div class="main">
		<p>Actor "<?=$firstname . " " . $lastname ?>" not found.</p>
<?php
}
htmEnd();
?>