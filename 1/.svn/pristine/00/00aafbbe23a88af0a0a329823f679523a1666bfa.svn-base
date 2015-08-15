<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("xiaozhaoheader.php")?>
        <div class="container">
			<?php if($item):?>
            <div class="wrapper" style="text-align:left;">
			<div class="content">					
				<div class="job-detail validator-v5">
						<?php if($item['company'] != ' '){?>
						<p class="title">公司信息</p>
						<p><span>公司名称：</span><span><?php echo $item['company']?></span>
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
						<p class="title" style="background-color:white;"><?php echo $item['job']?></p>
						<p><?php echo $item['description']?>
						</p>
						<?php }?>
						<br/><br/>
						<!--p>
						<?php echo form_open_multipart("social/email/".$item['publish_by']); ?>
							<div><input name="email" type="submit" class="button big blue " value="给HR发信"/></div>
						</form>
						</p-->
						<p>
							<span>发布时间：<?php echo $item['publish_time']?></span>
							<span style="margin-left:15px;">浏览次数：<?php echo $count ?></span>
						</p>
                            <br/>
							
							
							
										<p><script type="text/javascript">
    /*960*90 创建于 2014-08-26*/
    var cpro_id = "u1677938";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
</p><br/><br/>


<p>
<script type="text/javascript">
/*960*90，创建于2014-5-27*/
var cpro_id = "u1569320";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
</p>
				</div>
					
			</div>
			<div class="sidebar" style="width:250px;">
                <!--?php echo form_open_multipart("job/searchExp/".$item['company']); ?>
					<div class="plate " style="margin-top:20px;"><input name="findexperience" type="submit" class="button large green " value="查看相关面经"/></div>
				</form>
                <!--?php echo form_open_multipart("job/searchCompany/".$item['company']); ?>
					<div class="plate " style="margin-top:20px;"><input name="findexperience" type="submit" class="button large orange " value="查看其他职位"/></div>
				</form-->
				<!--?php echo form_open_multipart("job/publishjob"); ?>
					<div class="plate " style="margin-top:20px;"><input name="publishjob" type="submit" class="button big orange " value="发布实习"/></div>
				</form>
				<br/><br/-->
				<!--div class="plate ">
				<script type="text/javascript">
/*自定义标签云，创建于2014-5-27*/
var cpro_id = "u1569347";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script></div-->
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
