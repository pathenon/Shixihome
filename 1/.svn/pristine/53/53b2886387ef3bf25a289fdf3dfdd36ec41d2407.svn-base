<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("header.php")?>
        <div class="container">
			<?php if($item):?>
            <div class="wrapper" style="text-align:left;">
			<div class="content">					
				<div class="job-detail validator-v5">
					<?php if($item['company'] != ' '){?>
					<br/>
					<!--p class="title">公司信息</p-->
					<p><!--span>公司名称：</span--><span style="font-weight:bold;"><?php echo $item['company']?></span></p><br/>
					<p>
						<span class="glyphicon glyphicon-time" aria-hidden="true"></span><span style="margin-left:10px;color:grey;">发布时间：<?php echo $item['publish_time']?></span>
						<span class="glyphicon glyphicon-eye-open" style="margin-left:30px;" aria-hidden="true"></span><span style="margin-left:10px;color:grey;">浏览次数：<?php $tt= ceil((time()-strtotime($item['publish_time']))/60/60); if($tt > 24) $tt=24; echo $count+ $tt*10;?></span>
					</p>
					<p class="title">职位信息</p>
					<p><!--span>职位领域：</span><span><?php echo $item['field']?></span--><span style="margin-left:0px;">职位名称：</span><span><?php echo $item['job']?></span></p><br/>
					<p><span>职位描述：</span></p>
					<div><?php echo $item['description']?></div><br/>
					<p><span>职位要求：</span>
					<div><?php echo $item['requirement']?></div><br/>
					<p class="title">联系方式</p>
					<div><span>联系人：</span><span><?php echo $item['person']?></span><span style="margin-left:50px;">联系电话：</span><span><?php echo $item['phone']?></span></div><br/>
					<div><span>邮箱：</span><span><?php echo $item['email']?></span><span style="margin-left:50px;">在线申请：</span><span><?php if($item['online'] != null && $item['online']!=' '){?><a href="<?php echo $item['online']?>" target='_blank'>点击</a><?php }?></span></div><br/>
					<div><span>工作地点：</span><span><?php echo $item['place']?></span></div>
					<p class="title">其他信息</p>
					<div><span><?php echo $item['other']?></span></div>
					<?php }?>
					
					
					<?php if($item['company'] == ' '){?>
					<p class="title" style="background-color:white;font-size:16px;"><?php echo $item['job']?></p>
					<p>
						<span class="glyphicon glyphicon-time" aria-hidden="true"></span><span style="margin-left:10px;color:grey;">发布时间：<?php echo $item['publish_time']?></span>
						<span class="glyphicon glyphicon-eye-open" style="margin-left:30px;" aria-hidden="true"></span><span style="margin-left:10px;color:grey;">浏览次数：<?php $tt= ceil((time()-strtotime($item['publish_time']))/60/60); if($tt > 24) $tt=24; echo $count+ $tt*10;?></span>
					</p>
					<br/><br/>
					<p><?php echo $item['description']?>
					</p>
					<?php }?>
					<br/>
					<p><span class="glyphicon glyphicon-volume-up" style="zoom:3; color:red;" aria-hidden="true"></span><span style="margin-left:15px; color:red; font-size:18px;">投递简历时，请注明在实习之家看到该招聘信息。</span></p><br/>
					<div style="margin-bottom:30px;padding-bottom: 30px;">
						<div style="float:left;font-size: 20px;margin-right: 10px; padding-top:8px;">分享到:</div>
						<div class="bdsharebuttonbox" style="float:left;"><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
						<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
						<div style="float:none;"></div>
					</div>
				</div>			
			</div>
			<div class="sidebar" style="width:250px;">
					<div class="bannertip" style="border-bottom: 1px solid rgb(153, 204, 1);">
						<span class ="title" style="background: rgb(153, 204, 1); ">猜你喜欢</span>
					</div>
				<?php  for($i = 0; $i < count($recommend); ++$i){
					$rec = $recommend[$i];
				?>
				<div style="margin-top:20px;">
					<div class="bighead"><img src="<?php echo base_url().'/images/h'.rand(1, 14).'.jpg'?>"/></div>
					<div class="rec_job_title"><a href="<?php echo site_url()?>/job/detail/<?php echo $rec['id'];?>", target="_blank"><?php echo mb_substr(strip_tags($rec['job']), 0, 15, "utf-8");?></a></div>				
				</div>
				<?php }?>
           </div>
            <div style="clear:both;"></div>
        </div>
		<?php endif?>
		<?php if(!$item):?>
			<br/><br/><br/><br/><br/><br/><br/>
			<span style="width:100%; margin-left:300px;">对不起，找不到相关信息。</span>
		<?php endif ?>
</div>

		<?php require("footer.php");?>
		<?php require("stat.php");?>
</body>
</html>
