$("document").ready(function() {  
  
    var currentPosition = parseInt($("#right_section").css("top"));  
  
    $(window).scroll(function() {  
            var position = $(window).scrollTop(); // 현재 스크롤바의 위치값을 반환합니다.  
            $("#right_section").stop().animate({"top":position+currentPosition+"px"},500);  
    });  
      
});  
