<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("header.php")?>
        <div class="container">
            <div class="wrapper" style="text-align:left;">
			<div class="content">					
				<p style="font-weight:bold; color:#DD6D22;"><?php echo $experience['title'];?></p>
				<div style="text-align:right; color:grey;"><span>发表时间:<?php echo $experience['publish_time'];?></span><span style="margin-left:5px;">作者:<?php echo $experience['publish_by'];?></span><span style="margin-left:5px;">阅读量:<?php echo $experience['browse_count'];?></span></div>
				<br/>
				<div><?php echo $experience["content"];?></div>
			</div>
			 <div style="clear:both;"></div>
           </div>
        </div>
    <br/><br/><br/>

		<?php require("footer.php")?>
		<?php require("stat.php");?>
</body>
</html>
