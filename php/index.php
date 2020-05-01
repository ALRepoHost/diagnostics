<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" type="text/css"/>
</head>
<body>
<?php

/*
* Prosty framework szkieletowy do testowania skryptów PHP.
* @author: macfanpl
* @version: (tag-based)
*/
require 'inc/diagnostics.php';
require 'inc/global.php';

// Zainicjowanie poszczególnych klas
$ac = new diagnostics();
$gl = new globalConfig();

// W tym miejscu wywołaj odpowiednią/zadaną funkcję z pliku diagnostics.php
$ac->runAllRecursively();
?>
</html>
</body>