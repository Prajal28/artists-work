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
  <script type="text/javascript">
    $(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="title"){
            $(".text").not(".title").hide();
            $(".title").show();
        }
        if($(this).attr("value")=="desc"){
            $(".text").not(".desc").hide();
            $(".desc").show();
        }
        if($(this).attr("value")=="noFilter"){
            $(".text").not(".noFilter").hide();
           
        }
    });
});
</script>
<script type="text/javascript">
  function highlight_word( $content, $word) {
    $replace = '<mark>'. $word . '</mark>'; // create replacement
    $content = str_replace( $word, $replace, $content ); // replace content

    return $content; // return highlighted data
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
    <div class="container">
      <div class="tempStyle">
      <h1>Search Results</h1>
     
      <div class="jumbotron">


                                  <form method="POST" action="Part04_Search.php">
                                    <div class="form-group">
                                      <label><input type="radio" name="search" value="title" checked="checked"> Filter by Title:</label>
                                      <input name="titleName" style="display: block;" class="title text" type="text" />
                                    </div>
                                    <div class="form-group">
                                      <label><input type="radio" name="search" value="desc"> Filter by Description:</label>
                                      <input name="descName" class="desc text" type="text" />
                                    </div>
                                    <div class="form-group">
                                      <label><input type="radio" name="search" value="noFilter"> No filter (Show all art works)</label>
                                      <input class="noFilter text" type="text" />
                                    </div>
                                  <input type="submit" class="btn btn-primary" value="Filter">
                                  </form>

                
     
                                 
      </div>
      <!-- end of jumbotron -->
                       
                        <?php
                        if (isset($_POST['titleName'])) {
                          $title_name = $_POST['titleName'];
                          $title_name = mysql_real_escape_string($title_name);
                          $desc_name = $_POST['descName'];
                          $desc_name = mysql_real_escape_string($desc_name);
                          $search_text = $_POST['search'];
                        }
                       
                        else{
                          $title_name = "xyz";
                          $desc_name = "ijk";
                          $search_text = "title";
                        }

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


            if($search_text == 'title' ){
            $sql = "SELECT ImageFileName, Title, Description, ArtWorkID, ArtistID FROM artworks WHERE Title LIKE '%{$title_name}%';
            }
            elseif ($search_text == 'desc'){
             $sql = "SELECT ImageFileName, Title, Description, ArtWorkID, ArtistID FROM artworks WHERE Description LIKE '%{$desc_name}%' ;
          }
          else {
            $sql = "SELECT ImageFileName, Title, Description, ArtWorkID, ArtistID FROM artworks ;
          }
         

         
          $result = mysql_query($sql);

          if (! $result) {
            die("Could not get data: ".mysql_error());
          }
                       // output data of each row
            while($row = mysql_fetch_assoc($result)) {
                $new_name = "<mark>".$desc_name."</mark>"; 
              $highwords = $row['Description'];
              $highwords = str_replace($desc_name,$new_name,$highwords);

                echo "<div class='post-container'>
<div class='post-thumb'>
  <br>
                      <a href='Part03_SingleWork.php?id=".$row["ArtWorkID"]."'>
                            <img class='img-responsive' src='art/works/square-medium/".$row["ImageFileName"].".jpg' alt=''>
                        </a></div>
                      <div class='post-content'>
                      <a href='Part03_SingleWork.php?id=".$row["ArtWorkID"]."'>
                            <b style='font-size: 150%;'>".$row["Title"]."</b>
                        </a>
                        <p>".$highwords."</p>
                      </div>
                       </div>
                     


                        ";



                }
                      ?>


    </div>
    </div>
  </body>
</html>​

