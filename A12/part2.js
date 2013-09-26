function loadFrames(){
	alert($("#urlname").val());
	$("#change").load($("#urlname").val());
}
function jsFiles(){
	$("#change").empty();
 $.get($("#urlname").val(), function(f){
	var check = f;
	
	var scriptname = "success";
	var parent = $(f);
	var source = $("[src]", parent);
	$("[src]").each(function(){
		$("#change").append(this.src,"<br>");
		
	});
	alert("Don't know how to select external script");
 });

}
function countTags(){
$("#change").empty();
$("#change").append("<p>| Tag | Count |</p>");
$("#change").append("<p>|-------|---------|</p>");
var number
$.get($("#urlname").val(), function(word){
	number = $(word).find("li").length;
		$("#change").append("| li &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| ", number,"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |<br>");
	number = $(word).find("p").length;
	 	$("#change").append("| p &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| ", number,"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |<br>");
	number = $(word).find("a").length;
	 	$("#change").append("| a &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| ", number,"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |<br>");
	number = $(word).find("div").length;
	$("#change").append("| div &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| ", number,"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |<br>");
	number = $(word).find("ul").length;
	$("#change").append("| ul &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| ", number,"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |<br>");
		number = $(word).find("h1").length;
	$("#change").append("| h1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| ", number,"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |<br>");
	number = $(word).find("h2").length;
	$("#change").append("| h2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| ", number,"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |<br>");
	number = $(word).find("header").length;
	$("#change").append("| header &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| ", number,"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |<br>");
	
	});
}
//make sure to type in ../A08/adaptive-design-demo/final.html