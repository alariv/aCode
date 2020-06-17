<?
function read($filename){
    echo "<br>reading<br>";
    $myfile = fopen("./snippets/".$filename.".php", "r") or die("<br>No file found!");
    $htmlCoded = fread($myfile,filesize("./snippets/".$filename.".php"));
    fclose($myfile);

    $myfile = fopen("./snippets/script/".$filename.".js", "r") or die("<br>No file found!");
    $jsCoded = fread($myfile,filesize("./snippets/script/".$filename.".js"));
    fclose($myfile);
    
    $myfile = fopen("./snippets/style/".$filename.".css", "r") or die("<br>No file found!");
    $cssCoded = fread($myfile,filesize("./snippets/style/".$filename.".css"));
    fclose($myfile);

}
?>