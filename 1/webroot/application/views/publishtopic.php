<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("header.php")?>
        <div class="container">
            <div class="wrapper">
				<div style="margin-left:200px; float:left;">
					<?php echo form_open_multipart("bbs/addTopic"); ?>
				
					<div class="breadcrumb">
						<a href="<?php echo site_url()?>/bbs/index">论坛首页</a> &gt; 新话题
					</div>					
					<div class="job-detail validator-v5">
						<p class="job-item">
							<span class="job-item-key"><em class="star">*</em>标题:</span>
							<span><input value="" name="title" type="text" class="input-style-job" style="width:600px;"/></span>
						</p>
						<p>
							<span class="job-item-key ver-top"><em class="star">*</em>内容:</span>
							<span><textarea name="content" type="textarea" rows="20" cols="48" class="select-tarea" style="height:300px; width:600px"></textarea></span>
						</p>
						<div  style="margin-left:350px; margin-top:30px;"><input name="topicpublish" type="submit" class="button big green " value="发表话题"/></div>
					</div>
					
					</form>
					<br/>
					<div style="text-align:center; color:red;"><?php if(isset($info) && $info != NULL) echo $info;?></div>
				</div>
				<!--div class="sidebar" style="margin-left:120px;">
                    <div class="plate"><div class="contents"><img src="<?php echo base_url()?>/images/renpin.jpg" /></div></div><br/>
                    <div class="plate"><div class="contents"><img src="<?php echo base_url()?>/images/bgk.jpg" /></div></div>
				</div-->
                <div style="clear:both;"></div>
            </div>
        </div>
    <br/><br/><br/>
		<?php require("footer.php")?>
		<?php require("stat.php");?>
</body>
</html>
