<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("header.php")?>
		<div class="container">
		<div class="mainwrapper2">
			<div class="profileindex">
				<ul>
					<li><a href="<?php echo site_url().'/user/account/'.$id?>">我的账户</a></li>
					<li><a href="<?php echo site_url().'/user/resume/'.$id?>">我的简历</a></li>
					<li><a href="<?php echo site_url().'/user/message/'.$id?>">我的消息</a></li>
					<li><a href="<?php echo site_url().'/user/article/'.$id?>">我的帖子</a></li>
					<li><a href="<?php echo site_url().'/user/intern/'.$id?>">我的实习</a></li>
				</ul>
			</div>
			<div class="profilebox">	
				
				<?php echo form_open_multipart("rencai/addResume"); ?>
				<div class="job-detail validator-v5">
					<p class="title" style="width:800px;">基本信息</p>
                    <p><span>姓名：</span><input name ="name" style="width:700px;" /></p>
                    <p><span>学校：</span><span><input name="school" style="width:700px;" /></span></p>
					<p><span>年级：</span><span><input name="grade" style="width:700px;" /></span></p>
					<p><span>专业：</span><span><input name="major" style="width:700px;" /></span></p>
					<p><span>邮箱：</span><span><input name="email" style="width:700px;" /></span></p>
					<p><span>电话：</span><span><input name="phone" style="width:700px;" /></span></p>
					
					<p class="title" style="width:800px;">教育背景</p>
					<p><span>教育经历：</span><span><textarea name="education" style="width:700px;height:150px;"></textarea></span></p>
					
					<p class="title" style="width:800px;">项目介绍</p>
					<p><span>实习经历：</span><span><textarea name="internship" style="width:700px;height:150px;"></textarea></span></p>
					<p><span>项目经历：</span><span><textarea name="project" style="width:700px;height:150px;"></textarea></span></p>
					
					<p class="title" style="width:800px;">其他信息</p>
					<p><span>个人陈述：</span><span><textarea name="other" style="width:700px;height:150px;"></textarea></span></p>
					<p><span>LinkedIn主页：</span><input name ="linkedin" style="width:700px;" /></p>
				</div>
				<div style="text-align:center; "><input name="setmyinfo" type="submit" class="button big blue " value="添加"/></div>
				</form>
				
				
			</div>
        </div>
		</div>
		<?php require("footer.php")?>
		<?php require("stat.php");?>
</body>
</html>
