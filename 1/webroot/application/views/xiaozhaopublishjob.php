<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("xiaozhaoheader.php")?>
        <div class="container">
            <div class="wrapper">
				<div style="margin-left:200px; float:left;">
					<?php if($edit) 
					{
						echo form_open_multipart("xiaozhao/updatejob/".$id);
					?>
					<input type="hidden" name="id" value="<?php echo $id?>"/>
					<?php 
						}
					?>
					<?php if($edit==null || $edit==0) echo form_open_multipart("xiaozhao/addItem"); ?>					
					<div class="job-detail validator-v5">
						<p class="title">基本信息</p>
						<p class="job-item">
							<span class="job-item-key"><em class="star">*</em>公司名称:</span>
							<span><input value="<?php if($company != null) echo $company;?>" name="company" type="text" class="input-style-job" /></span>
						</p>
						<!--p>
							<span class="job-item-key ver-top"><em class="star">*</em>职位领域:</span>
							<span>
								<select name="field" type="select" class="select-btn">
									<option value="IT" selected>IT</option>
									<option value="其他">其他</option>
								</select>
							</span>
						</p-->
						<p>
							<span class="job-item-key ver-top"><em class="star">*</em>公司性质:</span>
							<span>
								<select name="type" type="select" class="select-btn">
									<option value="国内私企" selected>国内私企</option>
									<option value="大型外企">大型外企</option>
									<option value="创业公司">创业公司</option>
									<option value="国企银行">国企银行</option>
									<option value="其他">其他</option>
								</select>
							</span>
						</p>
						<p class="job-item">
							<span class="job-item-key"><em class="star">*</em>职位名称:</span>
							<span><input value="<?php if($job != null) echo $job;?>" name="job" type="text" class="input-style-job" placeholder="内推职位请用【内推】打头"/></span>
						</p>
						<p>
							<span class="job-item-key ver-top"><em class="star">*</em>职位描述:</span>
							<span><textarea name="description" type="textarea" rows="10" cols="48" class="select-tarea"><?php if($description != null) echo $description;?></textarea></span>
						</p>
						<p>
							<span class="job-item-key ver-top"><em class="star">*</em>职位要求:</span>
							<span><textarea name="requirement" type="textarea" rows="10" cols="48" class="select-tarea"><?php if($requirement != null) echo $requirement;?></textarea></span>
						</p>
						<p>
							<span class="job-item-key ver-top"><em class="star">*</em>薪水待遇:</span>
							<span class="h-28">
								<select name="salary" type="select" class="select-btn">
									<option value="0">面议</option>
									<option value="1">5000以下</option>
									<option value="2">5000~8000</option>
									<option value="3">8000~10000</option>
									<option value="4">10000以上</option>
								</select>
							</span>
						</p>
						
						<p class="title">联系信息</p>
						<p class="job-item">
							<span class="job-item-key"><em class="star"></em>联系人:</span>
							<span><input value="<?php if($person != null) echo $person;?>" name="person" type="text" class="input-style-job" /></span>
						</p>
						<p class="job-item">
							<span class="job-item-key"><em class="star"></em>联系电话:</span>
							<span><input value="<?php if($phone != null) echo $phone;?>" name="phone" type="text" class="input-style-job" /></span>
						</p>
						<p class="job-item">
							<span class="job-item-key"><em class="star"></em>联系邮箱:</span>
							<span><input value="<?php if($email != null) echo $email;?>" name="email" type="text" class="input-style-job" /></span>
						</p>
						<p class="job-item">
							<span class="job-item-key"><em class="star"></em>在线申请:</span>
							<span><input value="<?php if($online != null) echo $online;?>" name="online" type="text" class="input-style-job" /></span>
						</p>
						<p class="job-item">
							<span class="job-item-key"><em class="star">*</em>工作地点:</span>
							<span><input value="<?php if($place != null) echo $place;?>" name="place" type="text" class="input-style-job" /></span>
						</p>
						<p>
							<span class="job-item-key ver-top"><em class="star"></em>其他信息:</span>
							<span><textarea name="other" type="textarea" rows="10" cols="48" class="select-tarea"><?php if($other != null) echo $other;?></textarea></span>
						</p>
						<div  style="margin-left:270px; margin-top:5px;"><input name="jobpublish" type="submit" class="button midum orange " value="发布"/></div>
					</div>
					
					</form>
					<br/>
					<div style="text-align:center; color:red;"><?php if($info != NULL) echo $info;?></div>
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
