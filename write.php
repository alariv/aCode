<?php
session_start();

$fileHeader="<html><head></head>
<body>";

$fileFooter="</body>
</html>";

$currentFile=$_POST['filename'];
if($currentFile!=""){
    $htmlCode=$_POST['htmlCode'];
    $cssCode="<style>".$_POST['cssCode']."</style>";
    $jsCode="<script>".$_POST['jsCode']."</script>";
    
    $fileContent=$htmlCode.$cssCode.$jsCode;
    
    $myFile = $currentFile; 
    $fh = fopen("./snippets/".$myFile.".html", 'w'); 
    $stringData = $fileHeader.$fileContent.$myFile.$fileFooter;   
    fwrite($fh, $stringData);
    fclose($fh);    
    
    echo $currentFile;

}else{
    $random=rand ( 100000 , 100000000 );
    $randomStr=generateRandomString();
    $filename=hash('sha1',$random.$randomStr);
    $htmlCode=$_POST['htmlCode'];
    $cssCode="<style>".$_POST['cssCode']."</style>";
    $jsCode="<script>".$_POST['jsCode']."</script>";

    $fileContent=$htmlCode.$cssCode.$jsCode;

    $myFile = $filename; 
    $fh = fopen("./snippets/".$myFile.".html", 'w'); 
    $stringData = $fileHeader.$fileContent.$myFile.$fileFooter;   
    fwrite($fh, $stringData);
    fclose($fh);
    
    echo $filename;

}



function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>