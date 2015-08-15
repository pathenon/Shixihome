<html>
<?php require("apptitle.php");?>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"1","bdPos":"right","bdTop":"100"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<body>
<div class="wrapper">
	<div class="job-head-bar">
		<div style="float:left;"><a href="http://www.upandi.com/index.php/job/appindex"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a></div>
		<div style="margin-left:90%;"><a href="http://www.upandi.com/index.php/job/appdetail/<?php echo $item['id']?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a></div>
	</div>
	<div class="job-detail">
		<?php if($item['company'] != ' '){?>
		<div class="title"><?php echo mb_substr(strip_tags($item['company'].'-'.$item['job']), 0, 20, "utf-8");?></div>
		<div class="meta">
				<span class="glyphicon glyphicon-time" aria-hidden="true"></span><span style="margin-left:10px;color:grey;">发布时间：<?php echo $item['publish_time']?></span>
				<span class="glyphicon glyphicon-eye-open" style="margin-left:30px;" aria-hidden="true"></span><span style="margin-left:10px;color:grey;">浏览次数：<?php $tt= ceil((time()-strtotime($item['publish_time']))/60/60); if($tt > 24) $tt=24; echo $count+ $tt*10;?></span>
		</div>
		<div class="content">
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
		</div>
		<?php }?>
		
		
		<?php if($item['company'] == ' '){?>
			<div class="title"><?php echo mb_substr(strip_tags($item['job']), 0, 20, "utf-8");?></div>
			<div class="meta">
				<span class="glyphicon glyphicon-time" aria-hidden="true"></span><span style="margin-left:10px;color:grey;">发布时间：<?php echo $item['publish_time']?></span>
				<span class="glyphicon glyphicon-eye-open" style="margin-left:30px;" aria-hidden="true"></span><span style="margin-left:10px;color:grey;">浏览次数：<?php $tt= ceil((time()-strtotime($item['publish_time']))/60/60); if($tt > 24) $tt=24; echo $count+ $tt*10;?></span>
			</div>
			<div class="content"><?php echo $item['description']?></div>
		<?php }?>
		<br/>
		<!--p>
		<?php echo form_open_multipart("social/email/".$item['publish_by']); ?>
			<div><input name="email" type="submit" class="button big blue " value="给HR发信"/></div>
		</form>
		</p-->
		<p style="color:red;">投递简历时，请注明在实习之家看到该招聘信息。</p><br/>
		
		<!--p> <script type="text/javascript">
			/*20:3 创建于 2015-04-09*/
			var cpro_id = "u2036504";
			</script>
			<script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script>
		</p-->
</div>
<?php require("stat.php");?>
</body>
</html>
