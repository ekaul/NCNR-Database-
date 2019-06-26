<?php 

// original code of index.php file, shows path of the variables 
#echo get_defined_vars();
#var_dump($_SERVER);

// Break Lines/ Seperate the sections of code 
echo nl2br("\n \r\n You will find the file names below on the browser window:\r\n \r\n");

$requestedpath = $_SERVER["REQUEST_URI"];
$realRequestedPath = str_replace("~esk2", "home/esk2/public_html", $requestedpath);
// Displays the files?? 
$dir = new DirectoryIterator($realRequestedPath);
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {
        var_dump($fileinfo->getFilename());
    }
}

?> 