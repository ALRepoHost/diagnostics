<?php
/*
Globalna konfiguracja oraz funkcje wykorzystywane globalnie
@author: macfanpl
*/
class globalConfig {

    function redirectionToBing(){
        echo '<br><a href="https://www.bing.com">Go to !!! Bing.com !!!<br></a>';
    }

    function includeIDESettings(){
        include '/.vscode/settings.json';
    }
}

$gc = new globalConfig();
$gc->includeIDESettings();