<?php
//以下代码为PHP核心代码 如若不明 请勿修改
error_reporting(0);
header('Content-type:text/html;charset=utf-8');

include './inc/config.php';
$page=$_GET['page'];
$page1=$_GET['page']+=1;
$page2=$_GET['page']-1;
$pageurl = $host.'/?page='.$page1;
$pageurl1 = $host.'/?page='.$page2;
$info=file_get_contents('http://www.360kan.com/dianying/list.php?rank=rankhot&cat=all&area=all&act=all&year=all&pageno='.$page1);
//print_r($info);
define('360', 'www.360kan.com');//域名
$yuming="http://www.360kan.com";
$vname='#<span class="s1">(.*?)</span>#';//取出电影的名字
$fname='#<span class="s2">(.*?)</span>#';//取出电影的评分
$nname='#<span class="hint">(.*?)</span>#';//取出电影的年份
$vlist='#<a class="js-tongjic" href="(.*?)">#';//取出电影的详情列表
$vstar='# <p class="star">(.*?)</p>#';//取出电影的主演
$vimg='#<div class="cover g-playicon">
                                <img src="(.*?)">
#';
$bflist='#<a data-daochu(.*?) href="(.*?)" class="js-site-btn btn btn-play"></a>#';
$array = array();

preg_match_all($vname, $info,$namearr);
preg_match_all($vlist, $info,$listarr);
preg_match_all($vstar, $info,$stararr);
preg_match_all($vimg, $info,$imgarr);
preg_match_all($fname, $info,$fnamearr);
preg_match_all($nname, $info,$nnamearr);
foreach ($namearr[1] as $key => $value)
{
 
    
    $gul=$yuming.$listarr[1][$key];//取出播放链接
    $cd=$host.'/alist.php?id='.$gul;
    $guq=$listarr[1][$key];
    $_GET['id']=$gul;

    $zimg=$imgarr[1][$key];//取出图片链接
    $zname=$namearr[1][$key];//取出影片名字
    $fname=$fnamearr[1][$key];//取出影片评分
	$nname=$nnamearr[1][$key];//取出影片评分
    $zstar=$stararr[1][$key];
    $jiami=base64_encode($gul);
  
    $chuandi=$host.'/inc/b.php?id='.$jiami;
    
}