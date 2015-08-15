<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <meta property="wb:webmaster" content="756ae04b6ce866fa" />
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=2530640642" type="text/javascript" charset="utf-8"></script>
	<?php require("title.php");?>
</head>
<body>
		<?php require("header.php")?>
        <div class="container">
            <div class="wrapper">
                <div class="maincontent">					
					<?php require("filter.php");?>					
					<?php require("joblist.php");?>					
                </div>
				
                <div class="sidebar">
					
                    <?php echo form_open_multipart("job/publishjob"); ?>
					<div class="plate "><input name="jobpublish" type="submit" class="button big orange " value="发布职位"/></div>
                    </form>
					<br/><br/>
					
					<div class="plate "><img src="<?php echo base_url()?>/images/qrcode.gif"/></div><br/>
			

                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
<br/><br/>
		<?php require("footer.php") ?>
		<?php require("stat.php");?>
		
</body>
</html>