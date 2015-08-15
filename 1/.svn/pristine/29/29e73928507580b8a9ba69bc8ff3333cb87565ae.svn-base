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
					<!--div style="margin-top:10px;"><!--?php require("filter.php");?></div-->
					
					<?php require("joblistbox.php");?>
					
					<div class="nextpage">
                        <ul class="pager">
							<?php if(! (int)$firstpage):?>	
                             <?php if($field=='place'):?>							
                           	 <li><a href="<?php echo site_url().'/job/place_page/'.$place.'/'.$pagecount.'/'.strval($page-1) ?>">&larr; 上一页</a></li>
							 <?php endif?>
							 <?php if($field=='company'):?>							
                           	 <li><a href="<?php echo site_url().'/job/company_page/company/'.$company.'/'.$pagecount.'/'.strval($page-1) ?>">&larr; 上一页</a></li>
							<?php endif?>
							<?php if($field=='type'):?>							
                           	 <li><a href="<?php echo site_url().'/job/company_page/type/'.$type.'/'.$pagecount.'/'.strval($page-1) ?>">&larr; 上一页</a></li>
							<?php endif?>
							<?php if(is_numeric($field)):?>							
                           	 <li><a href="<?php echo site_url().'/job/category_page/'.$field."/".$pagecount.'/'.strval($page-1) ?>">&larr; 上一页</a></li>
							<?php endif?>
							<?php endif?>
							
							<?php if((int)$page < (int)$pagecount):?>	
							<?php if($field=='place'):?>
                            <li><a href="<?php echo site_url().'/job/place_page/'.$place.'/'.$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
							<?php endif?>
							<?php if($field=='company'):?>
                            <li><a href="<?php echo site_url().'/job/company_page/company/'.$company.'/'.$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
							<?php endif?>
							<?php if($field=='type'):?>
                            <li><a href="<?php echo site_url().'/job/company_page/type/'.$type.'/'.$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
							<?php endif?>
							<?php if(is_numeric($field)):?>	
                            <li><a href="<?php echo site_url().'/job/category_page/'.$field."/".$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
							<?php endif?>
							<?php endif?>
                            <li><?php echo "第 ".$page." 页&nbsp;&nbsp;&nbsp;&nbsp;";?></li>
                            <li><?php echo "共 ".$pagecount." 页";?></li>
                        </ul>
					</div>
                </div>
				
                <div class="sidebar">				
                   <?php require("sidebarrec.php");?>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
<br/><br/>
		<?php require("footer.php") ?>
		<?php require("stat.php");?>
</body>
</html>