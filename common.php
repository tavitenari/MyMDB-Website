<?php
/*
Ioane "Tavi" Tenari
3/12/16
CSE 154 AK
T.A. Courtney Dowell
HW8

-common.php-
Commonly used code for mymdb.php, search-all.php, and search-kevin.php.

*/

#Header html code used for all displayed pages. Includes the top banner.
function htmBegin(){
?>
	<!DOCTYPE html>
		<html>
			<head>
				<title>My Movie Database (MyMDb)</title>
				<meta charset="utf-8" />
				<link href="https://webster.cs.washington.edu/images/kevinbacon/favicon.png" 
					type="image/png" rel="shortcut icon" />
				<link href="bacon.css" type="text/css" rel="stylesheet" />
			</head>
			
			<body>
				<div id="frame">
					<div id="banner">
						<a href="mymdb.php">
						<img src="https://webster.cs.washington.edu/images/kevinbacon/mymdb.png"
							alt="banner logo" /></a>
						My Movie Database
					</div>
<?php
}

#Closing html code used for all displayed pages. Includes the search forms and bottom banner.
function htmEnd(){
?>
					<!-- form to search for every movie by a given actor -->
					<form action="search-all.php" method="get">
						<fieldset>
							<legend>All movies</legend>
							<div>
								<input name="firstname" type="text" 
									size="12" placeholder="first name" autofocus="autofocus" /> 
								<input name="lastname" type="text" 
									size="12" placeholder="last name" /> 
								<input type="submit" value="go" />
							</div>
						</fieldset>
					</form>

					<!-- form to search for movies where a given actor was with Kevin Bacon -->
					<form action="search-kevin.php" method="get">
						<fieldset>
							<legend>Movies with Kevin Bacon</legend>
							<div>
								<input name="firstname" type="text" 
									size="12" placeholder="first name" /> 
								<input name="lastname" type="text" 
									size="12" placeholder="last name" /> 
								<input type="submit" value="go" />
							</div>
						</fieldset>
					</form>
				</div> <!-- end of #main div -->
				
				<div id="w3c">
					<a href="https://webster.cs.washington.edu/validate-html.php">
						<img src="https://webster.cs.washington.edu/images/w3c-html.png" 
						alt="Valid HTML5" /></a>
					<a href="https://webster.cs.washington.edu/validate-css.php">
						<img src="https://webster.cs.washington.edu/images/w3c-css.png" 
						alt="Valid CSS" /></a>
				</div>
			</div> <!-- end of #frame div -->
		</body>
	</html>
<?php
}
?>