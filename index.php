<?php

//some settings
$random_images = array(
	'http://icons.iconarchive.com/icons/zairaam/bumpy-planets/256/07-jupiter-icon.png',
	'http://www.princeton.edu/~willman/planetary_systems/Sol/Saturn/Saturn.gif',
	'http://www.solstation.com/stars/venus.gif',
	'http://quest.nasa.gov/mars/background/images/mars.gif'
);

$cover_image = 'http://www.lovethispic.com/uploaded_images/20521-Rocky-Beach-Sunset.jpg';



// load cookies
$div1_cookie = isset($_COOKIE['div1']) ?  $_COOKIE['div1'] : '25';
$div2_cookie = isset($_COOKIE['div2']) ?  $_COOKIE['div2'] : '75';
$div3_cookie = isset($_COOKIE['div3']) ?  $_COOKIE['div3'] : '50';
$div3c_cookie = isset($_COOKIE['div3c']) ?  $_COOKIE['div3c'] : 'blue';
$div4_cookie = isset($_COOKIE['div4']) ?  $_COOKIE['div4'] : '90';

if (isset($_POST['action'])) {
	  switch ($_POST['action']) {
	  	case 'div1';
	  	  setcookie('div1', $_POST['value'], 0, '/');
	  	  break;
	  	case 'div2';
	  	  setcookie('div2', $_POST['value'], 0, '/');
	  	  break;
	  	case 'div3';
	  	  setcookie('div3', $_POST['value'], 0, '/');
	  	  setcookie('div3c', $_POST['color'], 0, '/');
	  	  break;
	  	case 'div4';
	  	  setcookie('div4', $_POST['value'], 0, '/');
	  	  break;
	  }
}

?>
<!doctype html>
<html lang="en">
<head>
<title>Three29 Test</title>
<style>

/* http://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}
</style>
<style>

#wrapper {
	height: 100vh;
}

#div1 {
	width: <?php echo $div1_cookie.'%'; ?>;
	height: 25vh;
	background-image: url(<?php echo $cover_image; ?>);
  background-repeat: no-repeat;
  background-size: 100% 100%
}

#div2 {
	width: <?php echo $div2_cookie.'%'; ?>;;
	height: 25vh;
	background-color: orange;
	text-align: center;
}

#div3 {
	width: <?php echo $div3_cookie.'%'; ?>;;
	height: 25vh;
	background-color: <?php echo $div3c_cookie; ?>;;
	transition: background-color 1s;
}

#div4 {
	width: <?php echo $div4_cookie.'%'; ?>;;
	height: 25vh;
	background-color: yellow;
	text-align: center;
	font-size: 40px;
}

@media only screen and (max-width: 600px)  {

	#div3, #div4 {
		display: none;
	}

}

</style>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>



$(document).ready(function() {

	var ajaxCall = function (request) {
		$.ajax({
			data: request,
			type: 'post',
			success: function(res) {
				console.log("successful" + ' ' + request.action + ' ' + request.value);
			}
		});
	};
  
  //click event for first div
	$("#div1").click(function() {
		var divWidth = 100 * parseFloat($(this).css('width')) / parseFloat($(this).parent().css('width'));
		if(Math.round(divWidth) === 25) {
			$(this).css('width', '100%');
			ajaxCall({'action': 'div1', 'value': '100'});
		} else {
			$(this).css('width', '25%');
			ajaxCall({'action': 'div1', 'value': '25'});
		}
	});
  
  //click event for second div
	$("#div2").click(function() {
		var divWidth = 100 * parseFloat($(this).css('width')) / parseFloat($(this).parent().css('width'));
		if(Math.round(divWidth) === 75) {
			$(this).css('width', '100%');
			ajaxCall({'action': 'div2', 'value': '100'});
		} else {
			$(this).css('width', '75%');
			ajaxCall({'action': 'div2', 'value': '75'});
		}
	});
  
  //click event for third div
	$("#div3").click(function() {
		var divWidth = 100 * parseFloat($(this).css('width')) / parseFloat($(this).parent().css('width'));
		if(Math.round(divWidth) === 50) {
			$(this).css({
        'width' : '100%',
        'background-color' : 'red'
      });
      // ajaxCall({'action': 'div3', 'value': '100'});
      // ajaxCall({'action': 'div3c', 'value': 'red'});
      ajaxCall({'action': 'div3', 'value': '100', 'color': 'red'});
		} else {
			$(this).css({
        'width' : '50%',
        'background-color' : 'blue'
      });
      ajaxCall({'action': 'div3', 'value': '50', 'color': 'blue'});
      // ajaxCall({'action': 'div3c', 'value': 'blue'});
		}
	});
  
  //click event for fourth div
	$("#div4").click(function() {
		var divWidth = 100 * parseFloat($(this).css('width')) / parseFloat($(this).parent().css('width'));
		if(Math.round(divWidth) === 90) {
			$(this).css('width', '100%');
			// document.cookie = 'div4=100%';
			ajaxCall({'action': 'div4', 'value': '100'});
		} else {
			$(this).css('width', '90%');
			// document.cookie = 'div4=90%';
			ajaxCall({'action': 'div4', 'value': '90'});

		}
	});

});
	
</script>
</head>
<body>
<div id="wrapper">
	<div id="div1" class="divitem">
	</div>
	<div id="div2" class="divitem">
	  <img src=<?php echo $random_images[rand(0,3)]; ?> height="100" width="100">
	</div>
	<div id="div3" class="divitem">
	</div>
	<div id="div4" class="divitem">
	  <?php 
	  for ($i = 1; $i < 10; $i++) {
	  	if ($i < 6) {
	  		echo $i*2-1;
	  	} else {
	  		echo (10-$i)*2-1;
	  	}
	  }
	  ?>
	</div>
</div>
</body>
</html>
