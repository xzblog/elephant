<?php
//以下代码为PHP核心代码 如若不明 请勿修改
error_reporting(0);
header('Content-type:text/html;charset=utf-8');

include './inc/config.php';
$page=$_GET['page'];
$page1=$_GET['page']+=1;
$page2=$_GET['page']-1;
$pageurl = $host.'/tv.php?page='.$page1;
$pageurl1 = $host.'/tv.php?page='.$page2;
$info=file_get_contents('http://www.360kan.com/dianshi/list.php?rank=rankhot&cat=all&area=all&act=all&year=all&pageno='.$page1);
//print_r($info);
define('360', 'www.360kan.com');//域名
$yuming="http://www.360kan.com";
$vname='#<span class="s1">(.*?)</span>#';//取出电影的名字
$vlist='#<a class="js-tongjic" href="(.*?)">#';//取出电影的详情列表
$vstar='# <p class="star">(.*?)</p>#';//取出电影的主演
$nname='#<span class="hint">(.*?)</span>#';//取出电影的年份
$vimg='#<div class="cover g-playicon">
                                <img src="(.*?)">
#';//取出电影的封面
$bflist='#<a data-daochu(.*?) href="(.*?)" class="js-site-btn btn btn-play"></a>#';//取电影播放地址
$array = array();
//电影的信息加入数组 开始
preg_match_all($vname, $info,$namearr);
preg_match_all($vlist, $info,$listarr);
preg_match_all($vstar, $info,$stararr);
preg_match_all($vimg, $info,$imgarr);
preg_match_all($nname, $info,$nnamearr);
//print_r($stararr);
foreach ($namearr[1] as $key => $value)
{
    //echo $value . '<br/>';
    
    $gul=$yuming.$listarr[1][$key];//取出播放链接
    $cd=$host.'/alist.php?id='.$gul;
    $guq=$listarr[1][$key];
    $_GET['id']=$gul;
    //echo $guq;
    $zimg=$imgarr[1][$key];//取出图片链接
    $zname=$namearr[1][$key];//取出影片名字
	$nname=$nnamearr[1][$key];//取出影片评分
    $zstar=$stararr[1][$key];
    $jiami=base64_encode($gul);
    //echo $zname;
    //echo $gul;//取出播放链接
    $chuandi=$host.'/inc/b.php?id='.$jiami;
    /**
     echo " <li class='item'>
     <a class='js-tongjic' href='$chuandi'>
     <div class='cover g-playicon'>
     <img src='$zimg'>
     <span class='pay'>超清</span>                                <span class='hint'>2016</span>                            </div>
     <div class='detail'>
     <p class='title g-clear'>
     <span class='s1'>$zname</span>
     <span class='s2'>4.9</span>
     </p>
     <p class='star'>$zstar</p>
     </div>
     </a>
     </li>  ";
     **/
    //以上代码为PHP核心代码 如若不明 请勿修改
}