<?
session_start();
$filename=$_POST['filename'];
$fileHeader="
<? 

?>
<html>
<head>
    <script type='text/javascript' src='script/".$filename.".js'></script>
    <link type='text/css' rel='stylesheet' href='style/".$filename.".css'>
</head>
<body>";
$fileFooter="</body>
</html>";

if($filename==""){
    $random=rand ( 100000 , 100000000 );
    $randomStr=generateRandomString();
    $filename=hash('sha1',$random.$randomStr);
}

$htmlCode=$_POST['htmlCode'];
$cssCode=$_POST['cssCode'];
$jsCode=$_POST['jsCode'];

// write php file
$fh = fopen("./snippets/".$filename.".php", 'w'); 
$stringData = $fileHeader.$htmlCode.$fileFooter;   
fwrite($fh, $stringData);
fclose($fh);
// write js file
$fh = fopen("./snippets/script/".$filename.".js", 'w'); 
$stringData = $jsCode;   
fwrite($fh, $stringData);
fclose($fh);
// write css file
$fh = fopen("./snippets/style/".$filename.".css", 'w'); 
$stringData = $cssCode;   
fwrite($fh, $stringData);
fclose($fh);

echo $filename;

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