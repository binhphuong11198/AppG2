<?php include_once("nav.php"); 
include_once("model/user.php");

echo '<h1>Bai so 5 </h1>';
?>
<button onclick="testAjax();">test chơi</button>
<div id="contentAjax"></div>
<script>
	function testAjax(){
		var xhttp =  new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState ==4 && this.status ==200) {
				var user =JSON.parse(this.responseText);
				var str= "<ul>";
				str += "<li>";
				str +="username:" + user.username;
				str +="</li>";

				str += "<li>";
				str +="pass:" + user.password;
				str +="</li>";

				str + = "<li>";
				str +="username:" + user.fullname;
				str +="</li>";
				str + ="</ul>";
				document.getElementById("contentAjax").innerHTML = str;
			}
		}
		xhttp.open("get", "testAjax.php?username=anhta", true);
		xhttp.send();
	}
</script>