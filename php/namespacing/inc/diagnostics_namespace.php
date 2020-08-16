<?php
/*
* Główne funkcje diagnostyczne.
* @author: macfanpl
*
* Wersja namespace
*/

namespace Php\inc\Diagnostics;


class diagnostics {

    /*
    Wywołuje wszystkie funkcje poza tymi, które są oznaczone jako
    niebezpieczne
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
            "getFrameWorkData",
            "getOS",
            "getBrowser"
        );

        for ($i=0; $i < count($nazwyFunkcji); $i++){
            echo '<br>'.$i.':: Function name: '.$nazwyFunkcji[$i];
        }  
    }

    // Uzyskuje user-agent od przeglądarki uzytkownika
    function getUserAgent(){
        echo $_SERVER['HTTP_USER_AGENT'];
    }

    // Uzyskuje aktualny katalog pracy od systemu uzytkownika
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

    // Uzyskuje nazwę oraz UID aktualnego uzytkownika web ( = klienta serwera webowego)
    function getCurrentUser(){
        echo '<br>Currently logged in user: '.get_current_user().'<br>';
    }

    // NIE umieszczaj odwołania do poniszej funkcji na serwerach public-facing !!!
    function getInitialPhpConfiguredValues(){
        foreach (ini_get_all(null, false) as $option => $value)
        echo $option.' = <b>'.$value.'</b><br>';
    }

    /*
    * Funkcja nieuzywana
    */
    function getDeclaredInterfaces(){
        foreach (get_declared_interfaces() as $key => $value) {
            echo $key.' = '.$value.'<br>';
        }
    }

    /*
    Funkcja pinguje określoną stronę web (na porcie :80) przy uzyciu
    biblioteki cURL
    Systemy: Windows oraz Linux
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
    Funkcja pinguje określoną stronę web (na porcie :80) przy uzyciu
    mechanizmu systemowego.
    System: macOS
    */
    function pingWebSiteWithSystemToolSet(){
        system("ping -c 3 www.google.com");
    }

    // PHP =< 5.6 !!!
    function getMagicQuotes(){
        echo get_magic_quotes_runtime();
    }

    /*
    Funkcja wywoławcza dla kolejnej funkcji (unitConverter())
    */
    function getFrameWorkData(){
        $this->unitConverter(250);
    }

    /*
    Funkcja konwertująca jednostki.
    Nie wywołuj jej jako samodzielnej funkcji.
    */
    function unitConverter($unitToBeConverted){
        //$convertedToString = (string)$unitToBeConverted;
        $convertedToString = strval($unitToBeConverted);
        echo $convertedToString;
    }

    /*
    ================================================================
    UWAGA -- Funkcja potencjalnie niebezpieczna; uzywaj ostronie (!)
    ================================================================

    Pokazuje rózne wrazliwe dane dotyczące serwera zarówno fizycznego
    jak i webowego/php.

    Odnośnie mozliwych parametrów, odwołaj się do oficjalnej dokumentacji
    języka PHP: https://www.php.net/manual/en/function.phpinfo.php
    */
    function showPhpInfo(){
        phpinfo(INFO_LICENSE);
    }

    /*
    Funkcja zwraca IP rzeczywiste oraz - w przypadku proxy - IP serwera pośrednika.
    @todo: ogólny helper (przewidywane 1+/2+)
    */
    function getServerIP(){
        $ip = $_SERVER['REMOTE_ADDR'];
        $forwardedIp = $_SERVER['HTTP_X_FORWARDED_FOR'];

        if ((!$ip) || (!$forwardedIp)) {

            // @todo: powinno być die() => RFC-D017
            echo 'IP is unknown';
        } else {
            echo 'Your IP is: '.$ip.' and is forwarded through: '.$forwardedIp;
        }
    }

    /*
    * Uzyskuje nazwę systemu operacyjnego uzytkownika który wywołał dany skrypt PHP
    * @todo dodać inne (mniej znane/uzywane) systemy
    * Źródło funkcji: https://stackoverflow.com/questions/18070154/get-operating-system-info
    */
    function getOS(){ 

    global $user_agent;

    $os_platform  = "Unknown OS Platform";
    $os_array     = array(
                          '/windows nt 10/i'      =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                    );

    foreach ($os_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $os_platform = $value;

    return $os_platform;
}

    /*
    * Uzyskuje nazwę przeglądarki uzytkownika wywołującego skrypt.accordion
    * @todo dodać inne (mniej znane/uzywane) przeglądarki
    * Źródło funkcji: https://stackoverflow.com/questions/18070154/get-operating-system-info
    */
    function getBrowser() {

    global $user_agent;

    $browser        = "Unknown Browser";
    $browser_array = array(
                            '/msie/i'      => 'Internet Explorer',
                            '/firefox/i'   => 'Firefox',
                            '/safari/i'    => 'Safari',
                            '/chrome/i'    => 'Chrome',
                            '/edge/i'      => 'Edge',
                            '/opera/i'     => 'Opera',
                            '/netscape/i'  => 'Netscape',
                            '/maxthon/i'   => 'Maxthon',
                            '/konqueror/i' => 'Konqueror',
                            '/mobile/i'    => 'Handheld Browser'
                     );

    foreach ($browser_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $browser = $value;

    return $browser;
}
}
?>