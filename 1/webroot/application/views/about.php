<html xmlns:wb="http://open.weibo.com/wb">
<head>
	<?php require("title.php");?>
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=25775260" type="text/javascript" charset="utf-8"></script>
</head>
<body>
		<?php require("header.php")?>
        <div class="container">
            <div class="wrapper">
				<div style="margin-left:200px; float:left; width:700px;">
					<div style="font-size:20px;font-weight:bold;">简介:</div>
					    <div class="hr-line">&nbsp;</div>
					    <div style="width:700px; text-indent: 2em; line-height: 1.5em;"> 
						        实习之家是国内第一家专注于聚合发布各大公司单位提供的实习信息的平台。她建立的初衷是为广大在校学生提供一个专业的的寻找实习
							机会的渠道，让想实习的人能够更加方便快捷的找到满意的实习机会。我们致力于提供丰富的、优质的实习信息服务！
						        我们的愿景是：<p style="color:red; font-weight:bold;">让实习更方便，更快捷，更专业!</p>
						</div><br/><br/>
					<div style="font-size:20px;font-weight:bold;">联系方式:</div>
						<div class="hr-line">&nbsp;</div>
						<div style="width:700px;text-indent: 2em; line-height: 1.5em;"> 
								<p>实习群:332735481&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;310304113 &nbsp;&nbsp;&nbsp;&nbsp;兼职群：294130118</p><br/>
								<p>新浪微博:<a href="http://weibo.com/u/3909281223" target="_blank">@Me</a></p><br/>
					            <p>Email:<img src="<?php echo base_url()?>images/email.png" /></p>
						</div>
				</div>
				<div style="margin-left:200px; float:left;  width:700px">
                   <wb:comments url="http://www.weibo.com/comment/inbox?leftnav=1&wvr=5" brandline="y" fontsize="14" width="auto" skin="silver" appkey="25775260" ralateuid="3909281223" ></wb:comments>
				 </div>
					<!--div>
						<p style="font-size:large; font-weight:bold; color:red;">留言板</p>
						<--?php if($items != null):?>
						<--?php foreach($items as $item):?>
						<div style="float:left; text-align:left;"><--?php echo $item['content'];?></div>
						<div style="text-align:right;"><--?php echo $item['time'].'<br/>';?></div>
						<div style="clear:both;"></div><br/>
						<--?php endforeach?>
						<--?php endif?>
					</div>

					<div>
						<--?php echo form_open_multipart("job/leavemessage"); ?>
						<div><textarea rows="6" cols="30" name="message" style="width:98%; text-align:center"></textarea></div>
						<div style="margin-left:300px;"><button type="submit" >留言</button></div>
						</form>
					</div-->
			</div>
			
			<!--div class="sidebar" style="margin-left:150px;">
                    <!--div class="plate"><div class="contents"><img src="<--?php echo base_url()?>images/renpin.jpg" /></div></div><br/>
                    <div class="plate"><div class="contents"><img src="<--?php echo base_url()?>images/bgk.jpg" /></div></div>
				</div>
                <div style="clear:both;"></div>
            </div-->

        </div>
    </div>
		<?php require("stat.php");?>
</body>
</html>
