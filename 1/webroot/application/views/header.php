
 <head>
     <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
		<!--script type="text/javascript" src="<?php echo base_url()?>/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>/js/unslider.js"></script-->
		
<!--script>
	function SetChannel()
	{
		var url = window.location.href;
		var idx;
		if(url.indexOf('summer') != -1)
		{
			idx = 2;
			document.getElementById( "channel2" ).style.backgroundColor ="#4E8F3E";
		}
		else if(url.indexOf('recommend') != -1)
		{
			idx = 3;
			document.getElementById( "channel3").style.backgroundColor ="#4E8F3E";
		}
		else if(url.indexOf('bbs') != -1)
		{
			idx = 4;
			document.getElementById( "channel4").style.backgroundColor ="#4E8F3E";
		}
		else if(url.indexOf('parttime') != -1)
		{
			idx = 5;
			document.getElementById( "channel5").style.backgroundColor ="#4E8F3E";
		}
		else
		{
			idx = 1;
			document.getElementById( "channel1").style.backgroundColor ="#4E8F3E";
		}
		
		for(i = 1; i < 6; ++i)
		{
			if(i != idx)
				document.getElementById( "channel"+i).style.backgroundColor ="#0066CC";
		}
	}
	
	window.onload=SetChannel;

</script-->
</head>
		
<?php 
	$user = $this->session->userdata("user");
	$uid = $this->session->userdata("uid");			
?>
		
<?php
	if(!isset($_SESSION)){ 
		session_start();
	}
	include_once('config.php' );
	include_once('saetv2.ex.class.php' );
	$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
	$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
?>		
				
       <div class="header" style="height:80px;width:100%;">
			<div style="width:1200px; margin-left:auto; margin-right:auto;">
				
			<div class="sitelogo"><a href="<?php echo site_url();?>"><img src="<?php echo base_url()?>/images/logo2.png" /></a></div>
				
			<div style="float:left;">
			<ul class="navi" style="height:80px; width:auto;">
                <li><a href="<?php echo base_url()?>" id="channel1">实习职位</a><span class="arrow"></span>
				<span style="color:red; font-size:12px;margin-left:110px;top: 50%;margin-top: -40px;position: absolute;">new</span>
					<ul style="margin-left:-40px;">
						<li><a href="<?php echo site_url()?>/job/searchCategory/1">研发&测试</a></li>
						<li><a href="<?php echo site_url()?>/job/searchCategory/2">产品&设计</a></li>
						<li><a href="<?php echo site_url()?>/job/searchCategory/3">运营&市场</a></li>
						<li><a href="<?php echo site_url()?>/job/searchCategory/4">行政&管理</a></li>
						<li><a href="<?php echo site_url()?>/job/searchCategory/5">金融&财务</a></li>
					</ul>
				</li>
			
				<li>
					<a href="<?php echo site_url()?>/job/summer" id="channel2">暑期专场</a>
					<span style="color:red; font-size:12px;margin-left:100px;top: 50%;margin-top: -40px;position: absolute;">Hot</span>
				</li>
				<li>
					<a href="<?php echo site_url()?>/job/recommend" id="channel3">内推专场</a>
					<span style="color:red; font-size:12px;margin-left:100px;top: 50%;margin-top: -40px;position: absolute;">Hot</span>
				</li>
				<li><a href="<?php echo site_url()?>/bbs/index" id="channel4">交流论坛</a></li>
				<!--li><a href="<?php echo site_url()?>/rencai/index">LinkedIn人才库</a></li-->
				<li><a href="<?php echo site_url()?>/parttime/index" target="_blank" id="channel5">兼职频道</a></li>
				<li><a href="<?php echo site_url()?>/xiaozhao/index" target="_blank" id="channel5">校招频道</a></li>
				
				<!--li><a href="<?php echo site_url()?>/job/experiences">趣闻面经</a></li-->
				<!--li><a href="<?php echo site_url()?>/social/browse">结伴而行</a></li-->				
				<!--li><a href="<?php echo site_url()?>/job/about">关于我们</a></li-->				            
               <!--li><wb:follow-button uid="3909281223" type="red_1" width="67" height="24" ></wb:follow-button></li-->
			</ul>
			</div>
			
			<div style="float:right; height:80px; line-height:80px;">
				<?php if(!$user){?> 		
				<span><a  href="<?php echo $code_url?>"><img src="<?php echo base_url()?>/images/weibo2.png"/></a></span>				
				<span style="margin-left:10px;"><a style="color:white;" href="<?php echo site_url()?>/user/login">登陆</a></span>
				<span style="margin-left:20px;"><a style="color:white;" href="<?php echo site_url()?>/user/register">注册</a></span>		
                <?php }?>
				               
				 <?php 
				if($user) { 
				?>
				<span><a style="color:white;" href="<?php echo site_url().'/user/account/'.$uid ?>"><?php echo $user; ?></a></span>
				<span style="margin-left:20px;"><a style="color:white;" href="<?php echo site_url()?>/user/logout">注销</a></span>
				<?php }?>
			</div>
			</div>
			</div>
            <div style="clear:both;"></div>
			<!-- JiaThis Button BEGIN -->
			<!--script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?uid=1383744771011656&move=0&amp;btn=r1.gif" charset="utf-8"></script-->
			<!-- JiaThis Button END -->
		</div>
