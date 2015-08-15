<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <meta property="wb:webmaster" content="756ae04b6ce866fa" />
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=2530640642" type="text/javascript" charset="utf-8"></script>
	<?php require("title.php");?>
	
<style>
.neituiren img{
	max-width:50px;
	max-height:50px;
	overflow:hidden;
}
</style>
</head>
<body>
		<?php require("xiaozhaoheader.php")?>
        <div class="container">
            <div class="wrapper">
                <div class="maincontent">	
					 <!--div style="margin-top:20px;"><img src="<?php echo base_url()?>/images/neitui.jpg"/></div-->
					 
					 
				<!--div class="job-detail validator-v5" style="border: 1px solid #FFA042; margin:0; border-radius: 8px; margin-top: 30px;">
					<p style="font-size:22px;background:#FFA042;text-align:center;color:white;">热门内推前辈</p>
					
						<?php foreach($qianbei as $item):?>
						<div style="float:left; width:300px; margin-top:30px;">
							<div class="neituiren" style="float:left;"><img src="<?php echo base_url().'/images/neitui'.rand(1, 13).'.jpg'?>"/></div>
							<div style="float:left; font-size:15px;">
								<div><span><?php echo $item['uname'];?></span> <span style="margin-left:20px;"><a href="<?php echo site_url()?>/social/email/<?php echo $item['uid'].'/'.$item['uname']?>">发信</a></span></div>
								<div><span>公司:&nbsp;&nbsp;&nbsp;<?php echo $item['company']?></span></div>
								<div><span>职位:&nbsp;&nbsp;&nbsp;<?php echo $item['job']?></span></div>
							</div>
						</div>
						<?php  endforeach ?>
						<div style="clear:both"></div>
					
				</div-->
				
				
					<?php require("xiaozhaoneituijoblist.php");?>				
                </div>
				
                <div class="sidebar">
					
                    <?php echo form_open_multipart("xiaozhao/neitui"); ?>
					<div class="plate "><input name="jobpublish" type="submit" class="button big orange " value="我要内推"/></div>
                    </form>
					<br/><br/>
					
					<div class="plate "><img src="<?php echo base_url()?>/images/qrcode.gif"/></div><br/><br/>
					
					
					<div class="plate ">
						<script type="text/javascript">
						/*120*600，创建于2014-5-27*/
						var cpro_id = "u1569325";
						</script>
						<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
					</div>

                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
		<?php require("footer.php") ?>
		<?php require("stat.php");?>
</body>
</html>