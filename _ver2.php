<?php
require_once("./config.php");
require_once("./function.php");
//セッションを開始
session_start();

//DB接続
$con = db_connect();
if($con === false){
	exit();
}

//登録情報を取得
$max_sc = 0;

//セラピスト登録情報を取得
$sql = "SELECT therapist_id, koukai_flg, name, koukai_date, height, bust, waste, hip, age, blog, twitter, newface, pickup_flag, image_name01, pickup_image ";
$sql .= "FROM therapist_with ";
$sql .= "WHERE koukai_flg = '0' ";
$sql .= "ORDER BY sort;";
//セラピスト登録件数取得
$num_rows = 0;
if($db_rtn = mysqli_query($con, $sql)){
	$therapist_info = array();
	while ($row = mysqli_fetch_assoc($db_rtn)) {
		$therapist_info[$num_rows]['therapist_id'] = $row['therapist_id'];
		$therapist_idlist[$num_rows] = $therapist_info[$num_rows]['therapist_id'];
		$therapist_info[$num_rows]['koukai_flg'] = $row['koukai_flg'];
		$therapist_info[$num_rows]['name'] = $row['name'];
		$therapist_info[$num_rows]['height'] = $row['height'];
		$therapist_info[$num_rows]['bust'] = $row['bust'];
		$therapist_info[$num_rows]['waste'] = $row['waste'];
		$therapist_info[$num_rows]['hip'] = $row['hip'];
		$therapist_info[$num_rows]['age'] = $row['age'];
		$therapist_info[$num_rows]['blog'] = $row['blog'];
		$therapist_info[$num_rows]['twitter'] = $row['twitter'];
		if($row['image_name01'] != ""){	
			$therapist_info[$num_rows]['image_name01'] = $row['image_name01'];
		}else{
			$therapist_info[$num_rows]['image_name01'] = "noimage.jpg";
		}
		if($row['pickup_image'] != ""){	
			$therapist_info[$num_rows]['thum'] = $row['pickup_image'];
		}else{
			$therapist_info[$num_rows]['thum'] = $therapist_info[$num_rows]['image_name01'];
		}		
		$therapist_info[$num_rows]['newface'] = $row['newface'];
		$therapist_info[$num_rows]['pickup_flag'] = $row['pickup_flag'];
		$num_rows++;
	}
	$max_num = $num_rows;
	mysqli_free_result($db_rtn);
}

//スケジュール情報を取得
if($h = intval(date("H")) < 6){
	$date = date("Y-m-d", strtotime('-1 day'));
}else{
	$date = date("Y-m-d");								
}
$sql = "SELECT sc_id, sc_date, cast_id, sc_time, sc_flag "; //sc_flag true のみのデータを取り出したい（調査）
$sql .= "FROM schedule_with ";
$sql .= "WHERE sc_date = '".$date."';";


//スケジュール登録件数取得
$sc_rows = 0;
if($db_rtn = mysqli_query($con, $sql)){
	$schedule_info = array();
	while ($row = mysqli_fetch_assoc($db_rtn)) {
		$schedule_info[$sc_rows]['sc_id'] = $row['sc_id'];
		$schedule_info[$sc_rows]['sc_date'] = $row['sc_date'];
		$schedule_info[$sc_rows]['cast_id'] = $row['cast_id'];
		$schedule_info[$sc_rows]['sc_time'] = $row['sc_time'];
		$schedule_info[$sc_rows]['sc_flag'] = $row['sc_flag'];
		$sc_rows++;
	}
	$max_sc = $sc_rows;
	mysqli_free_result($db_rtn);
}
//castIDとsc_timeの分割
if($max_sc != 0){
	$sc_flag = 1;
	$id_array = explode("-", $schedule_info[0]['cast_id']);					
	$time_array = preg_replace('/(\s|　)/','',explode("--", $schedule_info[0]['sc_time']));
	$sr = 0;
	while($id_array[$sr] != ""){		
		$sc_ar[$sr]["id"] = $id_array[$sr];
		$sc_ar[$sr]["time"] = $time_array[$sr];
		$sr++;
	}
	foreach ($sc_ar as $key => $value){
	  $key_id[$key] = $value['id'];
	  $key_time[$key] = $value['time'];
	}
	array_multisort ( $key_time , SORT_ASC , $sc_ar );
			
}else{
	$sc_flag = 0;
}

