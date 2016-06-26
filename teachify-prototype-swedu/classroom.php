<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="css/classroom.css" type="text/css" title="no title" charset="utf-8">
    <title>Teachify</title>
  </head>
  <body>
    <header id="header">
      <a href="index.php"><img src="assets/images/teachify.png" alt="" id="co-logo"/></a>
      <img src="assets/images/gray_gradient.jpg" alt="" id="banner"/>
      <!-- <h1 id="headline" class="nav-content">P Vidi - Student View</h1> -->
      <nav id="navigation" class="navbar navbar-default">
        <ul id="nav">
          <a href="index.php"><li><button type="button" id="home-button" class="btn btn-success">Student View</button></li></a>
          <li><button type="button" class="btn btn-success">About</button></li>
          <li><button type="button" class="btn btn-success">Resources</button></li>
          <li><a href="teacher.php"><button type="button" class="btn btn-success">Teacher View</button></a></li>
          <li><a href="classroom.php"><button type="button" class="btn btn-success">Classroom View</button></a></li>
        </ul>
      </nav>
      <img src="assets/images/background-gradient.jpg" id="main-image" alt=""/>
    </header>
    <div class="breaker"></div>
    <div id="content-head">
      <p>Classroom View</p>
    </div>
    <div id="wrapper" class="container-fluid">
      <div id="progress-wrapper">
      <div id="main-wrap" class="col-md-4">
        <div id="progress-head"><h2 id="question-title">Current Progress:</h2></div>

      </div>
      <div id="comments" class="container-fluid"><strong>Submit questions:</strong></div>
    </div>
      <div id="resources" class="container-fluid">
      <div id="footer" class="col-md-8">
        <h5 id="footer-content">2016 Team Teachify</h5>
      </div>
    </div>
  </div>
    <script src="js/jquery-2.2.4.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
  </body>
</html>
