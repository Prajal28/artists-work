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

    
      
      
      
     <div class="jumbotron" style="margin-top: 50px;">
      <div class="container">

        <h1>Welcome to Assignment #1</h1>
        <p>This is the third project for <strong>Prajal Mishra</strong> for CSE 5335</p>
       
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row five-cols">
        <div class="col-md-1">
          <h2><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About Us</h2>
          <p>What this is all about and other stuff</p>
          <p><a class="btn btn-default" href="AboutUs.php" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a></p>
        </div>
        <div class="col-md-1">
          <h2><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Artist List</h2>
          <p>Displays a list of artist names as links</p>
          <p><a class="btn btn-default" href="Part01_ArtistsDataList.php" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a></p>
       </div>
        <div class="col-md-1">
          <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Single Artist</h2>
          <p>Displays information for a single artist</p>
          <p><a class="btn btn-default" href="Part02_SingleArtist.php?id=19" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a></p>
        </div>
        <div class="col-md-1">
          <h2><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Single Work</h2>
          <p>Displays information for a single work</p>
          <p><a class="btn btn-default" href="Part03_SingleWork.php?id=394" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a></p>
        </div>
        <div class="col-md-1">
          <h2><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</h2>
          <p>Perform search on ArtWorks tables</p>
          <p><a class="btn btn-default" href="Part04_Search.php" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a></p>
        </div>
      </div>


      
    </div> <!-- /container -->


  </body>
</html>
