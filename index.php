<!DOCTYPE html> 
<html> 
<body>
<!-- CSS Style Formatting -->

<style>
body {
  background-color: lightblue;
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

// Creates a path to the directory of each folder, instead of just the directory of index.php
$requestedpath = $_SERVER["REQUEST_URI"];
$realRequestedPath = str_replace("~esk2", "home/esk2/public_html", $requestedpath);

// Open this directory 
$myDirectory = opendir($realRequestedPath);

// Get each entry
while($entryName = readdir($myDirectory)) {
    $dirArray[] = $entryName;
}

// Close directory
closedir($myDirectory);

// Count elements in array
$indexCount = count($dirArray);
Print ("$indexCount files<br>\n");

// Sort them
sort($dirArray);

// Print them
print("<TABLE border=1 cellpadding=5 cellspacing=0 class=whitelinks>\n");
print("<TR><TH>Filename</TH> <th>Filetype</th> <th>Filesize</th> </TR>\n");

// Loop through the array of files and print them all
for($index=0; $index < $indexCount; $index++) {
        if (substr("$dirArray[$index]", 0, 1) != "."){ // don't list hidden files
          print("<TR><TD><a href=\"$dirArray[$index]\">$dirArray[$index]</a></td>");
          print("<td>");  print(filetype($realRequestedPath . DIRECTORY_SEPARATOR. $dirArray[$index])); print("</td>");
          print("<td>");  print(filesize($realRequestedPath . DIRECTORY_SEPARATOR. $dirArray[$index]) . " MB" ); print("</td>");
          print("</TR>\n");
    }
}
print("</TABLE>\n");

?> 

</body> 
</html>