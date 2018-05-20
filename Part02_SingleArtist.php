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
    function visitPage(x){
        window.location='Part03_SingleWork.php?id='+x;
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
    </nav>
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

          $sql = "SELECT ArtistID, FirstName, LastName, YearOfBirth, YearOfDeath, Details, Nationality, ArtistLink FROM artists ORDER BY LastName";
          
          $result = mysql_query($sql);

          if (! $result) {
            die("Could not get data: ".mysql_error());
          }
                       // output data of each row
          $details = "";
          if(isset($_GET["id"])){
              while($row = mysql_fetch_assoc($result)) {
                  if($row["ArtistID"] == $_GET["id"])
                  {
                  echo "<h2>".$row["FirstName"]." ".$row["LastName"]."</h2>";
                  echo "<img src='art/artists/medium/".$row["ArtistID"].".jpg' alt='Image does not exist of ".$row["FirstName"]."'";
                         
                $details = "<p>".$row["Details"]."</p>";
                $birthyear = $row["YearOfBirth"];
                $deathyear = $row["YearOfDeath"];
                $nation = $row["Nationality"];
                $link = $row["ArtistLink"];
                $firstname = $row["FirstName"];
                $lastname = $row["LastName"];
                }
           } 
          }
          else{
            header('Location: error.php');
          }
          
        ?>
      </div>
      <div class="tempdetails">
         <?php  
          echo $details;
         ?>
          <button type="button" class="btn btn-lg btn-default" aria-label="Left Align" style="color: #3366ff;">
              <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Add to Favorites List
          </button>
        <table style="max-width: 400px" class="table table-bordered">
          <tr>
            <th colspan="2" style="padding: 10px;">Artist Details</th>
          </tr>
          <tr>
            <td>
              Date:
            </td>
            <td style="border-left: none !important;">
            <?php 
              echo $birthyear." - ".$deathyear;
             ?>  
            </td>
          </tr>
          <tr>
            <td>
              Nationality: 
            </td>
            <td>
              <?php echo $nation; ?>
            </td>
          </tr>
          <tr>
            <td>
              More Info: 
            </td>
            <td>
              <?php echo "<a href='".$link."'>".$link."</a>"; ?>
            </td>
          </tr>
        </table>
        <?php echo " <br><h3> Art by ".$firstname." ".$lastname."</h3>"; ?>
        <div class="container">
        <div class="row">
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

          $sql = "SELECT ArtworkID, ArtistID, ImageFileName, Title, YearOfWork FROM artworks ORDER BY YearOfWork DESC";
          
          $result = mysql_query($sql);

          if (! $result) {
            die("Could not get data: ".mysql_error());
          }
                       // output data of each row
          
          
          if(isset($_GET["id"])){
              while($row = mysql_fetch_assoc($result)) {
                  if($row["ArtistID"] == $_GET["id"])
                  {
                  echo "          
                        <div class='col-lg-3 col-md-4 col-xs-6 thumb'>
                        
                        <div class='thumbnail'>
                        <a href='Part03_SingleWork.php?id=".$row["ArtworkID"]."'>
                            <img class='img-responsive' src='art/works/square-medium/".$row["ImageFileName"].".jpg' alt='' style='float: none;'>
                        </a>
                        <div class='caption'>
                        <p style='text-align: center;'><a href='Part03_SingleWork.php?id=".$row["ArtworkID"]."'>".$row["Title"].", ".$row["YearOfWork"]."</a></p>
                        <p style='text-align: center;'>
                          <button onclick='visitPage(".$row["ArtworkID"].");' type='button' class='btn btn-primary'>
                            <span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span> View
                          </button>

                          <button type='button' class='btn btn-success'>
                            <span class='glyphicon glyphicon-gift' aria-hidden='true'></span> Wish
                          </button>

                          <button type='button' class='btn btn-info'>
                            <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Cart
                          </button>
                      </p>
                        </div>
                        </div>
                    </div>

                  " ;   
                  
                           
                  }
                }
              }
        ?>
         
        </div>
            </div>
      </div>
    </div>
</body>
</html>