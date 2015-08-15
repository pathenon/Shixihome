<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("header.php")?>
        <div class="container2">
            <div class="wrapper" style="text-align:left;">
			<div class="content">					
				<div class="job-detail validator-v5">
					<p class="title">正在找实习的小伙伴</p>
					
						<?php foreach($c1 as $item):?>
						<div style="float:left; width:200px; text-align:center;">
							<div><img src="<?php echo base_url()?>/images/looking.jpg"/></div>
							<div><?php echo $item['uname'];?></div>
							<div><span>心仪公司:<?php echo $item['company']?></span></div>
							<div><img src="<?php echo base_url()?>/images/email.jpg"/><a href="<?php echo site_url()?>/social/email/<?php echo $item['uid'].'/'.$item['uname']?>">发信</a></div>
						</div>
						<?php  endforeach ?>
						<div style="clear:both"></div>
					
				</div>
				
				<div class="job-detail validator-v5">
					<p class="title">正在实习ing的小伙伴</p>
					<div style="float:left; width:200px; text-align:center;">
						<?php foreach($c2 as $item):?>
							<div><img src="<?php echo base_url()?>/images/reach.jpg"/></div>
							<div><?php echo $item['uname'];?></div>
							<div><span>实习公司:<?php echo $item['company']?></span></div>
							<div><img src="<?php echo base_url()?>/images/email.jpg"/><a href="<?php echo site_url()?>/social/email/<?php echo $item['uid'].'/'.$item['uname']?>">发信</a></div>
						<?php  endforeach ?>
					</div>
				</div>
				
				
					
			</div>
			<div class="sidebar">
                <?php echo form_open_multipart("social/myinfo/"); ?>
					<div class="plate " style="margin-top:20px;"><input name="setmyinfo" type="submit" class="button large green " value="我要结伴"/></div>
				</form>
           </div>
			   <div style="clear:both;"></div>
           </div>
         
        </div>

		<?php require("footer.php")?>
		<?php require("stat.php");?>
</body>
</html>
