<?
$snippet=$_GET['key'];

?>
<html>
<head>
<!-- hamburgers.css -->
<link href="hamburgers/dist/hamburgers.css" rel="stylesheet">

<!-- jQuery -->
<script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Google icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Google font -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<link type="text/css" rel="stylesheet" href="reset.css">
<link type="text/css" rel="stylesheet" href="style.css">
<script src="scripts/main.js"></script>

</head>
<body>    
    <div class="navCont" >
        <div class="navHeader">aCode<div class="codeIndicatior"></div></div>

        <!-- <div class="hamburger hamburger--collapse">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div> -->
        <span class="material-icons share-icon">
            share
        </span>
    </div>

    <div class="editCont">
        <div class="htmlCont codeCont">
            <div class="codeHeader">Html</div>
            <textarea name="editHtml" id="editHtml" class='codeCont code' onkeyup=''></textarea>
        </div>
        <div class="cssCont codeCont">
            <div class="codeHeader">CSS</div>
            <textarea name="editCss" id="editCss" class='codeCont code'></textarea>
        </div>
        <div class="jsCont codeCont">
            <div class="codeHeader">Javascript</div>
            <textarea name="editJs" id="editJs" class='codeCont code'></textarea>
        </div>
    </div>
    <div class="final"><iframe src='' frameborder="0"></iframe></div>


    <div class="popup">
        <div class="popupCont share">
        <span class="material-icons closeBtn">close</span>

            <div class="popupContent">
                <button id='collaborativeLinkBtn' onclick="copy('collaborative')">copy editable link</button>
                <button hidden>copy collaborative link</button>
                
            </div>
        </div>
    </div>
    <input type="hidden" id="collaborativelink">
    <input type="hidden" id="strictlink">

    <script>
        $(function(){
    // console.log("key: <? echo $snippet ?>");

    if("<? echo $snippet ?>"!=""){
        fileName="<? echo $snippet ?>";
        read();
    }
    
    
    
})
    </script>
    
</body>
</html>
