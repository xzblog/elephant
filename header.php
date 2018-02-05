<?php
include ('./inc/aik.config.php');
?>
<header class="header">
	<div class="container">
		<h1 class="logo"><a href="<?php echo $aik['pcdomain'];?>" title="<?php echo $aik['keywords'];?>"><?php echo $aik['logo_dh'];?><span><?php echo $aik['title'];?></span></a></h1>		<div class="sitenav">
		<ul><li id="menu-item-18" class="menu-item"><a href="/">首页</a>
</li>
<li id="menu-item-27" class="menu-item"><a href="./movie.php?m=http://www.360kan.com/dianying/list.php?cat=all%26pageno=1">电影</a></li>
<li id="menu-item-31" class="menu-item"><a href="./tv.php?u=http://www.360kan.com/dianshi/list.php?cat=all%26pageno=1">追热剧</a></li>
<li id="menu-item-20" class="menu-item"><a href="./zongyi.php?m=http://www.360kan.com/zongyi/list.php?cat=all%26pageno=1">综艺</a></li>
<li id="menu-item-20" class="menu-item"><a href="./dongman.php?m=http://www.360kan.com/dongman/list.php?cat=all%26pageno=1">动漫</a></li>
<li id="menu-item-20" class="menu-item"><a href="zhibo.php">电视直播</a></li>
</ul>
		</div>
		<span class="sitenav-on"><i class="icon-list"></i></span>
		<span class="sitenav-mask"></span>
					<div class="accounts">
									<a class="account-weixin" href="javascript:;"><i class="fa"></i>
						<div class="account-popover"><div class="account-popover-content"><?php echo $aik['weixin_ad'];?></div></div>
					</a>
					</div>
							<span class="searchstart-on"><i class="icon-search"></i></span>
			<span class="searchstart-off"><i class="icon-search"></i></span>
			<form method="post" class="searchform" action="./seacher.php" >
				<button tabindex="3" class="sbtn" type="submit"><i class="fa"></i></button><input tabindex="2" class="sinput" name="wd" type="text" placeholder="输入关键字" value="">
			</form>
			</div>
</header>