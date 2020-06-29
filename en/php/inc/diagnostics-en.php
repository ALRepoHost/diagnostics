<?php
/*
* Main diagnostics class
* @author: macfanpl
*
* Pay close attention to function-specific comments
* 
* ===========
* How to use?
* ===========
*
* From index-en.php (or index.php; depending on your language) call specific function(s) * you want to be fired
*
*/
class diagnostics {

    /*
    Fires up all functions at once. Ommits dangerous ones
    */
    function runAllRecursively(){
        $nazwyFunkcji = Array(
            "runAllTests",
            "getUserAgent",
            "getCurrentWorkingDirectories",
            "getCurrentUser",
            "getInitialPhpConfiguration",
            "getDeclaredInterfaces",
            "pingWebSiteWithCURL",
            "pingWebSiteWithSystemToolSet",
            "getFrameWorkData"
        );

        for ($i=0; $i < count($nazwyFunkcji); $i++){
            echo '<br>'.$i.':: Function name: '.$nazwyFunkcji[$i];
        }  
    }

    // Gets user-agent
    function getUserAgent(){
        echo $_SERVER['HTTP_USER_AGENT'];
    }

    // Gets user working-dir
    function getCurrentWorkingDirectories(){

        // Variables definition
        $working_directory = getcwd();
        $root_directory = $_SERVER['DOCUMENT_ROOT'];
        $remote_add = $_SERVER['REMOTE_ADDR'];

        // function logic
        if ((!is_null($working_directory) || (!is_null($root_directory)))){
            echo '<br>Root dir: '.$root_directory;
            echo '<br>Working dir: '.$working_directory;
        } elseif ((is_null($working_directory) || (is_null($root_directory)))) {
            die ("<br>No current working dir. Exitting....");
        }
    }

    // Gets UID of current user (who fired-up the test)
    function getCurrentUser(){
        echo '<br>Currently logged in user: '.get_current_user().'<br>';
    }

    /*
    * Unused function
    * @todo: decide upon its fate
    */
    function getDeclaredInterfaces(){
        foreach (get_declared_interfaces() as $key => $value) {
            echo $key.' = '.$value.'<br>';
        }
    }

    /*
    * Pings specific website (:80) using cURL library
    * OS: Windows/Linux
    */
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

    /*
    * Pings specific website (:80) using built-in web pinger
    * OS: macOS
    */
    function pingWebSiteWithSystemToolSet(){
        system("ping -c 3 www.google.com");
    }

    // PHP =< 5.6 !!!
    function getMagicQuotes(){
        echo get_magic_quotes_runtime();
    }

    /*
    * Simple launcher of next function
    */
    function getFrameWorkData(){
        $this->unitConverter(250);
    }

    /*
    * Unit converter.
    * DO NOT call it as a standalone function
    */
    function unitConverter($unitToBeConverted){
        //$convertedToString = (string)$unitToBeConverted;
        $convertedToString = strval($unitToBeConverted);
        echo $convertedToString;
    }

    /*
    * ================================================================
    * CAUTION !!! Pottentially dangerous functions ahead. 
    * ================================================================
    *
    * Use only when you know and fully understand the implications.
    * You have been warned
    */
    
    /*
    * Shows some PHP info.
    * For possoble parameters value, please refer to:
    * https://www.php.net/manual/en/function.phpinfo.php
    */
    function showPhpInfo(){
        phpinfo(INFO_LICENSE);
    }


    // Gets some initial (during instalation/firing up of deamon) configured values from PHP.
    function getInitialPhpConfiguredValues(){
        foreach (ini_get_all(null, false) as $option => $value)
        echo $option.' = <b>'.$value.'</b><br>';
    }

    /*
    Gets user real IP. For those behind proxy gets proxy IP also. 
    @todo: General helper (2*1/2*0)
    */
    function getServerIP(){
        $ip = $_SERVER['REMOTE_ADDR'];
        $forwardedIp = $_SERVER['HTTP_X_FORWARDED_FOR'];

        if ((!$ip) || (!$forwardedIp)) {

            // @todo: use of die() => RFC-D017
            echo 'IP is unknown';
        } else {
            echo 'Your IP is: '.$ip.' and is forwarded through: '.$forwardedIp;
        }
    }
}

?>