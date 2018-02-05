<?php
error_reporting(0);
$list=file_get_contents('http://www.360kan.com/dianshi/list');//电视剧页面
$list1=file_get_contents('http://www.360kan.com/dianying/list.php');//电视剧页面
$lzz='#<a class="js-tongjip" href="http://www.360kan.com/dianshi/list\?year=all\&area\=all\&act\=all\&cat\=(.*?)" target="_self">(.*?)</a>#';
$lzzmv='#<a class="js-tongjip" href="http://www.360kan.com/dianying/list.php\?year=all\&area=all\&act=all\&cat=(.*?)" target="_self">(.*?)</a>#';
//剧情
$lzz1='# <a class="js-tongjip" href="http://www.360kan.com/dianshi/list\?cat\=all\&area=all\&act\=all\&year\=(.*?)" target="_self">(.*?)</a>#';
//年代
$lzz2='#<a class="js-tongjip" href="http://www.360kan.com/dianshi/list\?cat\=all\&year\=all\&act\=all\&area\=(.*?)" target="_self">(.*?)</a>#';
//地区
preg_match_all($lzz, $list,$larr);//剧情  
preg_match_all($lzz1, $list,$larr1);//年代
preg_match_all($lzz2, $list,$larr2);//地区
preg_match_all($lzzmv, $list1,$larrmv);//剧情  
$cat=$larr[1];//剧情分类id
$mcat=$larrmv[1];
//print_r($larrmv);
$mname=$larrmv[2];
$cat1=$larr1[1];//年代id
$cat2=$larr2[1];//地区id
$name=$larr[2];//分类名字
//echo http_build_query($larr1[1]);
//print_r($larr);
//以上为电视剧