?>
<?php
//DB切断
db_close($con);
?>
<?php $tittle = "埼玉　蕨駅徒歩20秒メンズエステ　アロハーマン（AroHerman）";?>
<?php $description = "蕨駅徒歩20秒のALL日本人セラピストの埼玉メンズエステ、アロハーマン（AroHerman）は日本人の美女によるメンズエステです。";?>
<?php $kw = "埼玉,蕨,メンズエステ,日本人,アロハーマン,癒し,Aroherman,マッサージ,アロマ,求人,リラクゼーション";?>
<?php $h1tag = "蕨のメンズエステ アロハーマン";?>
<?php $h2tag = "埼玉県蕨のメンズエステ「アロハーマン」はオール日本人セラピストのリラクゼーションエステ";?>
<?php $bodyclass = "top";?>
<?php $mainclass = "top";?>
<?php //include 'inc_ver2/header.php' ;?>
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
<!--FLASH 画像-->
		<div id="slideshow">
			<div class="wrapper"> 
				<div id="slide" class="topimage clearfix">
					<div class="flashimg"><img src="img/newtopimg01.jpg" alt="アロママッサージ" ></div>　
					<div class="flashimg"><img src="img/newtopimg02.jpg" alt="美人でスリム" ></div>
					<div class="flashimg"><a href="recruit/"><img src="img/newtopimg03.jpg" alt="癒しのアロママッサージ" ></a></div>
				</div>				
			</div><!--wrapper end-->	
		</div><!--slideshow end-->
 <!--FLASH 画像 終わり-->	
		<nav class="disppc head">
			<div class="wrapper">
				<ul id="nav">
					<li><a href="<?php echo $baseurl ;?>_ver2.php">HOME<span>ホーム</span></a></li>
					<li><a href="<?php echo $baseurl ;?>system/_ver2.php">System<span>システム</span></a></li>
					<li><a href="<?php echo $baseurl ;?>therapist/_ver2.php">Therapist<span>セラピスト</span></a></li>
					<li><a href="<?php echo $baseurl ;?>schedule/_ver2.php">Schedule<span>スケジュール</span></a></li>
					<li><a href="<?php echo $baseurl ;?>accesse/_ver2.php">Access<span>アクセス</span></a></li>
					<li><a href="<?php echo $baseurl ;?>recruit/_ver2.php">Recruit<span>リクルート</span></a></li>
				</ul>
			</div><!--wrapper end-->
		</nav>
	</div><!--topcontent end-->
        <div id="content">        	
        	<main>
				<section class="backblock tw1back">
					<div class="wrapper">
						<div class="twitterblock">
							<h3>What's New<span>新着情報</span></h3>
							<a class="twitter-timeline" data-height="420" data-width="100%" data-chrome="noheader nofooter" href="https://twitter.com/AroHerman2017">Tweets by AroHerman2017</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
						</div>
					</div><!--wrapper end-->
				</section><!--back end-->
				<section class="backblock scheduleback">
					<div class="wrapper">
						<div class="todaybox">
							<h3>Today's Schedule<span>本日の出勤情報</span></h3>
							<div class="todayblock clearfix">
								<?php
									if($sc_flag == 0){
										echo '<p></p>';
									}else{
										$id_count = 0;
										foreach($sc_ar as $val){
											//for($num_rows=0;$num_rows < $max_num;$num_rows++){
												$id_num = array_search($val['id'],$therapist_idlist);
												//if($therapist_info[$num_rows]['therapist_id'] == $val["id"]){	
													if($therapist_info[$id_num]['koukai_flg'] ==0){									
														echo '<div class="therapistblock">';
															echo '<div class="imgblock">';	
																echo '<a href="therapist/cast_ver2.php?id='.$therapist_info[$id_num]['therapist_id'].'">';
																$img_name = $therapist_info[$id_num]['thum'];	
																echo '<img src="images/therapist/'.$img_name.'" alt="'.$therapist_info[$id_num]['name'].'"/>';
																echo '</a>';
																if($therapist_info[$id_num]['pickup_flag'] == 1){
																	echo '<img class="ico2" src="newimg/ic_osusume.png">';
																}
																if($therapist_info[$id_num]['newface'] == 0){
																	echo '<img alt="newface" class="ico1 new_ic" src="newimg/ic_newface.png">';
																}
															echo '</div>';	
															echo '<a href="therapist/cast.php?id='.$therapist_info[$id_num]['therapist_id'].'">';
															echo $therapist_info[$id_num]['name'];
															echo '</a>'.'<br>';
															echo '年齢：'.$therapist_info[$id_num]['age'].'<br>';
															echo '身長：'.$therapist_info[$id_num]['height'].'<br>';
															echo 'B：'.$therapist_info[$id_num]['bust'].' W：'.$therapist_info[$id_num]['waste'].' H：'.$therapist_info[$id_num]['hip'].'<br>';
															echo '出勤時間：'.$val["time"];
															echo '<div class="snsico">';
															if($therapist_info[$id_num]['blog'] != ""){
																echo '<a class="blog" href="'.$therapist_info[$id_num]['blog'].'" target="_blank" rel="nofollow">';
																echo '<img src="newimg/ic_blog.png" alt="蕨メンズエステのアロハーマンのセラピスト'.$therapist_info[$id_num]['name'].'のブログはこちら">';
																echo '</a>';
															}
																if($therapist_info[$id_num]['twitter'] != ""){
																echo '<a class="tw" href="'.$therapist_info[$id_num]['twitter'].'" target="_blank" rel="nofollow">';
																echo '<img src="newimg/ic_tw.png" alt="蕨メンズエステのアロハーマンのセラピスト'.$therapist_info[$id_num]['name'].'のTwitterはこちら">';
																echo '</a>';
															}
															echo '</div>';
														echo '</div>';
													}
												//}
											//}
											$id_count++;
										}
									}
								?>
							</div><!--block end-->
						</div><!--box end->
					</div><!--wrapper end-->
				</section><!--back end-->
				<section class="backblock movieback">
					<div class="wrapper">
						<div class="moviebox">
							<h3>Movie<span>施術動画</span></h3>
							<div class="movieblock">								
								<video id="movie01" poster="movie/movie_thumb.jpg" src="movie/movie.mp4" controls width="100%" height="auto"></video>
							</div>
						</div><!--box end-->
					</div><!--wrapper end-->
				</section><!--section end-->
        		<section class="backblock roomback">
					<div class="wrapper">
						<div class="roombox">
							<h3>Room<span>ルーム</span></h3>
							<div class="roomblock">								
								<div class="photoblock bl01"><a href="newimg/photo01.jpg" data-lightbox="group01"><img src="newimg/photo01.jpg" alt="玄関"></a><p>玄関</p></div>
								<div class="photoblock bl02"><a href="newimg/photo02.jpg" data-lightbox="group01"><img src="newimg/photo02.jpg" alt="店内施術室画像"></a><p>施術室</p></div>
								<div class="photoblock bl03"><a href="newimg/photo03.jpg" data-lightbox="group01"><img src="newimg/photo03.jpg" alt="店内施術室画像"></a><p>施術室</p></div>
							</div>
						</div><!--box end-->
					</div><!--wrapper end-->
				</section><!--section end-->
				<section class="backblock tw2back">
					<div class="wrapper">
						<div class="twitterblock">
							<h3>Therapist Twitter<span>セラピストツイッター</span></h3>
							<a class="twitter-timeline" data-height="420" data-width="100%" data-chrome="noheader nofooter" href="https://twitter.com/AroHerman2017">Tweets by AroHerman2017</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
						</div>
					</div><!--wrapper end-->
				</section><!--back end-->
				<section class="backblock infobtback">
					<div class="wrapper">
						<div class="infomationbox">
							<h3>Infomation<span>お知らせ</span></h3>
							<div class="infomationblock">
								<div class="btbox"><img src="newimg/bnr_credit.jpg" alt="クレジット決済OK"></div>
								<div class="btbox"><a href="news/_ver2.php"><img src="newimg/bnr_news.jpg" alt="新着情報はこちら"></a></div>
								<div class="btbox"><a href="recruit/_ver2.php"><img src="newimg/bnr_recruit.jpg" alt="求人情報のご紹介"></a></div>
								<div class="btbox"><a href="http://line.me/ti/p/6ugU4M1HSF" target="_blank" rel="nofollow"><img src="newimg/bnr_line.jpg" alt="LINE登録はこちら"></a></div>
								<div class="btbox"><a href="https://www.instagram.com/aroherman0516/" target="_blank" rel="nofollow"><img src="newimg/bnr_insta.jpg" alt="インスタはこちら"></a></div>
							</div>
						</div>
					</div><!--wrapper end-->
				</section><!--back end-->
				<section class="backblock linkback">
					<div class="wrapper">
						<div class="linkbox">
							<div class="linkblock">
								<div class="linkbtbox">
									<a href="https://www.jooo.live/" target="_blank"><img src="https://www.jooo.live/img/banner1.jpg" style="max-width:100%;height:auto;" alt="メンズエステ・セラピスト " /> <br /> Twitter特化型セラピスト検索サイト</a>
								</div>
								<div class="linkbtbox">
									<a class="" href="https://mens-mg.com/" target="_blank" title="メンズエステマガジン"><img src="https://mens-mg.com/banner/234x60.png" width="230" alt="メンズエステマガジン"><br>メンズエステマガジン</a>	
								</div>
							</div>
						</div>				
					</div><!--wrapper end-->
				</section><!--back end-->
		    </main><!--maincontent end-->
      </div><!--content end-->
	<footer>
		<div class="wrapper">
			<nav class="footnav">
				<ul>
					<li><a href="<?php echo $baseurl ;?>_ver2.php">アロハーマン</a></li>
					<li><a href="<?php echo $baseurl ;?>system/_ver2.php">システム</a></li>
					<li><a href="<?php echo $baseurl ;?>therapist/_ver2.php">セラピスト</a></li>
					<li><a href="<?php echo $baseurl ;?>schedule/_ver2.php">スケジュール</a></li>
					<li><a href="<?php echo $baseurl ;?>accesse/_ver2.php">アクセス</a></li>
					<li><a href="<?php echo $baseurl ;?>recruit/_ver2.php">リクルート</a></li>
				</ul>
			</nav>
		</div><!--wrapper end-->
		<p class="notice">AroHerman 電話番号：<?php echo $tel;?> 営業時間：12時～翌朝6時 年中無休 当店は風俗店ではありません。</p>
		<p id="copyright">Copyright© アロハーマン(AroHerman) All Rights Reserved.</p>
    </footer>
