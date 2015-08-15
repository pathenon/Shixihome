<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <meta property="wb:webmaster" content="756ae04b6ce866fa" />
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=2530640642" type="text/javascript" charset="utf-8"></script>
	<?php require("title.php");?>
	
<style>
	.mingqi img{
		max-height:70px;
		max-width:70px;
		overflow:hidden;
	}
	
</style>
<link href="<?php echo base_url()?>/themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url()?>/themes/1/js-image-slider.js" type="text/javascript"></script>
</head>

<body>
		<?php require("xiaozhaoheader.php")?>
        <div class="container xiaozhao">
            <div class="wrapper">
                <div class="maincontent">		
					<div style="margin-top:10px;margin-bottom:10px;">
					<div class="plate " style="float:left;">
						<ul class="category xiaozhao_category_height">
							<li><span style="font-size:21px; color:rgb(0, 153, 204);">热门职位分类</span></li>
							<li><a href="<?php echo site_url()?>/xiaozhao/searchCategory/1"><img src="<?php echo base_url()?>/images/code.jpg"/>&nbsp;&nbsp;研发&测试</a></li>
							<li><a href="<?php echo site_url()?>/xiaozhao/searchCategory/2"><img src="<?php echo base_url()?>/images/design.jpg"/>&nbsp;&nbsp;产品&设计</a></li>
							<li><a href="<?php echo site_url()?>/xiaozhao/searchCategory/3"><img src="<?php echo base_url()?>/images/market.jpg"/>&nbsp;&nbsp;运营&市场</a></li>
							<li><a href="<?php echo site_url()?>/xiaozhao/searchCategory/4"><img src="<?php echo base_url()?>/images/hr.jpg"/>&nbsp;&nbsp;行政&管理</a></li>
							<li><a href="<?php echo site_url()?>/xiaozhao/searchCategory/5"><img src="<?php echo base_url()?>/images/finance.jpg"/>&nbsp;&nbsp;金融&财务</a></li>
						</ul>
					</div>
					
					<div style="float:left;width:700px;margin-left:50px;">
						<div style="margin-bottom:10px;">友情提示：如果网站访问速度过慢，建议访问<a href="http://www.upandi.com">www.upandi.com</a>，服务会更加稳定。</div>
						<div class="search" style="float:none; margin-bottom:0;">
							<?php echo form_open_multipart("xiaozhao/search"); ?>
							<input name="keyword" class="form-control" type="text" id="keyword" value="" style="width:70%; float:left; height:40px;" placeholder="顺序输入公司，职位搜索，多个关键词用空格分开。" />
							<input name="btnSearch" type="submit" value="搜&nbsp;索"  class="button small green" style="margin-left:10px; height:40px;" id="btnSearch"/>
							</form>
						</div>
						       
						<div style="margin-top:-10px;">
							<span style="color:red; margin-right:15px;">热点地区:</span>
							<span style="color:red">
								<a style="margin-left:10px;color:rgb(175, 75, 75);" href="<?php echo site_url().'/xiaozhao/searchPlace/北京' ?>"   >北京</a>
								<a style="margin-left:10px;color:rgb(175, 75, 75);" href="<?php echo site_url().'/xiaozhao/searchPlace/上海' ?>"   >上海</a> 
								<a style="margin-left:10px;color:rgb(175, 75, 75);" href="<?php echo site_url().'/xiaozhao/searchPlace/杭州' ?>"   >杭州</a>
								<a style="margin-left:10px;color:rgb(175, 75, 75);" href="<?php echo site_url().'/xiaozhao/searchPlace/深圳' ?>"   >深圳</a>
								<a style="margin-left:10px;color:rgb(175, 75, 75);" href="<?php echo site_url().'/xiaozhao/searchPlace/广州' ?>"   >广州</a>
							</span>            
						</div>
						
						 <div id="sliderFrame">
							<div id="slider">
								<!--img src="<?php echo base_url()?>/images/image-slider-2.jpg" alt="" />
								<img src="<?php echo base_url()?>/images/image-slider-3.jpg" alt="Pure Javascript. No jQuery. No flash." />
								<img src="<?php echo base_url()?>/images/image-slider-4.jpg" alt="#htmlcaption" />
								<img src="<?php echo base_url()?>/images/image-slider-5.jpg" /-->
								<!--img src="<?php echo base_url()?>/images/bc.jpg" / alt="实习之家，助您一臂之力！"-->
								<a href="http://game.campus.163.com/" target="_blank"><img src="<?php echo base_url()?>/images/xz_wangyi.jpg" / alt="网易游戏2015校园招聘"></a>
								<a href="http://talent.baidu.com/component1000/corp/baidu/html/intro.html" target="_blank"><img src="<?php echo base_url()?>/images/xiaozhao_baidu.jpg" / alt="百度2015校园招聘"></a>
								<a href="http://www.joinms.com/" target="_blank"><img src="<?php echo base_url()?>/images/xiaozhao_ms.jpg" / alt="微软2015校园招聘"></a>
								<a href="http://join.qq.com/index.php" target="_blank"><img src="<?php echo base_url()?>/images/xiaozhao_tengxun.jpg" / alt="腾讯2015校园招聘"></a>
								<a href="http://campus.alibaba.com/position.htm" target="_blank"><img src="<?php echo base_url()?>/images/xiaozhao_alibaba.jpg" / alt="阿里巴巴2015校园招聘"></a>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					</div>
	
					<!--?php require("hotlist.php");?-->						
					<?php require("xiaozhaojoblist.php");?>		
                </div>
				
                <div class="sidebar">				
					 <?php echo form_open_multipart("xiaozhao/publishjob"); ?>
					<div class="plate "><input name="jobpublish" type="submit" class="button big orange " value="发布校招"/></div>
                    </form>
					
					<!--div class="plate "><img src="<?php echo base_url()?>/images/qrcode.gif"/></div><br/><br/-->
					
					<div class="plate " style="border:1px solid #FFA042">
						<div style="background-color:#FFA042; font-size:22px; font-weight:bold;color:white;">热门名企招聘</div>
						<div class="mingqi">
							<div style="width:150px; padding-top:20px;">
								<span><a href="<?php echo site_url()?>/job/searchCompany/微软"><img src="<?php echo base_url()?>/images/ms.jpg" /></a></span>
								<span style="padding-left:3px;"><a href="<?php echo site_url()?>/xiaozhao/searchCompany/百度"><img src="<?php echo base_url()?>/images/baidu.jpg" /></a></span>
							</div>
							<div style="width:150px; padding-top:20px;">
								<span><a href="<?php echo site_url()?>/job/searchCompany/有道"><img src="<?php echo base_url()?>/images/youdao.jpg" /></a></span>
								<span style="padding-left:3px;"><a href="<?php echo site_url()?>/xiaozhao/searchCompany/新浪"><img src="<?php echo base_url()?>/images/sina.jpg" /></a></span>
							</div>
							<div style="width:150px; padding-top:20px;">
								<span><a href="<?php echo site_url()?>/job/searchCompany/搜狐"><img src="<?php echo base_url()?>/images/sohu.jpg" /></a></span>
								<span style="padding-left:3px;"><a href="<?php echo site_url()?>/xiaozhao/searchCompany/360"><img src="<?php echo base_url()?>/images/360.jpg" /></a></span>
							</div>							
							<div style="width:150px; padding-top:20px;">
								<span><a href="<?php echo site_url()?>/job/searchCompany/搜狗"><img src="<?php echo base_url()?>/images/sogou.jpg" /></a></span>
								<span style="padding-left:3px;"><a href="<?php echo site_url()?>/xiaozhao/searchCompany/人人"><img src="<?php echo base_url()?>/images/renren.jpg" /></a></span>
							</div>									
							<div style="width:150px; padding-top:20px;">
								<span><a href="<?php echo site_url()?>/job/searchCompany/亚马逊"><img src="<?php echo base_url()?>/images/amazon.jpg" /></a></span>
								<span style="padding-left:3px;"><a href="<?php echo site_url()?>/xiaozhao/searchCompany/网易"><img src="<?php echo base_url()?>/images/wangyi.jpg" /></a></span>
							</div>							
						</div>
					</div><br/><br/>
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