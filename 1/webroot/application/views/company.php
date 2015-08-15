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
					<div style=""><?php require("filter.php");?></div>
					
                <div class="listbox"><table style="12px/1.5 arial,\5b8b\4f53;" class="table table-striped table-hover" width=100%>
                    <tr style="font-weight:bold;"><td style="width:1%"></td><td style="width:21%;">公司</td><td style="width:32%;">职位</td><td style="width:27%;">实习地点</td><td style="width:12%;">发布时间</td><td></td></tr>
						<?php foreach($items as $item):?>
                    <tr><td></td><td><?php echo mb_substr($item['company'], 0, 12, "utf-8")?></td><td><?php echo mb_substr($item['job'], 0, 16, "utf-8");?></td><td><?php echo mb_substr($item['place'], 0, 15, "utf-8");?></td><td><?php echo date("Y-m-d",strtotime($item['publish_time']))?></td><td><a href="<?php echo site_url()?>/job/detail/<?php echo $item['id']?>", target="_blank">详情</a></td></tr>
						<?php  endforeach ?>
                    </table></div>
					<div class="nextpage">
                        <ul class="pager">
							<?php if(! (int)$firstpage):?>
								
                           	 <li><a href="<?php echo site_url().'/job/company_page/type/'.$field.'/'.$pagecount.'/'.strval($page-1) ?>">&larr; 上一页</a></li>
							<?php endif?>
							<?php if((int)$page < (int)$pagecount):?>
								
                            <li><a href="<?php echo site_url().'/job/company_page/type/'.$field.'/'.$pagecount.'/'.strval($page+1) ?>">下一页 &rarr;</a></li>
							<?php endif?>
                            <li><?php echo "第 ".$page." 页&nbsp;&nbsp;&nbsp;&nbsp;";?></li>
                            <li><?php echo "共 ".$pagecount." 页";?></li>
                        </ul>
					</div>
                </div>
                <div class="sidebar">
				
				<?php
					//var_dump($_SESSION);
					if(!isset($_SESSION)){ 
						session_start();
					}
					include_once('config.php' );
					include_once('saetv2.ex.class.php' );
					$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
					$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
				?>
					<br/><br/>
					
					
					<div class="plate "><a href="<? echo $code_url?>"><img src="<?php echo base_url()?>/images/weibo_login.png" style="max-width:150px;_width:expression(this.width > 150 ? "150px" : this.width);"/></a></div><br/><br/>
					
                    <!--div class="plate"><div class="contents"><wb:login-button type="2,1" onlogin="login" onlogout="logout"></wb:login-button></div></div><br/-->
                    <?php echo form_open_multipart("job/publishjob"); ?>
					<div class="plate "><input name="jobpublish" type="submit" class="button big orange " value="发布职位"/></div>
                    </form>
					<br/>

                     <!--div class="plate"><div class="contents" style="color:red; font-weight:bold;">
					<p>好东西当然要分享，分享攒人品，面试全搞定！赶紧分享给你心中的那个TA吧,幸福就在右手边></p>
					</div></div-->
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
<br/><br/>
		<?php require("footer.php") ?>
		<?php require("stat.php");?>
</body>
</html>