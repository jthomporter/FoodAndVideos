<?php

class ErrorLogger {
    




    function logMessage($message) {
        
        $f = fopen("C:\\food-and-videos\\error.txt", "w");
        fwrite($f, $message);
        fwrite($f, "\n");
        fclose($f);


    }


}
