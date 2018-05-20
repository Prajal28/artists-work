<!DOCTYPE html>
<html lang="en">
  <head>
 

  
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Chapter 5</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js" ></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-tarGET="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Assign 1</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="Default.php">Home</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pages<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Part01_ArtistsDataList.php">Artist Data List (Part 1)</a></li>
              <li><a href="Part02_SingleArtist.php?id=19">Single Artist (Part 2)</a></li>
              <li><a href="Part03_SingleWork.php?id=394">Single Work (Part 3)</a></li>
              <li><a href="Part04_Search.php">Advanced Search (Part 4)</a></li>
            </ul>
          </li>
         </ul>
         <form class="navbar-form navbar-right" method="POST" action="Part04_Search.php">
            <div class="form-group">
              <p class="navbar-brand">Prajal Mishra</p>
            </div>
            <div class="form-group">
              <input name="titleName" type="text" placeholder="Search Paintings" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" value="Search">
            
            <input type="hidden" name="search" value="title">
            <input type="hidden" name="descName" value="">
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">

      <div class="starter-template">
        <h1>Artists Data List (Part 1)</h1>
        <!--<p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>-->
      
	
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				

				// Create connection
				$conn = mysql_connect($servername, $username, $password);
				mysql_select_db("art", $conn);
				// Check connection
				if (! $conn) {
				     die("Connection failed: " . mysql_error());
				}

				$sql = "SELECT ArtistID, FirstName, LastName, YearOfBirth, YearOfDeath FROM artists ORDER BY LastName";
				
				$result = mysql_query($sql);

				if (! $result) {
					die("Could not get data: ".mysql_error());
				}
								     // output data of each row
				while($row = mysql_fetch_assoc($result)) {
				   echo "<br><a href='Part02_SingleArtist.php?id=".$row["ArtistID"]."'>".$row["FirstName"]." ".$row["LastName"]." (".$row["YearOfBirth"]." - ".$row["YearOfDeath"].")</a>";    
				 } 
				 
				mysql_close();
			?>	  
	</div>	
    </div><!-- /.container -->
  </body>
</html>
