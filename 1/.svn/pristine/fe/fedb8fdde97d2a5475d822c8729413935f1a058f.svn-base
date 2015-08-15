<html>
<head>
<script src="<?php echo base_url();?>/tinymce/tinymce.min.js"></script>
<script>
        tinymce.init({
			selector:'textarea',
			language : "zh",
            menubar:false,
            statusbar: false,
            height:"450"
		});
</script>
<?php require("title.php");?>
</head>
<body>
		<?php require("header.php")?>
        <div class="container2">
            <div class="wrapper">
                <div class="maincontent">
					<?php echo form_open_multipart("job/addexp"); ?>
					<div>
						<span>
                            <select name="type" class="smallselect">
								<option value="原创">原创</option>
								<option value="转载">转载</option>
								<option value="翻译">翻译</option>
							</select>
						</span>
						<span><input name="title" type="text"  value="" placeholder="请输入标题"  class="middleinput"></span>
					</div>
                    <br/>
                    <span>文章内容:</span>
					<textarea name="content"></textarea>
                    <br/>
                    <div style="text-align:right;"><input name="exppublish" type="submit" class="button middle orange " value="发布"/></div>
					</form>
					<div style="color:red;"><?php if($info != NULL) echo $info;?></div>
                </div>
                <div class="sidebar">
                     <!--div class="plate"><div class="contents" style="color:red; font-weight:bold;">
					<p>好东西当然要分享，分享攒人品，面试全搞定！赶紧分享给你心中的那个TA吧,幸福就在右手边></p>
					</div></div-->
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
    
		<?php require("footer.php") ?>
		<?php require("stat.php");?>
</body>
</html>

