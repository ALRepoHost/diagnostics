<?php
/*
* Główne funkcje diagnostyczne.
* @author: macfanpl
*
* Zwróć uwagę na komentarze przy poszczególnych funcjach.
* 
* ===========
* Jak uzywac?
* ===========
*
* Wywołaj odpowiednią funkcję z określonego miejsca w pliku index.php
* W pliku index.php szukaj miejsca z odpowiednim komentarzem.
*
* Istnieje mozliwość wywołania tzw. funkcji zbiorczej.
* Zwróć jednak uwagę, iz funkcja ta nie wywołuje funkcji oznaczonych jako
* niebezpieczne (dangerous).
*/
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
            "showPhpInfo"
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
}

?>