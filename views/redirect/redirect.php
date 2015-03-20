<?php
\repkit\url\RedirectAsset::register($this);
?>
<div class="redirect">
   <div class="left">
   	 
   </div>

   <div class="right">
   	   <h2><span>提示信息</span></h2>
	   <p><?= $msg ?></p>
	   <div>系统稍后将在<span id="wait"><?= $wait ?></span>秒后自动跳转,如果您的浏览器没有自动跳转请 <a href="<?= $url ?>">点击这里</a></div>
   </div>
</div><!-- redirect -->