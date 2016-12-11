
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Narrow Jumbotron Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="jumbotron-narrow.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>

      <div class="container">
        <div class="header clearfix">
          <nav>
            <ul class="nav nav-pills pull-right">
              <li role="presentation" class="active"><a href="#">Home</a></li>
              <li role="presentation"><a href="#">About</a></li>
              <li role="presentation"><a href="#">Contact</a></li>
            </ul>
          </nav>
          <!-- <h3 class="text-muted">Project name</h3> -->
        </div>

        <div class="jumbotron">
          <h1>Welcome to ParaSharing</h1>
          <p class="lead">ParaSharing is a wireless network sharing platform on which you can share multimedia content with other people within the same wireless network.</p>
          <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
        </div>

        <div class = "row">

          <div class = "col-md-6">
           <h4> Submit your file to</h4>
           <form action="data.php"
           enctype="multipart/form-data" method="post">

           <p>
            Please specify a file, or a set of files:<br>
            <input type="file" name="file" size="40">
          </p>
          <div>
            <input type="submit" value="Send">
          </div>
        </form>
          </div>
          <div class = "col-md-6"> 
            <form action="handle.php"
            enctype="multipart/form-data" method="get">
            <?php
            $dir = "/music";
            $dh  = opendir($dir);

            while (false !== ($filename = readdir($dh))) {
              if($filename != "." && $filename != ".."){
                $files[] = $filename;
              }
            }
            $limit = count($files);
            for($x = 0 ; $x < $limit ;$x++){
      //if(strlen($file[$x]) > 2)
              $mod = str_replace("'", "\'", $files[$x]);
              echo "<div>";
              echo "<input type = 'radio' value = $mod name = 'infos[$x]'> $files[$x] <br>";
              echo "</div>";
            }
            ?>
            <input type = "submit" value = "Delete" />


          </form>
        </div>
      </div>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>
