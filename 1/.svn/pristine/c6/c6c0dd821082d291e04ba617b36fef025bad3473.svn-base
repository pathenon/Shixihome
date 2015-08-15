<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("header.php")?>
        <div class="container">
		<div class="wrapper">
			<div class="content_l">
				<div class="breadcrumb">
					<a style="float:right" href="<?php echo site_url()?>/bbs/publishtopic" class="topic_create">发表新话题</a>
	            </div>
	            <div id="bbsList" style="margin-top:50px;">
	            	<ul class="reset bbs_list">
						<?php foreach($topics as $topic){?>
		            	<li>
		            		<input type="hidden" name="id" value="3962" /> 
							<div style="float:left; margin-right:15px;"><img src="<?php echo $topic['publish_avatar']?>" style="max-width:50px;_width:expression(this.width > 50 ? "50px" : this.width);"/></div>
		            		<div class="bbs_list_l">
		            			<a href="<?php echo site_url().'/bbs/gettopic/'.$topic['id']?>" class="topic">
		            					<?php echo $topic['title']?>
		            			</a>
								<p style="line-height: 25px;font-size: 14px;"><?php echo mb_substr(strip_tags($topic['content']), 0 , 100, "utf-8")."...";?></p>
								<span class="c7"><?php echo $topic['publish_by_name']?></span>&nbsp;&middot;&nbsp;
								<span class="c9"><?php echo date("Y-m-d",strtotime($topic['publish_time']))?></span>
		            		</div>
		            		<a href="<?php echo site_url().'/bbs/gettopic/'.$topic['id']?>" class="count"><?php echo $topic['reply_count']."/".$topic['browse_count']?></a>
		            	</li>
						<?php }?>
					</ul>
				</div>
				
				<div class="nextpage">
					<ul class="pager">
					<?php if(! (int)$firstpage):?>
						<li><a href="<?php echo site_url().'/bbs/page/'.$pagecount.'/'.strval($page-1) ?>">&larr;上一页</a></li>
					<?php endif?>
					<?php if((int)$page < (int)$pagecount):?>
						<li><a href="<?php echo site_url().'/bbs/page/'.$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
					<?php endif?>
						<li><?php echo "第 ".$page." 页&nbsp;&nbsp;&nbsp;&nbsp;";?></li>
						<li><?php echo "共 ".$pagecount." 页";?></li>
					</ul>
				</div>

			</div>

			 <!--div class="sidebar">
					<div class="plate "><img src="<?php echo base_url()?>/images/qrcode.gif"/></div><br/>

                </div-->
                <div style="clear:both;"></div>
		</div>
		</div>
		<?php require("footer.php") ?>
		<?php require("stat.php");?>
</body>
</html>