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
	            	<a href="<?php echo site_url()?>/bbs/index">论坛首页</a> &gt; 正文
	            </div>
				<div class="bbs_bg topic_detail">
            		<h1><?php echo $topic['title'] ?></h1>
            		<div>
            			<span class="c7"><?php echo $topic['publish_by_name'] ?></span>&nbsp;&middot;&nbsp;
						<span class="c9"><?php echo date("Y-m-d",strtotime($topic['publish_time']))?> </span>
            			<input type="hidden" id="postId" value="" /> 
            		</div><br/>
            		<p><?php echo $topic['content'] ?></p>
					<div class="job-detail validator-v5" style="margin-left:0;">
						<p class="title">全部评论</p>
					</div>
	            <div id="replyDiv">
					<ul class="reset">
						<?php $i=1; foreach($replies as $reply){
							?>
						<li>
							<h3><?php echo $reply['content'] ?></h3>
							<span class="fr c7"><i><?php echo $i++;?></i>楼&nbsp;&nbsp;</span>
							<div style="float:right;">
					            <span class="c7 username"><?php echo $reply['publish_by_name'] ?></span>&nbsp;&middot;&nbsp;
								<span class="c9"><?php echo date("Y-m-d",strtotime($reply['publish_time']))?> </span>
					            <!--a href="javascript:void(0)" class="reply reply_floor">回复</a-->
					
					            <!--a class="like likeReply">喜欢（<i>0</i>）</a-->
					            <input type="hidden" value="" /> 
					         </div>
						</li>
						<?php } ?>
					</ul>
				</div>
				<?php echo form_open_multipart("bbs/addReply"); ?>	
				<input type="hidden" name="topic_id" value="<?php echo $topic['id']?>" /> 				
					<div class="job-detail validator-v5" style="margin-left:0; margin-top:8px;">
						<p>
							<span><textarea name="content" type="textarea" rows="20" cols="48" class="select-tarea" style="width:100%;"></textarea></span>
						</p>
						<div  style="margin-left:270px; margin-top:5px;"><input name="replypublish" type="submit" class="button big green " value="发表评论"/></div>
					</div>
					
					</form>

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