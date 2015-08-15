<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("header.php")?>
        <div class="container">
            <div class="wrapper">
				<div style="margin-left:200px; float:left;height:85%; padding-top:50px;">
					<?php echo form_open_multipart("user/add"); ?>					
					<div class="job-detail validator-v5">
						<p class="title">轻松注册，找实习，发布信息更简单！</p>
						<p class="job-item">
							<span class="job-item-key"><em class="star">*</em>注册邮箱:</span>
							<span><input value="" name="email" type="text" class="input-style-job" /></span>
						</p>
						<p>
							<span class="job-item-key ver-top"><em class="star">*</em>用户昵称:</span>
							<span><input value="" name="name" type="text" class="input-style-job" placeholder="由3到12个字母或数字组成" /></span>
						</p>
						<p class="job-item">
							<span class="job-item-key"><em class="star">*</em>设置密码:</span>
							<span><input value="" type="password"  name="pwd" class="input-style-job" /></span>
						</p>
						<p class="job-item">
							<span class="job-item-key"><em class="star">*</em>确认密码:</span>
							<span><input value="" name="pwd2" type="password" class="input-style-job" /></span>
						</p>

						<div  style="margin-left:270px; margin-top:5px;"><input name="register" type="submit" class="button midum orange " value="注册"/></div>
					</div>
					
					</form>
					<br/>
					<div style="text-align:center; color:red;"><?php if($error != null) echo $error;?></div>
				</div>

				<!--div class="sidebar" style="margin-left:120px;">
                    <div class="plate"><div class="contents"><img src="<?php echo base_url()?>/images/renpin.jpg" /></div></div><br/>
                    <div class="plate"><div class="contents"><img src="<?php echo base_url()?>/images/bgk.jpg" /></div></div>
				<div-->
                <div style="clear:both;"></div>
            </div>
        </div>

		<?php require("footer.php")?>
		<?php require("stat.php");?>
</body>
</html>
