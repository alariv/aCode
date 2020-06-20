var fileName="";
$(function(){
    $('.code').on('keyup',function(){
        // console.log("wrote sumthing");
        write();
    });
    $('.share-icon').on('click',function(){
        popup('share');
    });
    $('.popup').on('click','.closeBtn',function(){
        
        $('.popup').fadeOut(100);
        $('.popup .popupCont').fadeOut(100);
    });

    // console.log("key: <? echo $snippet ?>");

    if(fileName!=""){
        fileName="<? echo $snippet ?>";
        read();
    }
    
    
    
})
function copy(type) {
    document.getElementById("collaborativelink").value="https://alari.ee/aCode?key="+fileName;
    if(type=="collaborative"){
        var copyText = document.getElementById("collaborativelink");
    }else{
        var copyText = document.getElementById("strictlink");
    }
    $('#collaborativelink').attr("type",'text');
    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/
  
    /* Copy the text inside the text field */
    document.execCommand("copy");
  
    $('#collaborativelink').attr("type",'text');
    $('#collaborativeLinkBtn').attr("disabled",'').addClass('success');
    setTimeout(function(){
        $('#collaborativeLinkBtn').removeAttr("disabled").removeClass('success');

    },2000)
  }
function popup(name){
    $('.popup').show();
    $('.popup .popupCont.'+name).show();
}
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

