<?php
error_reporting(0);
$q=$_POST['wd'];
//echo $q;
$seach=file_get_contents('http://so.360kan.com/index.php?kw='.$q);
//print_r($seach);
$szz='#js-playicon" title="(.*?)"\s*data#';
$szz1='#a href="(.*?)" class="g-playicon js-playicon"#';
$szz2='#<img src="(.*?)" alt="(.*?)" \/>[\s\S]+?</a>\n</div>#';
$szz3='#(<b>(.*?)</b><span>(.*?)</span></li></ul>)?<ul class="index-(.*?)-ul g-clear">(\n\s*)?<li>(\n\s*)?<b>类型：</b>(\n\s*)?<span>(.*?)</span>#';
$szz4='#<span class="playtype">(.*?)</span>#';
preg_match_all($szz, $seach,$sarr);//$sarr 的1为名字
preg_match_all($szz1, $seach,$sarr1);//$sarr1 的1为详情链接
preg_match_all($szz2, $seach,$sarr2);//sarr2的1为图片
preg_match_all($szz3, $seach,$sarr3);//sarr2的3为剧集
preg_match_all($szz4, $seach,$sarr4);//sarr2的3为剧集
$one=$sarr[1];
$two=$sarr2[1];
$three=$sarr3[3];
$si=$sarr1[1];
$wu=$sarr4[1];
//print_r($sarr2);
?>
<?php
include ('./inc/aik.config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="cache-control" content="no-siteapp">
<title>追热剧-最新电视剧-好看电视剧-最新电视剧排行-<?php echo $aik['title'];?></title>
<link rel='stylesheet' id='main-css'  href='css/style.css' type='text/css' media='all' />
<link rel='stylesheet' id='main-css'  href='css/tv.css' type='text/css' media='all' />
<script type='text/javascript' src='http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js?ver=0.5'></script>
<meta name="keywords" content="追热剧-最新电视剧-好看电视剧-最新电视剧排行">
<meta name="description" content="<?php echo $aik['title'];?>-追热剧-最新电视剧-好看电视剧-最新电视剧排行">
<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->
</head>
<body class="page-template page-template-pages page-template-posts-tvshow page-template-pagesposts-tvshow-php page page-id-10">
<?php  include 'header.php';?>
<section class="container">
<div style="text-align: center;padding: 10px 0;color: #FF7562;font-size: 12px;">温馨提示:请点击搜索【<?php echo $q?>】结果的标题或封面图进行观看</div>
<div class="m-g">
<div class="b-listtab-main">
<div class="s-tab-main">
<ul class="list g-clear">
<?php foreach ($one as $ni=>$cs){
    $sijm=base64_encode($si[$ni]);
    echo "<li class='item'><a class='js-tongjic' href='./play.php?play=$sijm' title='$cs' target='_blank'>
<div class='cover g-playicon'><img  src='$two[$ni]' alt='$cs' style='display: block;'>
<span class='hint'>$three[$ni]</span> </div>
  <div class='detail'>
 <p class='title g-clear'>
 <span class='s1'>$cs</span>
 <span class='s2'></span> </p>
 <p class='star'>$wu[$ni]</p>
</div>
</a>
</li>
";   
}
?>
  </ul>
      </div>
    </div>
</div> <div class="paging"> <a href="javascript:void(0);">当前第1/1页</a><a>首页</a><a>上一页</a><a>下一页</a><a>尾页</a>
</div>
</div></div>
<div class="asst asst-list-footer"><?php echo $aik['movie_ad'];?></div></section>
<?php  include 'footer.php';?>
</body></html><?php  
/**$feng=$_GET['u'];
$newstr = substr($feng,0,strlen($feng)-1); 
$newstr1=str_replace("&","%26","$newstr");
//echo $newstr1;
$hello = explode('=',$feng); 
$hello1=$hello[2]+1;
$boss="http://localhost/jiexi/demo.php?u=".$newstr1.$hello1;
echo $boss;**/
?>