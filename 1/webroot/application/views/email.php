<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("xiaozhaoheader.php")?>
        <div class="container">
            <div class="wrapper">
				<div style="margin-left:200px; float:left;">
					<?php echo form_open_multipart("social/writeemail"); ?>					
					<div>
					<br/><br/><br/><br/><br/>
						<p>
							<span><textarea name="content" type="textarea" rows="12" cols="100"></textarea></span>
						</p><br/><br/>
						<div  style="margin-left:270px; margin-top:5px;"><input name="email" type="submit" class="button big orange " value="发送"/>
						<input name="to_id" type="hidden" value="<?php echo $to_id?>"/>
						<input name="to_name" type="hidden" value="<?php echo $to_name?>"/>
						</div>
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
