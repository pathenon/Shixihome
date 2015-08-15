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
					<li><a href="<?php echo site_url().'/user/message/'.$id?>">我的消息</a></li>
					<li><a href="<?php echo site_url().'/user/article/'.$id?>">我的帖子</a></li>
					<li><a href="<?php echo site_url().'/user/intern/'.$id?>">我的实习</a></li>
				</ul>
			</div>
			<div class="profilebox">	
				
				<?php echo form_open_multipart("rencai/addIntern"); ?>
				<div class="job-detail validator-v5">
                    <p><span>实习公司：</span><input name ="company" style="width:700px;" /></p>
                    <p><span>实习职位：</span><span><input name="job" style="width:700px;" /></span></p>
					<p><span>实习时间：</span><span><input name="time" style="width:700px;" /></span></p>
					<p><span>工作内容：</span><span><textarea name="content" style="width:700px;height:150px;"></textarea></span></p>
					<p><span>个人贡献：</span><span><textarea name="contribution" style="width:700px;height:150px;"></textarea></span></p><br/>
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
