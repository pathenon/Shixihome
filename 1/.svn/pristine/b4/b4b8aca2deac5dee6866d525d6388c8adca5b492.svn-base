<html>
<head>
    <link rel="shortcut icon" href="<?php echo base_url()?>/images/favicon.ico">
	<?php require("title.php");?>
</head>
<body>
		<?php require("header.php")?>
        <div class="container2">
            <div class="fullwrapper">
					<div style="width:100%;">
						<?php echo form_open_multipart("job/searchExp"); ?>
						<div class="search">
                            <input name="keyword" type="text" id="keyword" value="" style="float:left;width:80%" placeholder="搜索特定公司的面经" class="form-control"/>
                            <input name="btnSearch" type="submit" value="搜&nbsp;索"  class="button small green" style="margin-left:10px" id="btnSearch"/>
						</div>
						</form>
						<?php echo form_open_multipart("job/postexp"); ?>
						<div style="float:left; margin-left:100px;">
							<input name="jobpublish" type="submit" class="button small2 blue " value="我要发表面经"/>
						</div>
						</form>
						<div style="clear:both;"></div>
					</div>
				
                    <div class="articlelistbox">
						<?php foreach($experiences as $experience):?>
						<div class="articlebox">
                            <div style="margin-bottom:5px;"><p style="font-weight:bold;"><a style="color:#DD6D22; text-decoration:none;" href="<?php echo site_url().'/job/experience/'.$experience['id'];?>" target='_blank'><?php echo $experience['title'];?></a></span></p></div>
						<div style="text-indent: 2em; line-height: 1.5em;"><?php echo "摘要:".mb_substr(strip_tags($experience['content']), 0 , 300, "utf-8")."...";?></div>
						<div style="text-align:right; color:grey;margin-top:3px;"><span>发表时间:<?php echo $experience['publish_time'];?></span><span style="margin-left:5px;">作者:<?php echo $experience['publish_by'];?></span><span style="margin-left:5px;">阅读量:<?php echo $experience['browse_count'];?></span></div>
						</div>
						<?php endforeach ?>
                   
    					<?php if(count($experiences) ==0 || $experience == null){?>
               			 <br/>
               			 <div style="width:800px; margin-left:auto; margin-right:auto; "><p>没有找到相关结果</p></div>
                		<?php }?>
						
						<!--div class="nextpage">
							<?php if(! (int)$firstpage):?>
								<a href="">上一页&nbsp;&nbsp;&nbsp;&nbsp;</a>
							<?php endif?>
							<?php if((int)$page < (int)$pagecount):?>
								<a href="">下一页&nbsp;&nbsp;&nbsp;&nbsp;</a>
							<?php endif?>
							<?php echo "第 ".$page." 页&nbsp;&nbsp;&nbsp;&nbsp;";?>
							<?php echo "共 ".$pagecount." 页";?>
						</div-->
    
    					<div class="nextpage">
                        <ul class="pager">
							<?php if(! (int)$firstpage):?>
                           	 <li><a href="<?php echo site_url().'/job/exppage/'.$pagecount.'/'.strval($page-1) ?>">&larr; 上一页</a></li>
							<?php endif?>
							<?php if((int)$page < (int)$pagecount):?>
                            <li><a href="<?php echo site_url().'/job/exppage/'.$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
							<?php endif?>
                            <li><?php echo "第 ".$page." 页&nbsp;&nbsp;&nbsp;&nbsp;";?></li>
                            <li><?php echo "共 ".$pagecount." 页";?></li>
                        </ul>
					</div>
                    </div>
                <div style="clear:both;"></div>
            </div>
        </div>
    
		<?php require("footer.php") ?>
		<?php require("stat.php");?>
</body>
</html>