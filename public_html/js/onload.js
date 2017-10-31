$(document).ready(function() {
	$(".comparebutton").click(function(){
		var comp1 = $("input:radio[name = 'left']:checked").val();
		var	comp2 = $("input:radio[name = 'right']:checked").val();
		if ((comp1 == undefined) || (comp2 == undefined)){
			alert("You need to select a gun from each column to compare! \n\n The website may be good but its not psychic!");
		}else
		{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					document.getElementById("comparebox").innerHTML = this.responseText;
				}
			}
		}
		xmlhttp.open("GET", "/guncomp/" + comp1 + ":" + comp2, true);
		xmlhttp.send();
	});
	
	$(".minsize, .maxsize, .selecttype, .guiderating, .sortby").change(function(){
		var xmlhttp = new XMLHttpRequest();
		var side;

		if($(this).parent().parent().is("#leftfilters")){
			side="left";
		}
		if($(this).parent().parent().is("#rightfilters")){
			side="right";
		}
		var sortstring = $(this).parent().parent().find('select.sortby').val();
		typestring = '';
		guidestring = '';
		querystring = "minsize-"+ $(this).parent().parent().find('select.minsize').val();
		querystring2 = ":maxsize-"+ $(this).parent().parent().find('select.maxsize').val();
		querystring = querystring + querystring2;
		
		querystring2 = $(this).parent().parent().find('select.selecttype').val();
		if (querystring2 !=  "1||2||3"){
			querystring = querystring + ":type-" + querystring2;
		}
		
		xmlhttp.onreadystatechange = function(){
	
			if (this.readyState == 4 && this.status == 200){
				
				if(side == "left"){
					document.getElementById("leftlist").innerHTML = this.responseText;
				}
				if(side == "right"){
		
					document.getElementById("rightlist").innerHTML = this.responseText;
				}
			}
		};
		
//		teststring = "/gunList/" + side + "/" + sortstring + "/" + querystring;
//		alert(teststring);
		xmlhttp.open("GET", "/gunList/" + side + "/" + sortstring + "/" + querystring, true);
		xmlhttp.send();
		return xmlhttp;

	});
	
	

});

function loadDoc1(){

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					document.getElementById("leftlist").innerHTML = this.responseText;
				}
		};
		xmlhttp.open("GET", "/gunList/left", true);
		xmlhttp.send();
		return xmlhttp;
}

function loadDoc2(){

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				document.getElementById("rightlist").innerHTML = this.responseText;
			}
	};
	xmlhttp.open("GET", "/gunList/right", true);
	xmlhttp.send();
	return xmlhttp;
}


