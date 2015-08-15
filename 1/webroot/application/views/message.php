<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("header.php")?>
        <div class="container">
            <div class="wrapper" style="text-align:left;">
			<div class="content">					
				<div class="job-detail validator-v5">
						<p class="title">公司信息</p>
						<p><span>公司名称：</span><span><?php echo $item['company']?></span>
						
						
						</form>
						</p>
						<p class="title">职位信息</p>
						<p><span>职位领域：</span><span><?php echo $item['field']?></span><span style="margin-left:50px;">职位名称：</span><span><?php echo $item['job']?></span></p><br/>
						<p><span>职位描述：</span></p>
						<div><?php echo $item['description']?></div><br/>
						<p><span>职位要求：</span>
						<div><?php echo $item['requirement']?></div><br/>
						<p class="title">联系方式</p>
						<div><span>联系人：</span><span><?php echo $item['person']?></span><span style="margin-left:50px;">联系电话：</span><span><?php echo $item['phone']?></span></div><br/>
						<div><span>邮箱：</span><span><?php echo $item['email']?></span><span style="margin-left:50px;">在线申请：</span><span><?php if($item['online'] != null){?><a href="<?php echo $item['online']?>" target='_blank'>点击</a><?php }?></span></div><br/>
						<div><span>工作地点：</span><span><?php echo $item['place']?></span></div>
						<p class="title">其他信息</p>
						<div><span><?php echo $item['other']?></span></div>
						<br/><br/>
						<p>
							<span>发布时间：<?php echo $item['publish_time']?></span>
							<span style="margin-left:15px;">浏览次数：<?php echo $count ?></span>
						<p>
                            <br/><br/><br/>
				</div>
				
								
				<div>
						<p style="font-size:large; font-weight:bold; color:red;">留言信息：</p>
						<?php if($items != null):?>
						<?php foreach($items as $item):?>
						<div style="float:left; text-align:left;"><?php echo $item['content'];?></div>
						<div style="text-align:right;"><?php echo $item['time'].'<br/>';?></div>
						<div style="clear:both;"></div><br/>
						<?php endforeach?>
						<?php endif?>
				</div>

				<div>
						<?php echo form_open_multipart("job/leavemessage"); ?>
						<span><textarea name="message" type="textarea" rows="10" cols="48" class="select-tarea"><?php if($description != null) echo $description;?></textarea></span>
						<div style="margin-left:300px;"><button type="submit" >我要留言</button></div>
						</form>
				</div>
					
			</div>
			<div class="sidebar">
                <?php echo form_open_multipart("job/searchExp/".$item['company']); ?>
					<div class="plate " style="margin-top:20px;"><input name="findexperience" type="submit" class="button large green " value="查看相关面经"/></div>
				</form>
                <?php echo form_open_multipart("job/searchCompany/".$item['company']); ?>
					<div class="plate " style="margin-top:20px;"><input name="findexperience" type="submit" class="button large orange " value="查看其他职位"/></div>
				</form>
				<?php echo form_open_multipart("job/publishjob"); ?>
					<div class="plate " style="margin-top:20px;"><input name="publishjob" type="submit" class="button large blue " value="发布实习职位"/></div>
				</form>
           </div>
            <div style="clear:both;"></div>
        </div>
</div>

		<?php require("footer.php");?>
		<?php require("stat.php");?>
</body>