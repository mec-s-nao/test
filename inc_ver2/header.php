<?php $baseurl = "http://aroherman.com/" ;?>
<?php $tel = "048-299-4775" ;?>
<?php $mail = "info@aroherman.com" ;?>
<?php $lineid = "aroherman" ;?>
<?php $lineurl = "http://line.me/ti/p/6ugU4M1HSF" ;?>
<!doctype html>
<html lang="ja">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109082055-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109082055-1');
</script>	
<meta charset="utf-8">
<title><?php echo $tittle ;?></title>
<meta http-equiv="cache-control" content="non-cache">
<meta http-equiv="pragma" content="non-cache">
<meta http-equiv="expires" content="0">
<link rel="index" href="http://aroherman.com/" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="keywords" content="<?php echo $kw ;?>">
<meta name="description" content="<?php echo $description ;?>">
<link href="<?php echo $baseurl ;?>style_ver2.css?ver=<?php echo date('U');?>" rel="stylesheet" type="text/css">
<link href="<?php echo $baseurl ;?>css_ver2/sp.css?ver=<?php echo date('U');?>" rel="stylesheet" type="text/css" media="only screen and (max-width:630px)">
<link rel="stylesheet" href="<?php echo $baseurl ;?>css/jquery.bxslider.css">
<link rel="shortcut icon" href="<?php echo $baseurl ;?>favicon.ico"><!--アイコン指定-->
<!--<link rel="alternate" type="application/rss+xml" title="RSS" href="feed/">--><!--RSSフィード指定-->
<!--<link rel="canonical" href="http://" >--><!--優先ページ-->
<script src="http://code.createjs.com/easeljs-0.7.0.min.js"></script>
<script src="http://code.createjs.com/tweenjs-0.5.0.min.js"></script>
<script src="http://code.createjs.com/movieclip-0.7.0.min.js"></script>
<script src="http://code.createjs.com/preloadjs-0.4.0.min.js"></script>
<?php //Jquery　読み込み ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="<?php echo $baseurl;?>js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo $baseurl;?>js/jquery.inview.js"></script>
<?php //Slick読み込み ?>
<link rel="stylesheet" type="text/css" href="<?php echo $baseurl;?>slick/slick.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseurl;?>slick/slick-theme.css" media="screen" />
<script src="<?php echo $baseurl;?>slick/slick.min.js"></script>
<?php //LightBox　読み込み ?>
<link href="<?php echo $baseurl;?>dist/css/lightbox.css" type="text/css" rel="stylesheet" media="all" />
<script src="<?php echo $baseurl;?>dist/js/lightbox.js" type="text/javascript"></script>
<?php //追加JS ?>
<script src="<?php echo $baseurl ;?>js/function.js" type="text/javascript" async=""></script>
<script src="<?php echo $baseurl ;?>js/echo.js" type="text/javascript" async=""></script>
<?php //外部ツール　読み込み ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function(){
 　$('.topimage').slick({
	  autoplay: true,
	  fade:true,
	  arrows:false,
 　});
 });
</script>

</head>
<body onLoad="init();" class="<?php echo $bodyclass;?>">
	<div class="topcontent">
		<header class="clearfix">
			<div class="wrapper">
				<div id="infomation" class="clearfix">
					<a class="logo" href="<?php echo $baseurl;?>"><img src="<?php echo $baseurl;?>img/logo.png"></a>
					<h1><a href="<?php echo $baseurl;?>"><?php echo $h1tag ;?></a></h1>
					<h2><?php echo $h2tag ;?></h2>
					<a class="tel" href="tel:<?php echo $tel;?>"><i class="fas fa-mobile-alt"></i>tel.<?php echo $tel;?></a>
					<span class="time">営業時間12:00～翌朝6:00 受付時間11:30～翌朝5:00</span>
				</div>
			</div>
        </header>