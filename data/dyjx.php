<?php
//���´���ΪPHP���Ĵ��� �������� �����޸�
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
define('360', 'www.360kan.com');//����
$yuming="http://www.360kan.com";
$vname='#<span class="s1">(.*?)</span>#';//ȡ����Ӱ������
$fname='#<span class="s2">(.*?)</span>#';//ȡ����Ӱ������
$nname='#<span class="hint">(.*?)</span>#';//ȡ����Ӱ�����
$vlist='#<a class="js-tongjic" href="(.*?)">#';//ȡ����Ӱ�������б�
$vstar='# <p class="star">(.*?)</p>#';//ȡ����Ӱ������
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
 
    
    $gul=$yuming.$listarr[1][$key];//ȡ����������
    $cd=$host.'/alist.php?id='.$gul;
    $guq=$listarr[1][$key];
    $_GET['id']=$gul;

    $zimg=$imgarr[1][$key];//ȡ��ͼƬ����
    $zname=$namearr[1][$key];//ȡ��ӰƬ����
    $fname=$fnamearr[1][$key];//ȡ��ӰƬ����
	$nname=$nnamearr[1][$key];//ȡ��ӰƬ����
    $zstar=$stararr[1][$key];
    $jiami=base64_encode($gul);
  
    $chuandi=$host.'/inc/b.php?id='.$jiami;
    
}