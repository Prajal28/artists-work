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

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <link href="css/jumbotron.css" rel="stylesheet">

    
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js" ></script>
   <script>
    function visitPage(){
        window.location='Part03_SingleWork.php';
    }
</script>
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
    </nav>  <div style="float: right; margin-right: 500px; position: relative; z-index: 10;margin-top: 100px; width: 7%; text-align: center;">
      <table class="table" style="border-color: #69b2f0;  color: #204d74">
        <tr>
          <th style="text-align: center; background-color: #69b2f0;">Sales</th>
        </tr>
        <tr>
          <td><a href="#">7/17/13</a></td>
        </tr>
        <tr>
          <td><a href="#">7/28/13</a></td>
        </tr>
        <tr>
          <td><a href="#">8/31/13</a></td>
        </tr>
        <tr>
          <td><a href="#">10/17/13</a></td>
        </tr>
        <tr>
          <td><a href="#">10/23/13</a></td>
        </tr>
      </table>
    </div>

    <!-- Pure body of artist -->
    <div class="container">
      <div class="tempStyle">
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

          $sql = "SELECT Title, ArtworkID, Artists.ArtistID, FirstName, ImageFileName, LastName, YearOfWork, Width, Height, Medium, OriginalHome, MSRP, Description FROM artworks JOIN artists ON artworks.ArtistID = artists.ArtistID";
          
          $result = mysql_query($sql);

          if (! $result) {
            die("Could not get data: ".mysql_error());
          }
                       // output data of each row
          $details = "";
          if(isset($_GET["id"])){
              while($row = mysql_fetch_assoc($result)) {
                  if($row["ArtworkID"] == $_GET["id"])
                  {
                  echo "<h2>".$row["Title"]."</h2>";
                  echo "<h5> By <a href='Part02_SingleArtist.php?id=".$row["ArtistID"]."'>".$row["FirstName"]." ".$row["LastName"]."</a></h5>";
                  echo "<a  href='#' data-toggle='modal' data-target='#myModal'><img src='art/works/medium/".$row["ImageFileName"].".jpg'></a>";
                         
                $details = "<p>".$row["Description"]."</p>";
                $yearWork = $row["YearOfWork"];
                $width = $row["Width"];
                $height = $row["Height"];
                $medium = $row ["Medium"];
                $home = $row["OriginalHome"];
                $price = $row ["MSRP"];
                $title = $row["Title"];
                $firstname = $row["FirstName"];
                $lastname = $row["LastName"];
                $filename = $row["ImageFileName"];
                }
           } 
          }
          else{
            header('Location: error.php');
          }
          
        ?>
      </div>
      <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <?php  echo "<h4 class='modal-title'>".$title." (".$yearWork.") by ".$firstname." ".$lastname."</h4>"?>
      </div>
      <div class="modal-body">
        <?php echo " <img width='100%' height='100%' src='art/works/medium/".$filename.".jpg'>"?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
      <div class="tempdetails">
         <?php  
          echo $details;
          echo "<h3>$".number_format((float)$price,2,'.','')."</h3>";
          
         ?>
          <button type="button" class="btn btn-lg btn-default" aria-label="Left Align" style="color: #3366ff;">
              <span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Add to Wish List
          </button>

          <button type="button" class="btn btn-lg btn-default" aria-label="Left Align" style="color: #3366ff;">
              <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Shopping Cart
          </button>
        <table style="max-width: 400px" class="table table-bordered">
          <tr>
            <th colspan="2" style="padding: 10px;">Product Details</th>
          </tr>
          <tr>
            <td>
              Date:
            </td>
            <td style="border-left: none !important;">
            <?php 
              echo $yearWork;
             ?>  
            </td>
          </tr>
          <tr>
            <td>
              Medium: 
            </td>
            <td>
              <?php echo $medium; ?>
            </td>
          </tr>
          <tr>
            <td>
              Dimensions: 
            </td>
            <td>
              <?php echo $width."cm X ".$height."cm"; ?>
            </td>
          </tr>
          <tr>
            <td>
              Home: 
            </td>
            <td>
              <?php echo $home; ?>
            </td>
          </tr>
          <tr>
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

          $sql = "SELECT artworkgenres.GenreID, ArtworkID, GenreName FROM artworkgenres JOIN genres ON artworkgenres.GenreID = genres.GenreID";
          
          $result = mysql_query($sql);

          if (! $result) {
            die("Could not get data: ".mysql_error());
          }
                       // output data of each row
          $genres = array();
          
          if(isset($_GET["id"])){
              while($row = mysql_fetch_assoc($result)) {
                  if($row["ArtworkID"] == $_GET["id"])
                  {
                   $genres[] = $row["GenreName"];
                    $genres = array_reverse($genres);     
                }
           } 
          }
          
          $sql = "SELECT artworksubjects.SubjectID, ArtworkID, SubjectName FROM artworksubjects JOIN subjects ON artworksubjects.SubjectID = subjects.SubjectID ORDER BY ArtworkID";
          
          $result = mysql_query($sql);

          if (! $result) {
            die("Could not get data: ".mysql_error());
          }
                       // output data of each row
          $subjects = array();
          
          if(isset($_GET["id"])){
              while($row = mysql_fetch_assoc($result)) {
                  if($row["ArtworkID"] == $_GET["id"])
                  {
                   $subjects[] = $row["SubjectName"];
                    $subjects = array_reverse($subjects);     
                }
           } 
          }
        ?>
            <td>
              Genres: 
            </td>
            <td>
              <?php foreach($genres as $key => $value)
                    {
                    echo "<a href='#'>".$value."</a></br>";
                }?>
            </td>
          </tr>
          <tr>
            <td>
              Subjects: 
            </td>
            <td>
              <?php foreach($subjects as $key => $value)
                    {
                    echo "<a href='#'>".$value."</a></br>";
                }?>
            </td>
          </tr>

        </table>
      </div>
    </div>
  </body>
</html>
