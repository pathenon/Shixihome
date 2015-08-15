<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("header.php")?>
        <div class="container2">
            <div class="wrapper" style="text-align:left;">
			<div class="content2">					
				<div class="job-detail validator-v5">
					<!--p class="title">正在找实习的小伙伴</p-->
						<?php foreach($c1 as $item):?>
						<div style="float:left; width:160px; text-align:center; margin-bottom:30px; padding-bottom:20px; border-bottom:1px dashed grey;">
							<div class="internhead">
							<?php if(strpos($item["avatar"], 'http') === false){?>
								<img src="<?php echo base_url().$item["avatar"]?>"/>
							<?php }else{?>
							<img src="<?php echo $item["avatar"]?>"/>
							<?php }?>
							</div>
							<div><?php echo $item['uname'];?></div>
							<div style="height:50px; max-height:50px;"><span>寻求职位:<?php echo $item['job']?></span></div>
							<div><span><a href="<?php echo $item['resume']?>" target="_blank">LinkedIn简历</a></span></div>
							<div><img src="<?php echo base_url()?>/images/email.jpg"/><a href="<?php echo site_url()?>/rencai/email/<?php echo $item['uid'].'/'.$item['uname']?>" target="_blank">发信</a></div>
						</div>
						<?php  endforeach ?>
						<div style="clear:both"></div>
					
				</div>
			
			</div>
			 <div class="sidebar">
					<?php echo form_open_multipart("rencai/myinfo/"); ?>
						<div style="margin-top:20px; width:100%;"><input name="setmyinfo" type="submit" class="button big green " value="我要实习"/></div>
					</form>
			</div>
			   <div style="clear:both;"></div>
           </div>
         
        </div>

		<?php require("footer.php")?>
		<?php require("stat.php");?>
</body>
</html>
