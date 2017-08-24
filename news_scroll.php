<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>News</title>

<base target="_parent">

<link rel="stylesheet" href="style/css/news_scroll.css" type="text/css">

</head>

<body class="news-scroll" onMouseover="scrollspeed=0" onMouseout="scrollspeed=current" OnLoad="NewsScrollStart();">


<!-- START NEWS FEED -->
<div id="NewsDiv">
<div class="scroll-text-if">
<!-- SCROLLER CONTENT STARTS HERE -->

					<?php 
						$homepage2 = file_get_contents('http://newsapi.org/v1/articles?source=the-times-of-india&sortBy=top&apiKey=ac444cee61714d3c86c125fd734614d0');
                        $homepage = file_get_contents('http://newsapi.org/v1/articles?source=abc-news-au&sortBy=top&apiKey=ac444cee61714d3c86c125fd734614d0');
						$news=json_decode($homepage,true);
						$news2=json_decode($homepage2,true);
						$data= array_merge($news['articles'],$news2['articles']);
						foreach($data as $value)
						{ 
					?>
							<div class="col-xs-12 news" >
							<a href="<?php echo $value['url'];?>" target="_blank">
							<span class="scroll-title-if">
							<?php echo $value['title'];?> </span> </a>
							<p class="text-default"><?php echo $value['description'];?></p>
							</div>
						<?php } ?>
<br><br>
<!-- END SCROLLER CONTENT -->
</div>
</div>
<!-- END NEWS FEED -->
<!-- YOU DO NOT NEED TO EDIT BELOW THIS LINE -->
<script type="text/javascript">


var startdelay 		= 2; 		// START SCROLLING DELAY IN SECONDS
var scrollspeed		= 1.1;		// ADJUST SCROLL SPEED
var scrollwind		= 1;		// FRAME START ADJUST
var speedjump		= 30;		// ADJUST SCROLL JUMPING = RANGE 20 TO 40
var nextdelay		= 0; 		// SECOND SCROLL DELAY IN SECONDS 0 = QUICKEST
var topspace		= "2px";	// TOP SPACING FIRST TIME SCROLLING
var frameheight		= 520;		// IF YOU RESIZE THE CSS HEIGHT, EDIT THIS HEIGHT TO MATCH


current = (scrollspeed);


function HeightData(){
AreaHeight=dataobj.offsetHeight
if (AreaHeight===0){
setTimeout("HeightData()",( startdelay * 1000 ))
}
else {
ScrollNewsDiv()
}}

function NewsScrollStart(){
dataobj=document.all? document.all.NewsDiv : document.getElementById("NewsDiv")
dataobj.style.top=topspace
setTimeout("HeightData()",( startdelay * 1000 ))
}

function ScrollNewsDiv(){
dataobj.style.top=scrollwind+'px';
scrollwind-=scrollspeed;
if (parseInt(dataobj.style.top)<AreaHeight*(-1)) {
dataobj.style.top=frameheight+'px';
scrollwind=frameheight;
setTimeout("ScrollNewsDiv()",( nextdelay * 1000 ))
}
else {
setTimeout("ScrollNewsDiv()",speedjump)
}}


</script>


</body>
</html>
