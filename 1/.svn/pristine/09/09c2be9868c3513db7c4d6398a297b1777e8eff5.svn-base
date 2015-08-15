<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("xiaozhaoheader.php")?>
        <div class="container">
            <div class="wrapper">
				<div style="margin-left:200px; float:left;">
				<br/><br/><br/><br/><br/>
					<?php echo form_open_multipart("xiaozhao/setmyinfo"); ?>					
					<div class="job-detail validator-v5">
					    <p class="title">填写个人信息</p>
						<p>
							<span class="job-item-key ver-top"><em class="star">*</em>我要干嘛？:</span>
							<span>
								<select name="role" type="select" class="select-btn">
									<!--option value="0" >寻找内推</option-->
									<option value="1" selected>帮人内推</option>
									
								</select>
							</span>
						</p>
						<p>
						   <span class="job-item-key ver-top"><em class="star">*</em>公司名称:</span>
							<span><input  name="company" type="text" class="input-style-job" /></span>
						</p>
						<p>
						   <span class="job-item-key ver-top"><em class="star">*</em>部门及职位:</span>
							<span><input  name="job" type="text" class="input-style-job" /></span>
						</p>
						<!--p>
						   <span class="job-item-key ver-top"><em class="star">*</em>我的LinkedIn:</span>
							<span><input  name="resume" type="text" class="input-style-job" /></span>
							<span style="font-size:small;">没有Linkedin账户？请点击注册 <a href="http://www.linkedin.com" target="_blank">www.linkedin.com</a></span>
						</p-->
						<div  style="margin-left:270px; margin-top:5px;"><input name="email" type="submit" class="button midum orange " value="设置"/>
						</div>
						<br/><br/>
						<p style="color:red; text-align:center;"><?php if($info != null) echo $info;?></p>
					</div>
					
					</form>
					<br/>
				</div>
                <div style="clear:both;"></div>
            </div>
        </div>
    <br/><br/><br/>
		<?php require("footer.php")?>
		<?php require("stat.php");?>
</body>
</html>
