<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("header.php")?>
        <div class="container">
            <div class="wrapper">
				<div style="margin-left:200px; float:left;height:85%;padding-top:50px;">
					<?php echo form_open_multipart("user/land"); ?>					
					<div class="job-detail validator-v5">
						<p class="title">使用实习之家账户登陆</p>
						
						<p class="job-item">
							<span class="job-item-key"><em class="star">*</em>邮箱登陆:</span>
							<span><input value="" name="email" type="text" class="input-style-job" /></span>
                        </p><br/>	
						<p>
						<p class="job-item">
							<span class="job-item-key"><em class="star">*</em>输入密码:</span>
							<span><input value="" type="password"  name="pwd" class="input-style-job" /></span>
						</p>

						<div  style="margin-left:270px; margin-top:5px;"><input name="login" type="submit" class="button midum orange " value="登陆"/></div>
                        </form>
                    <br/>
						<p class="job-item">
                            <span style="margin-left:230px;"><a href="<?php echo site_url()?>/user/register">没有账号？注册一个呗，只需三秒！</a></span>
						</p>
                 <?php
					if(!isset($_SESSION)){
						session_start();
					}

					include_once('config.php' );
					include_once('saetv2.ex.class.php' );

					$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

					$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
				?>
                        <p class="title">使用第三方账户登陆</p>
                    	<p class="job-item">
                            <span style="margin-left:200px;"><a href="<? echo $code_url?>"><img src="<?php echo base_url()?>/images/weibo_login.png" /></a></span>
                            <!--span style="margin-left:100px;"><a href=""><img src="<?php echo base_url()?>/images/qq.ico" /></a></span-->
                        </p><br/>
					</div>
					
					<br/>
					<div style="text-align:center; color:red;"><?php if($error != null) echo $error;?></div>
				</div>
				<!--div class="sidebar" style="margin-left:120px;">
                    <div class="plate"><div class="contents"><img src="<?php echo base_url()?>/images/renpin.jpg" /></div></div><br/>
                    <div class="plate"><div class="contents"><img src="<?php echo base_url()?>/images/bgk.jpg" /></div></div>
				</div-->
                <div style="clear:both;"></div>
            </div>
        </div>

		<?php require("footer.php")?>
		<?php require("stat.php");?>
</body>
</html>