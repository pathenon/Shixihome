<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <meta property="wb:webmaster" content="756ae04b6ce866fa" />
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=2530640642" type="text/javascript" charset="utf-8"></script>
	<?php require("title.php");?>
</head>
<body>
		<?php require("xiaozhaoheader.php")?>
        <div class="container">
            <div class="wrapper">
                <div class="maincontent">
					<?php require("xiaozhaofilter.php");?>
					
					<div class="listbox" style="border: 1px solid #FFA042;border-radius: 8px; margin-top: 30px;">
						<p style="font-size:22px;background:#FFA042;text-align:center;color:white;">热门校招职位</p>	
						<?php require("xiaozhaojoblistbox.php");?>
					</div>
					
					<div class="nextpage">
                        <ul class="pager">
							<?php if(! (int)$firstpage):?>	
                             <?php if($field=='place'):?>							
                           	 <li><a href="<?php echo site_url().'/xiaozhao/place_page/'.$place.'/'.$pagecount.'/'.strval($page-1) ?>">&larr; 上一页</a></li>
							 <?php endif?>
							 <?php if($field=='company'):?>							
                           	 <li><a href="<?php echo site_url().'/xiaozhao/company_page/company/'.$company.'/'.$pagecount.'/'.strval($page-1) ?>">&larr; 上一页</a></li>
							<?php endif?>
							<?php if($field=='type'):?>							
                           	 <li><a href="<?php echo site_url().'/xiaozhao/company_page/type/'.$type.'/'.$pagecount.'/'.strval($page-1) ?>">&larr; 上一页</a></li>
							<?php endif?>
							<?php if(is_numeric($field)):?>							
                           	 <li><a href="<?php echo site_url().'/xiaozhao/category_page/'.$field."/".$pagecount.'/'.strval($page-1) ?>">&larr; 上一页</a></li>
							<?php endif?>
							<?php endif?>
							
							<?php if((int)$page < (int)$pagecount):?>	
							<?php if($field=='place'):?>
                            <li><a href="<?php echo site_url().'/xiaozhao/place_page/'.$place.'/'.$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
							<?php endif?>
							<?php if($field=='company'):?>
                            <li><a href="<?php echo site_url().'/xiaozhao/company_page/company/'.$company.'/'.$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
							<?php endif?>
							<?php if($field=='type'):?>
                            <li><a href="<?php echo site_url().'/xiaozhao/company_page/type/'.$type.'/'.$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
							<?php endif?>
							<?php if(is_numeric($field)):?>	
                            <li><a href="<?php echo site_url().'/xiaozhao/category_page/'.$field."/".$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
							<?php endif?>
							<?php endif?>
                            <li><?php echo "第 ".$page." 页&nbsp;&nbsp;&nbsp;&nbsp;";?></li>
                            <li><?php echo "共 ".$pagecount." 页";?></li>
                        </ul>
					</div>
                </div>
				
                <div class="sidebar">				
				<?php
					if(!isset($_SESSION)){ 
						session_start();
					}
					include_once('config.php' );
					include_once('saetv2.ex.class.php' );
					$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
					$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
				?>				
                    <?php echo form_open_multipart("xiaozhao/publishjob"); ?>
					<div class="plate "><input name="jobpublish" type="submit" class="button big orange " value="发布校招"/></div>
                    </form>
					<br/>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
<br/><br/>
		<?php require("footer.php") ?>
		<?php require("stat.php");?>
</body>
</html>