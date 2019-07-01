<!DOCTYPE html> 
<html> 
<body>
<!-- CSS Style Formatting -->

<style>
body {
  background-color: #E6E6E6;
}

h1 {
  color: black;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 20px;
}
</style>

<h1> <center> NIST Center for Neutron Research Data Directory </center>  </h1> 
<h4> You will find the file and folder names below: </h4>

<?php 

// Changes ~esk2 to home/esk2/public_html
$requestedpath = $_SERVER["REQUEST_URI"];
$realRequestedPath = str_replace("~esk2", "home/esk2/public_html", $requestedpath);

// Displays the file and folder names  
$dir = new DirectoryIterator($realRequestedPath);
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {
        var_dump($fileinfo->getFilename());
    }
}

?> 

</body> 
</html> 