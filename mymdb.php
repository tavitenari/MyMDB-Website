<?php
/*
Ioane "Tavi" Tenari
3/12/16
CSE 154 AK
T.A. Courtney Dowell
HW8

-mymdb.php-
The front page. Most code is called from common.php. 
It shows a picture of Kevin Bacon and the search forms.

*/

include("common.php");
htmBegin();
?>

<div class="main">
	<h1>The One Degree of Kevin Bacon</h1>
	<p>Type in an actor's name to see if he/she was ever in a movie with Kevin Bacon!</p>
	<p>
	<img src="https://webster.cs.washington.edu/images/kevinbacon/kevin_bacon.jpg" 
		 alt="Kevin Bacon" />
	</p>

<?php
htmEnd();
?>