<?php

class diagnostics {

    function runAllTests(){
        $this->getUserAgent();
        $this->getCurrentWorkingDirectories();
        $this->getCurrentUser();
        $this->getInitialPhpConfiguredValues();
        $this->getDeclaredInterfaces();
    }

    function getUserAgent(){
        echo $_SERVER['HTTP_USER_AGENT'];
    }

    function getCurrentWorkingDirectories(){

        // Definicja zmiennych
        $working_directory = getcwd();
        $root_directory = $_SERVER['DOCUMENT_ROOT'];
        $remote_add = $_SERVER['REMOTE_ADDR'];

        // Logika
        if ((!is_null($working_directory) || (!is_null($root_directory)))){
            echo '<br>Root dir: '.$root_directory;
            echo '<br>Working dir: '.$working_directory;
        } elseif ((is_null($working_directory) || (is_null($root_directory)))) {
            die ("<br>No current working dir. Exitting....");
        }
    }

    function getCurrentUser(){
        echo '<br>Currently logged in user: '.get_current_user().'<br>';
    }

    // NIE umieszczaj odwołania do poniszej funkcji na serwerach public-facing !!!
    function getInitialPhpConfiguredValues(){
        foreach (ini_get_all(null, false) as $option => $value)
        echo $option.' = <b>'.$value.'</b><br>';
    }

    function getDeclaredInterfaces(){
        foreach (get_declared_interfaces() as $key => $value) {
            echo $key.' = '.$value.'<br>';
        }
    }


    // Ping specified website using cURL library.
    // Windows/Linux only.
    function pingWebSiteWithCURL(){
        $url = "https://www.google.com";
        $c = curl_init($url);
        curl_setopt($c, CURLOPT_TIMEOUT, 5);
        curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($c);
        $httpcode = curl_getinfo($c, CURLINFO_HTTP_CODE);
        curl_close($c);
        //
        if ($httpcode >= 200 && $httpcode < 300){
            echo "Server responding....";
        } else {
            echo "Something is wrong. Server is down maybe?";
        }
    }

    // Ping specified website using built-in ping command line tool.
    // macOS only.
    function pingWebSiteWithSystemToolSet(){
        system("ping -c 3 www.google.com");
    }

    // PHP =< 5.6 ONLY !!!
    function getMagicQuotes(){
        echo get_magic_quotes_runtime();
    }

    // Invoker for the unitConverter() function.
    // Use with PHP =< 5.x
    // Collapsed by default
    function getFrameWorkData(){
        $this->unitConverter(250);
    }

    // For use with getFrameWorkData() function ONLY.
    // DO NOT use it as standalone function = DO NOT call it directly as it will fail
    // Collapsed by default
    function unitConverter($unitToBeConverted){
        //$convertedToString = (string)$unitToBeConverted;
        $convertedToString = strval($unitToBeConverted);
        echo $convertedToString;
    }

    // Warming: extremely dangerous function :: USE WITH CARE
    // For available values, please see https://www.php.net/manual/en/function.phpinfo.php
    // Make changes ONLY when you know EXACTLY what you are doing and what are possible consequences.
    // Collapsed by default
    function showPhpInfo(){
        phpinfo(INFO_CREDITS);
    }
}

?>