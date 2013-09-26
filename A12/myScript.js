function loadFrames(){
	alert($("#urlname").val());
	$("#frame1").load($("#urlname").val());
}
function jsFiles(){
 $.get($("#urlname").val(), function(f){
	var scriptname = $(f).find("script").attr("src");
	alert(scriptname);
 
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