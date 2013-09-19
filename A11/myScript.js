
$(document).ready(function(){
    $("#q1").append('<p>To get to the other side!</p>');
    $("#q2").append('<p>Because it was dead.</p>');
    $("#q3").append('<p>Five (5)</p>');
    $("#q4").append('<p>Batman</p>');
    $("#q5").append('<p>Yes</p>');
    $("#q1 > p").hide();
    $("#q2 > p").hide();
    $("#q3 > p").hide();
    $("#q4 > p").hide();
    $("#q5 > p").hide();
    
    $("#div1").mouseenter(function(){
        $("#div1").attr("class","purple");
    });
    $("#div1").mouseleave(function(){
        $("#div1").attr("class","div1");
    });
    $("#div2").mouseenter(function(){
        $("#div2").attr("class","purple");
    });
    $("#div2").mouseleave(function(){
        $("#div2").attr("class","div2");
    });
    
    $("#q1").click(function(){
        if($("#q1 > p").is(":visible") ){
         $("#q1 > p").hide();   
        }else{
         $("#q1 > p").show();   
        }
    });
    $("#q2").click(function(){
        if($("#q2 > p").is(":visible") ){
         $("#q2 > p").hide();   
        }else{
         $("#q2 > p").show();   
        }
    });
    $("#q3").click(function(){
        if($("#q3 > p").is(":visible") ){
         $("#q3 > p").hide();   
        }else{
         $("#q3 > p").show();   
        }
    });
    $("#q4").click(function(){
        if($("#q4 > p").is(":visible") ){
         $("#q4 > p").hide();   
        }else{
         $("#q4 > p").show();   
        }
    });
    $("#q5").click(function(){
        if($("#q5 > p").is(":visible") ){
         $("#q5 > p").hide();   
        }else{
         $("#q5 > p").show();   
        }
    });
    
});