<div id="footinfomation" class="clearfix">
					<a class="tel" href="tel:<?php echo $tel;?>"><i class="fas fa-mobile-alt"></i>tel.<?php echo $tel;?></a>
					<span class="time">営業時間12:00～翌朝6:00 受付時間11:30～翌朝5:00</span>
					<a class="totop" href="#"><i class="fas fa-angle-double-up fa-2x"></i></a>
			</div>
<div class="menu-icon">
		<div class="open openbt dispsp menu-icon-container">
			<i class="fas fa-bars fa-2x"></i>
		</div>
	</div>
<div id="menu">
			<a href="tel:<?php echo $tel;?>"><?php echo $tel;?></a>
        	<a href="<?php echo $baseurl ;?>_ver2.php">アロハーマン</a>
			<a href="<?php echo $baseurl ;?>system/_ver2.php">システム料金</a>
			<a href="<?php echo $baseurl ;?>therapist/_ver2.php">セラピスト</a>
            <a href="<?php echo $baseurl ;?>schedule/_ver2.php">出勤情報</a>
            <a href="<?php echo $baseurl ;?>accesse/_ver2.php">アクセス</a>
            <a href="<?php echo $baseurl ;?>recruit/_ver2.php">求人情報</a>
            <a href="<?php echo $baseurl ;?>news/_ver2.php">新着情報</a>
            <a class="dispsp open close">◀ 閉じる</a>            
        </div>
</body>
</html>