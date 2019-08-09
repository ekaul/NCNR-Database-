<!DOCTYPE html> 
<html> 
<body>

<head> 

<h1> <center> NIST Center for Neutron Research Data Directory </center>  </h1> 
<h4> You will find the file and folder names below: </h4>

<!-- CSS Style Formatting/ Reference to External Style Sheet -->
<link rel="stylesheet" type="text/css" href="/~esk2/style.css">

</head> 

<!--  Download All button & function/ This needs to be fixed, it doesn't work properly    -->

<button id="download"> Download All Files</button> 


  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script type="text/javascript">

$('#download').click(function() { 
});

var download = function() {  
       for(var i=0; i<arguments.length; i++) {
         var iframe = $('<iframe style="visibility: collapse;"></iframe>');
         $('body').append(iframe);
         var content = iframe[0].contentDocument;
         var form = '<form action="' + arguments[i] + '" method="GET"></form>';
         content.write(form);
         $('form', content).submit();
         setTimeout((function(iframe) {
           return function() { 
             iframe.remove(); 
           }
         })(iframe), 2000);
       }
     }      

}  

  </script>
 

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
echo "<br>";

// Sort them
sort($dirArray);

// Print them 
print("<TABLE border=1 cellpadding=5 cellspacing=0 class=whitelinks>\n");
print("<TR><TH>File Name</TH> <th>File Type</th> <th>File Size</th> <th>Last Modified</th> </TR>\n");


// Loop through the array of files and print them all
for($index=0; $index < $indexCount; $index++) {
        if (substr("$dirArray[$index]", 0, 1) != "."){ // don't list hidden files
            print("<TR><TD
            class=\"filename\"><a href=\"$dirArray[$index]\">$dirArray[$index]</a></td>");
// Prints file type, size and last modification date/time in the table 
          print("<td>");  print(filetype($realRequestedPath . DIRECTORY_SEPARATOR. $dirArray[$index])); print("</td>");
          print("<td>");  print(filesize($realRequestedPath . DIRECTORY_SEPARATOR. $dirArray[$index]) . " B" ); print("</td>"); 
          print("<td>"); print "".date("F d, Y - H:i:s",filemtime($realRequestedPath . DIRECTORY_SEPARATOR. $dirArray[$index])); print("</td>");
          print("</TR>\n");
    }
}
print("</TABLE>\n");

?> 


<!-- Footer --> 
<br/>
<div class="footer" align="center">
   <a href="http://www.nist.gov/" class="eplan">NIST</a> is an agency of the <a href="http://www.commerce.gov/">U.S. Department of Commerce.</a></font>
</div>
</div>
</footer>

</body> 
</html>