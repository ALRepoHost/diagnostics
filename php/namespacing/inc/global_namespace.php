<?php
/*
Globalna konfiguracja oraz funkcje wykorzystywane globalnie
@author: macfanpl
*/

namespace Php\inc\Diagnostics\GlobalConfiguration;

class globalConfig {

    function redirectionToBing(){
        echo '<br><a href="https://www.bing.com">Go to !!! Bing.com !!!<br></a>';
    }

    function includeIDESettings(){
        include '/.vscode/settings.json';
    }
}

// Wywolanie klasy
$gc = new globalConfig();
$gc->includeIDESettings();