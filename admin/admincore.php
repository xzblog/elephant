<?php
//ads
if(isset($_GET['act']) && $_GET['act']=='ads' &&isset($_POST['edit']) && $_POST['edit']==1){
	$datas = $_POST;
	$data = $datas['ads'];
    if(!isset($data['search'])){
		$data['search'] = $data['search'];
	}	
	$data['end_ad'] = htmlspecialchars_decode($data['end_ad']);
	if (get_magic_quotes_gpc()) {
		$data['end_ad'] = stripslashes($data['end_ad']);
	}
	$data['top_ad'] = htmlspecialchars_decode($data['top_ad']);
	if (get_magic_quotes_gpc()) {
		$data['top_ad'] = stripslashes($data['top_ad']);
	}
	if(file_put_contents('../data/aik.ads.php',"<?php\n \$ads =  ".var_export($data,true).";\n?>")){
		$tips = '<span class="green" style="font-size:18px; margin-bottom:15px; display:block;">修改成功！</span>';
	}else{
		$tips = '<span class="red" style="font-size:18px; margin-bottom:15px;display:block;">修改失败！可能是文件权限问题，请给予data/aik.ads.php写入权限</span>';
	}	
     $ads = $data;
}
//setting
if( isset($_GET['act']) && $_GET['act']=='setting' && isset($_POST['edit']) && $_POST['edit']==1){
	$datas = $_POST;
	$data = $datas['aik'];
	$data['description'] = strip_tags($data['description']);
	$data['foot'] = htmlspecialchars_decode($data['foot']);
	if (get_magic_quotes_gpc()) {
		$data['foot'] = stripslashes($data['foot']);
	}
	$data['hometopnotice'] = htmlspecialchars_decode($data['hometopnotice']);
	if (get_magic_quotes_gpc()) {
		$data['hometopnotice'] = stripslashes($data['hometopnotice']);
	}
	$data['hometopright'] = htmlspecialchars_decode($data['hometopright']);
	if (get_magic_quotes_gpc()) {
		$data['hometopright'] = stripslashes($data['hometopright']);
	}
	$data['homelink'] = htmlspecialchars_decode($data['homelink']);
	if (get_magic_quotes_gpc()) {
		$data['homelink'] = stripslashes($data['homelink']);
	}
	$data['sort'] = trim($data['sort'],',');
	if($data['sort']==''){
	   $data['sort'] = '1,2,3,4,5,6,7,8,9,10';	
	}
    if(!isset($datas['aik']['joinhotkey'])){
		$data['joinhotkey']='0';
	}
	if($data['admin_pass']==''){
		$data['admin_pass'] = $aik['admin_pass'];
	}else{
	    $data['admin_pass'] = md5ff(htmlspecialchars($data['admin_pass']));	
	}
	if(file_put_contents('../inc/aik.config.php',"<?php\n \$aik =  ".var_export($data,true).";\n?>")){
		$tips = '<span class="green" style="font-size:18px; margin-bottom:15px; display:block;">修改成功！</span>';
	}else{
		$tips = '<span class="red" style="font-size:18px; margin-bottom:15px;display:block;">修改失败！可能是文件权限问题，请给予inc/aik.config.php写入权限</span>';
	}	
     $aik = $data;
} 
//循环目录下的所有文件  
function deleteAll($path) {
    $op = dir($path);
    while(false != ($item = $op->read())) {
        if($item == '.' || $item == '..') {
            continue;
        }
        if(is_dir($op->path.'/'.$item)) {
            deleteAll($op->path.'/'.$item);
            rmdir($op->path.'/'.$item);
        } else {
            unlink($op->path.'/'.$item);
        }
    }   
echo '<span style="font-size:22px; color:green">清除完毕！</span>';
closedir( $op );  
}
?>