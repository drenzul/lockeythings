$(document).ready(function() {

var slideIndex = 0;
var override = 0;
var cycle = 49;

carousel();

function carousel(n) {  //control cycle for slides, run every 1/10 of a second
//	console.log("Starting");
    var i;
    cycle++;
	if (cycle == 50 || override == 1)  // change cycle to change duration seconds wanted * 10
	{
//		console.log("Cycle: " + cycle + " Override: " + override);
		cycle = 0;
		var x = document.getElementsByClassName("mySlides");
		for (i = 0; i < x.length; i++) {
			x[i].style.opacity = "0";
		}
		if (x.length > 0){
			if (override == 0){		slideIndex++; cycle = 0;}; // don't progress if this was a click
			if (slideIndex > x.length) {slideIndex = 1;};
			if (slideIndex < 1) {slideIndex = x.length};
   			x[slideIndex-1].style.opacity = "1";
   			var jumpicon = "#jump" + slideIndex;
// 			console.log(jumpicon);
			var y = document.getElementsByClassName("jumpNav");
			var i2;
			for (i2 = 0; i2 < y.length; i2++){
				y[i2].style.backgroundColor="#fff";
//				console.log("Tried to set colour");
			}
			y[slideIndex-1].style.backgroundColor = "green";
 //  		changetext(slideIndex -1);   //used to call an external function when the animation starts running

 //  		console.log("Next slide number" + slideIndex);
			override = 0;
		}


	}
	setTimeout(carousel, 100); // Change image every 2 seconds
}




window.carouselclick = function(n){
//	console.log("Click detected, old slide index: " + slideIndex);
	override = 1;  // this tells the control cycle to exit current sequence, change the image, then reset to 5 seconds
	slideIndex = slideIndex + n;
}

window.carouselskip = function(n){
	override = 1;
	slideIndex = n;

}

$(window).load(function(){
	var slideheight = $('.slides img').height();
//	console.log("Slideheight: " + slideheight);
	$(".slide").css("height", slideheight);
				var overlayheight = $('.slideinner').height();
//				overlayheight = overlayheight +15;
		$(".slideend").css("height", overlayheight );
});

});



$( window ).resize(function() {



//	console.log('test: ' + testme());


  	var slideheight = $('.slides img').height();
	$(".slide").css("height", slideheight);
	var overlayheight = $('.slideinner').height();
//	overlayheight = overlayheight +15;
	$(".slideend").css("height", overlayheight );

});