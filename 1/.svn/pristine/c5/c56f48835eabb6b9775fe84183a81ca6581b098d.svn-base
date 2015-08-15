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
					
						<?php foreach($c1 as $item):?>
						<div style="float:left; width:200px; text-align:center;">
							<div><img src="<?php echo base_url()?>/images/looking.jpg"/></div>
							<div><?php echo $item['uname'];?></div>
							<div><span>内推公司:<?php echo $item['company']?></span></div>
							<div><img src="<?php echo base_url()?>/images/email.jpg"/><a href="<?php echo site_url()?>/social/email/<?php echo $item['uid'].'/'.$item['uname']?>">发信</a></div>
						</div>
						<?php  endforeach ?>
						<div style="clear:both"></div>
					
				</div>
				
					
			</div>
			<div class="sidebar">
                <?php echo form_open_multipart("social/myinfo/"); ?>
					<div class="plate " style="margin-top:20px;"><input name="setmyinfo" type="submit" class="button big orange " value="我要内推"/></div>
				</form>
           </div>
			   <div style="clear:both;"></div>
           </div>
         
        </div>

		<?php require("footer.php")?>
		<?php require("stat.php");?>
</body>
</html>
