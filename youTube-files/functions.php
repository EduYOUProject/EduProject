<?php


function loadFile($fileToOpen)
{
    $loadedJsonFile = "";
    $file_handle = fopen($fileToOpen, "r");
    while (!feof($file_handle)) {
       $line = fgets($file_handle);
       if($loadedJsonFile != null)
       {
           $loadedJsonFile .= $line;
       }
       else
       {
           $loadedJsonFile = $line;
       }
    }
    fclose($file_handle);
    return $loadedJsonFile;
}

function createQuestions($questionFileName) {
    $loadedJsonFile = json_decode(loadFile($questionFileName, true));
    $numberOfQuestions = $loadedJsonFile->numOfQuestions;
    for($i = 0; $i < $numberOfQuestions; $i++) {
        echo '<script>document.write(JSONImportData.$i.q)</script>';
    }
}


?>
