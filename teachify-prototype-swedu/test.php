<head>

</head>

<body>
  <?php
     include("functions.php");

     $loadedJSONData = json_decode(loadFile("vid1.json"));
   //  var_dump($loadedJSONData);
     ?>
<style>
    #question0 {
        display:block;
    }
    #question1{
        display:none;
    }
    #question2{
        display:none;
    }
    #question3{
        display:none;
    }
    #question4{
        display:none;
    }


</style>


<div id="player"></div>



<div ID="playback .5">
<button onclick="player.setPlaybackRate(.5)">speed .5</button>
</div>

<div ID="playback 1">
<button onclick="player.setPlaybackRate(1)">speed 1</button>
</div>

<div ID="playback 1.5">
<button onclick="player.setPlaybackRate(1.5)">speed 1.5</button>
</div>

<div ID="playback 2">
<button onclick="player.setPlaybackRate(2)">speed 2</button>
</div>



<br>
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
                        echo "<input type='radio' name='questions' onclick='jumpBackAndHide($tempJumpBack, \"question$i\")' value='${tempAnswers[$j]}'>${tempAnswers[$j]}<br>";
                    }
                    else { //correct answer
                        echo "<input type='radio' name='questions' onclick='correctResponse(question$i)'value='${tempAnswers[$j]}'>${tempAnswers[$j]}<br>";
                    }
                }
         echo "</select> </form></div>";
     }
?>


<script src="jquery-3.0.0.js"></script>
<script type="text/javascript" src="script.js"></script>
<script>
<?php
    for($i = 0; $i < $loadedJSONData->numberOfQuestions; $i++)
    {
     echo "var question${i}CompleteFlag = false; ";
    }
     echo "function alertForPopup(){
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
                        toggleContent(question${i});
                    }";
                }
                else
                {
                    echo " else if(!question${i}CompleteFlag) {
                        toggleContent('question${i}');
                    } ";
                }
            }
        echo "}
            setTimeout(function(){alertForPopup()}, 3000);

}"



?>
</script>
<script>
     var tempVideoIdenfitifer = "dQw4w9WgXcQ";
</script>

</body>
