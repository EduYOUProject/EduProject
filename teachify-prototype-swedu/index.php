<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="css/studentview.css" type="text/css" title="no title" charset="utf-8">
    <title>Teachify</title>
  </head>
  <body>
    <?php
       include("functions.php");

       $loadedJSONData = json_decode(loadFile("demovid.json"));
       //var_dump($loadedJSONData);
       ?>
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
    <div class="breaker"><div>
    <div id="content-head">
      <p>Student View</p>
    </div>
    <div id="wrapper" class="container-fluid">
      <div id="main-content" class="col-md8">
        <div id="video-title"><p class="vid-title">
          <?php
            $titleTemp = $loadedJSONData->nameOfLesson;
            echo "$titleTemp";
          ?></p></div>
          <div id="player">
            <!--video plays here-->
          </div>
        <div id="video-controls">
          <ul id="controls">
            <li><span class="glyphicon glyphicon-play" onclick="playVideo();"></span></li>
            <li><span class="glyphicon glyphicon-pause" onclick="pauseVideo();"></span></li>
            <li><span class="glyphicon glyphicon-stop" onclick="stopVideo();"></span></li>
            <li><span id="thumbs-up" class="glyphicon glyphicon-thumbs-up"></span></li>
            <li><span id="thumbs-down" class="glyphicon glyphicon-thumbs-down"></span></li>


            <!-- <li><button type="button" class="video-controls">Play</button></li>
            <li><button type="button" class="video-controls">Pause</button></li>
            <li><button type="button" class="video-controls">Stop</button></li> -->
            <li><button type="button" class="speed-controls" id="playback .5" onclick="player.setPlaybackRate(.5)">0.5x</button></li>
            <li><button type="button" class="speed-controls" id="playback 1" onclick="player.setPlaybackRate(1)">1.0x</button></li>
            <li><button type="button" class="speed-controls" id="playback 1.5" onclick="player.setPlaybackRate(1.5)">1.5x</button></li>
            <li><button type="button" class="speed-controls" id="playback 2" onclick="player.setPlaybackRate(2)">2.0x</button></li>
          </ul>
        </div>
      </div>
      <div id="question-wrapper">
      <div id="right-bar" class="col-md-4">
        <div id="question-head"><p id="question-title"></div>

        <?php
             $q = 1;
          //var_dump($loadedJSONData->{"$q"});

             for($i = 0; $i < $loadedJSONData->numberOfQuestions; $i++) {
                 $tempQuestion = $loadedJSONData->{"$i"}->q;
                 $tempCorrectAnswer = $loadedJSONData->{"$i"}->correctAnswer;
                 $tempAnswers = $loadedJSONData->{"$i"}->answers;
                 $tempJumpBack = $loadedJSONData->{"$i"}->jumpBackTime;

                 echo "<div ID='question$i'>
                     <form>
                        Question: $tempQuestion <br>";
                        for($j = 0; $j < count($tempAnswers); $j++) {
                            if($j != $tempCorrectAnswer)
                            {
                                echo "<input type='radio' name='questions' onclick='jumpBackAndHide($tempJumpBack, \"question$i\");' value='${tempAnswers[$j]}'>${tempAnswers[$j]}<br>";
                            }
                            else { //correct answer
                                echo "<input type='radio' name='questions' onclick='correctResponse(\"question$i\"); question${i}CompleteFlag = true;'value='${tempAnswers[$j]}'>${tempAnswers[$j]}<br>";
                            }
                        }
                 echo "</select> </form></div>";


                
             }
        ?>
        <div>
                  <img src="assets/images/correct.png" alt="" id="correct" />
                  <img src="assets/images/incorrect.png" alt="" id="incorrect"/>
        </div>
      </div>
    </div>
      <div id="resources" class="container-fluid">
        <p><strong>External Resources:</strong></p>
        <p>A quick over view of the basics: <a>docs.google.com/document/d/1N41HVWeAXNOGevPjQgAJsJnWcp1Yyv5OwGA7rn15lLI</a></p>
        <p>An advanced application for this subject: <a>https://www.youtube.com/watch?v=BmFEoCFDi-w</a></p>
        <p>A scienftic study on this topic: <a>http://www.nature.com/scitable/topic/cell-cycle-and-cell-division-14122649</a></p>
      </div>
      <div id="comments" class="container-fluid"><strong>Comments:</strong></div>
      <div id="footer" class="col-md-8">
        <h5 id="footer-content">2016 Team Teachify</h5>
      </div>
    </div>
    <script src="js/jquery-2.2.4.js"></script>
    <script src="js/bootstrap.min.js"></script>


    </script>
    <script>
    <?php
        for($i = 0; $i < $loadedJSONData->numberOfQuestions; $i++)
        {
         echo "var question${i}CompleteFlag = false; ";
        }
         echo "\nfunction alertForPopup(){
             setTimeout(3000);
            if(";

         for($i = 0; $i < $loadedJSONData->numberOfQuestions; $i++) {
             $tempQuestion = $loadedJSONData->{"$i"}->q;
             $tempCorrectAnswer = $loadedJSONData->{"$i"}->correctAnswer;
             $tempAnswers = $loadedJSONData->{"$i"}->answers;
             $tempJumpBack = $loadedJSONData->{"$i"}->jumpBackTime;
             $tempPopUp = $loadedJSONData->{"$i"}->popupTime;

             if($i != 0)
             {
                echo "||equalToYoutubeTime($tempPopUp)";
             }
             else
             {
                echo "equalToYoutubeTime($tempPopUp)";
             }
         }

            echo ") {";
                for($i = 0; $i < $loadedJSONData->numberOfQuestions; $i++) {
                    if($i == 0)
                    {
                        echo "if(!question${i}CompleteFlag) {
                            showContent('question${i}');
                            player.pauseVideo();
                        }";
                    }
                    else
                    {
                        echo " else if(!question${i}CompleteFlag) {
                            showContent('question${i}');
                            player.pauseVideo();
                        } ";
                    }
                }
            echo "}

    }"



    ?>
    </script>
    <script type="text/javascript" src="script.js"></script>
  <script>
  <?php
      $tempVideoIdenfitifer = $loadedJSONData->youtubeVideoAPICode;
      echo "var tempVideoIdenfitifer = \"$tempVideoIdenfitifer\"";
    ?>
  </script>

<script>
        setTimeout(function(){w = new Worker("checker_worker.js"); w.onmessage = function(event){alertForPopup();}}, 3000);
/*        $('player').load(function(){
            alertForPopup();
    });*/
</script>
  </body>
</html>
