<?
$snippet=$_GET['key'];

?>
<html>
<head>
<script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<link type="text/css" rel="stylesheet" href="reset.css">
<link type="text/css" rel="stylesheet" href="style.css">

</head>
<body>    
    <div class="navCont" style="display:none">
        <div class="navHeader">aCode</div>
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

    <script>
        var fileName="";
        $(function(){
            $('.code').on('keyup',function(){
                // console.log("wrote sumthing");
                write();
            });
            // console.log("key: <? echo $snippet ?>");
        
            if("<? echo $snippet ?>"!=""){
                fileName="<? echo $snippet ?>";
                read();
            }
            
            
            
        })
        function write(){
            $.ajax({
                url : './write.php',
                type : 'POST',
                data : ({
                    filename: fileName,
                    htmlCode:$('#editHtml').val(),
                    cssCode:$('#editCss').val(),
                    jsCode:$('#editJs').val()
                }),
                success : function (result) {
                    //console.log (result);
                    fileName=result;
                    $('.final').find('iframe').attr("src","./snippets/"+result+'.php');
                },
                error : function (e) {
                    console.log (e);
                }

                });
        }
        function read(){
            $.ajax({
                url : './read.php',
                type : 'POST',
                data : ({
                    filename: fileName
                }),
                success : function (result) {
                    console.log (result);

                    var html=result.split("|")[0].split("<body>")[1].replace("</body>","").replace("</html>","");
                    var js=result.split("|")[1];
                    var css=result.split("|")[2];
                $('#editHtml').val(html);
                $('#editJs').val(js);
                $('#editCss').val(css);
                    
                $('.final').find('iframe').attr("src","./snippets/"+fileName+'.php');
                },
                error : function (e) {
                    console.log (e);
                }

                });
        }

        
    </script>
    
</body>
</html>
