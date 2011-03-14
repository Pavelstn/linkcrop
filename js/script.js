(function($){
    // var smallurl="";
    $(document).ready(function(){
        
        $('#crop').click(function(){
            //alert("preved!!!");
            //$(".input-text").hide();
            //$(".cmenu").slideUp();
            $(".cmenu").empty();
            send_data();
        //$(".cmenu").append(smallurl);
        //$(".cmenu").slideDown();
        });
      
    } );

//    function importjs(src,data){
//        var scriptElem = document.createElement('script');
//        scriptElem.setAttribute('src',src+data);
//        scriptElem.setAttribute('type','text/javascript');
//        document.getElementsByTagName('head')[0].appendChild(scriptElem);
//    }

//    function send_data(){
    //        var longURL= $('.input-text').val();
    //        //var addr= "http://localhost:3000/getorder/htmlpost";
    //        var addr= "./smallurl";
    //        var data= "?rand=" + Math.random() + "&";
    //        data+="longurl="+longURL;
    //        importjs(addr, data);
    //    }

    function send_data(){
        var longURL= $('.input-text').val();
        var addr= "./smallurl";
        data="longurl="+longURL;
        $.getJSON('./smallurl?type=json&'+data, function(json) {
            $('.cmenu').text(json.smallurl); 
        });
    }
})(jQuery);
