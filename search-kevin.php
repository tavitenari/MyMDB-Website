<?php
/*
Ioane "Tavi" Tenari
3/12/16
CSE 154 AK
T.A. Courtney Dowell
HW8

-search-kevin.php-
This page is loaded when the user submits a search in the form "Movies with Kevin Bacon".

*/

include("common.php");

$firstname = $_GET["firstname"];
$lastname = $_GET["lastname"];

$db = new PDO("mysql:dbname=imdb;host=localhost;charset=utf8", "tenarii", "PGNRHggI37");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$first = $db->quote($firstname . "%");
$last = $db->quote($lastname);

#Gets Bacon's ID.
$kev_ids = $db->query("SELECT id FROM actors WHERE first_name = 'Kevin' AND last_name = 'Bacon'");
foreach ($kev_ids as $id){
	$kid = $id["id"];
}
#Gets the actor's ID
$ids = $db->query("SELECT id FROM actors WHERE first_name LIKE $first 
						AND last_name = $last ORDER BY film_count DESC 
						LIMIT 1"); 

htmBegin();

#Checks whether the actor exists
if($ids->rowCount()){						
	foreach($ids as $id){
		$aid = $id["id"];
	}
	#Query returns all movies containing Bacon and the actor in question.
	$rows =  $db->query("SELECT name, year FROM movies JOIN roles ra ON ra.movie_id = movies.id
							JOIN actors aa ON ra.actor_id = aa.id JOIN roles rb 
							ON rb.movie_id = movies.id JOIN actors ab ON rb.actor_id = ab.id
							WHERE ra.actor_id = $aid AND rb.actor_id = $kid 
								ORDER BY movies.year DESC");
	#Checks whether the actor shares a movie with Bacon
	if($rows->rowCount()){
	#HTML which builds a table based on the sql query.
	?>
		<div class="main">
			<h1>All movies with "<?=$firstname . " " . $lastname ?>" and Kevin Bacon</h1>
			<table>
				<caption>Films with <?=$firstname . " " . $lastname ?> and Kevin Bacon</caption>
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
	#Error if actor exists but isn't in any movies with Bacon.
	else{
	?>	
		<div class="main">
		<p>
		Actor "<?=$firstname . " " . $lastname ?>" has not been in any movies with Kevin Bacon.
		</p>
	<?php
	}
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