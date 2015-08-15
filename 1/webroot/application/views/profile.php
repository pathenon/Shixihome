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
					<li><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a style="margin-left:10px;" href="<?php echo site_url().'/user/account/'.$id?>">我的账户</a></li>
					<li><span class="glyphicon glyphicon-file" aria-hidden="true"></span><a style="margin-left:10px;" href="<?php echo site_url().'/user/resume/'.$id?>">我的简历</a></li>
					<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a style="margin-left:10px;" href="<?php echo site_url().'/user/message/'.$id?>">我的消息</a></li>
					<li><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span><a style="margin-left:10px;" href="<?php echo site_url().'/user/article/'.$id?>">我的帖子</a></li>
					<li><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><a style="margin-left:10px;" href="<?php echo site_url().'/user/intern/'.$id?>">我的实习</a></li>
				</ul>
			</div>
			<div class="profilebox">	
				<?php if($type=='account'){?>
				<div class="job-detail validator-v5" style="margin-top:10px;">
                    <p><span>用户名：</span><span><?php if($client['name'] != null) echo $client['name']?></span></p><br/>
                    <p><span>注册邮箱：</span><span><?php if($client['email'] != null) echo $client['email']?></span></p><br/>
                    <p><span>绑定电话：</span><span><?php if($client['phone'] != null) echo $client['phone']?></span></p><br/>
					<p><span>社交账户：</span><span><?php if($client['social_account'] != null) echo $client['social_account']?></span></p><br/>
					
				</div>
				<?php }?>
				
				<?php if($type=='resume'){?>
				<div class="job-detail validator-v5" style="margin-top:10px;">
				 <?php if(count($resume) > 0){?>
                    <p class="title" style="width:800px;">基本信息</p>
                    <p><span>姓名：</span><span><?php if($resume['name'] != null) echo $resume['name']?></span></p>
                    <p><span>学校：</span><span><?php if($resume['school'] != null) echo $resume['school']?></span></p>
					<p><span>年级：</span><span><?php if($resume['grade'] != null) echo $resume['grade']?></span></p>
					<p><span>专业：</span><span><?php if($resume['major'] != null) echo $resume['major']?></span></p>
					<p><span>邮箱：</span><span><?php if($resume['email'] != null) echo $resume['email']?></span></p>
					<p><span>电话：</span><span><?php if($resume['phone'] != null) echo $resume['phone']?></span></p>
					
					<p class="title" style="width:800px;">教育背景</p>
					<p><span>教育经历：</span><br/><span><?php if($resume['education'] != null) echo $resume['education']?></span></p>
					
					<p class="title" style="width:800px;">项目介绍</p>
					<p><span>实习经历：</span><br/><span><?php if($resume['internship'] != null) echo $resume['internship']?></span></p>
					<p><span>项目经历：</span><br/><span><?php if($resume['project'] != null) echo $resume['project']?></span></p>
					
					<p class="title" style="width:800px;">其他信息</p>
					<p><span>个人陈述：</span><br/><span><?php if($resume['other'] != null) echo $resume['other']?></span></p>
					<p><span>LinkedIn主页：</span><span><?php if($resume['linkedin'] != null) echo $resume['linkedin']?></span></p>
					<?php }?>
					<?php if(count($resume) <= 0){?>
					<?php echo form_open_multipart("rencai/addMyResume/".$id); ?>
					<div style="margin-top:20px;"><input name="add" type="submit" class="button small blue " style="width:120px;margin-left:50px;" value="添加个人简历"/></div>
					</form>
					<?php }?>
				</div>
				<?php }?>
				
				<?php if($type=='message'){?>
				<?php if(count($msgs) > 0){?>
					<div class="job-detail validator-v5">
                    <div class="listbox"><table style="12px/1.5 arial,\5b8b\4f53;" class="table table-striped table-hover" width=100%>
                    <tr style="font-weight:bold;"><td style="width:1%"></td><td style="width:8%;">发信人</td><td style="width:8%;">收信人</td><td style="width:60%;">内容</td><td style="width:17%;">发送时间</td><td>操作</td></tr>
						<?php foreach($msgs as $msg):?>
                    <tr><td></td><td><?php echo $msg['from_name'];?></td><td><?php echo $msg['to_name'];?></td><td><?php echo $msg['content'];?></td><td><?php echo $msg['publish_time'];?></td><td><a href="<?php echo site_url()."/social/email/".$msg['from_id']?>">回复</a></td></tr>
						<?php  endforeach ?>
                    </table></div>
				</div>
				<?php }?>
				<?php if(count($msgs) <= 0){?>
					<p style="margin-left:50px;margin-top:100px;"><?php echo "暂时没有人给你消息 :)";?></p>
				<?php }?>
				<?php }?>
				
				
				<?php if($type=='intern'){?>
				<?php if($intern != null){ ?>
				<!--?php echo form_open_multipart("rencai/updateInternInfo/".$intern['uid']); ?-->
				<div class="job-detail validator-v5">
                    <!--p><span>LinkedIn简历</span><input name ="resume" size=100 value="<?php if($intern['resume'] != null) echo $intern['resume']?>"/></p><br/>
                    <p><span>寻找职位：</span><span><input name="job" size=100 value="<?php if($intern['job'] != null) echo $intern['job']?>"/></span></p><br/>
					<span>我的状态：</span><span>
					<span>
						<select name="state" type="select" class="select-btn">
							<option value="1" <?php if($intern['state'] == 1) echo 'selected' ?>>正在找实习</option>
							<option value="0" <?php if($intern['state'] == 0) echo 'selected' ?>>不再找实习</option>
						</select>
					</span>
					<p>
					
						<div style="margin-top:20px; "><input name="setmyinfo" type="submit" class="button small blue " value="修改"/></div>
					</form></span></p-->
					<?php foreach($intern as $item){?>
					<div class="job-detail validator-v5">
                    <p><span style="font-weight:bold;">实习公司：</span><?php echo $item['company']?></p>
                    <p><span style="font-weight:bold;">实习职位：</span><span><?php echo $item['job']?></span></p>
					<p><span style="font-weight:bold;">实习时间：</span><span><?php echo $item['time']?></span></p>
					<p><span style="font-weight:bold;">工作内容：</span><br/><span><?php echo $item['content']?></span></p>
					<p><span style="font-weight:bold;">个人贡献：</span><br/><span><?php echo $item['contribution']?></span></p><br/><br/>
					</div>
					<?php }?>
					<?php echo form_open_multipart("rencai/addInternship/".$id); ?>
					<div style="margin-top:20px;"><input name="add" type="submit" class="button small blue " style="width:120px;margin-left:50px;" value="添加实习经历"/></div>
					</form>
				</div>
				<?php }?>
				<?php if($intern == null){ ?>
					<p style="margin-left:50px;margin-top:100px;"><?php echo "完美的事业，从一份精致的实习开始。 :)";?></p>
					<?php echo form_open_multipart("rencai/addInternship/".$id); ?>
					<div style="margin-top:20px;"><input name="add" type="submit" class="button small blue " style="width:120px;margin-left:50px;" value="添加实习经历"/></div>
					</form>
				<?php }?>
				<?php }?>
				
				<?php if($type=='article'){?>
				<?php if(count($items) > 0){?>
				<div class="job-detail validator-v5">
                    <div class="listbox"><table style="12px/1.5 arial,\5b8b\4f53;" class="table table-striped table-hover" width=100%>
                    <tr style="font-weight:bold;text-align:center;"><td style="width:1%"></td><td style="width:17%;">公司</td><td style="width:20%;">职位</td><td style="width:15%;">实习地点</td><td style="width:12%;">发布时间</td><td style="width:7%"></td><td style="width:7%">状态</td><td>操作</td></tr>
						<?php foreach($items as $item):?>
                    <tr><td></td><td><?php echo mb_substr($item['company'], 0, 12, "utf-8")?></td><td><?php echo mb_substr($item['job'], 0, 16, "utf-8");?></td><td><?php echo mb_substr($item['place'], 0, 8, "utf-8");?></td><td><?php echo date("Y-m-d",strtotime($item['publish_time']))?></td><td><a href="<?php echo site_url()?>/job/detail/<?php echo $item['id']?>", target="_blank">详情</a></td>
					<td><?php if($item['state'] == 1) echo "有效"; else echo "无效";?></td>
						<td><span><a href="<?php echo site_url()?>/job/changeJobState/<?php echo $item['id'];?>/<?php echo $item['state']?>"><?php if($item['state'] == 1) echo "使无效"; else echo "重激活";?></a></span><span style="margin-left:8px;"><a href="<?php echo site_url()?>/job/edit/<?php echo $item['id'];?>" >编辑</a></span><span style="margin-left:8px;"><a href="<?php echo site_url()?>/job/topJob/<?php echo $item['id'];?>" >一键置顶</a></span></td></tr>
						<?php  endforeach ?>
                    </table></div>
				</div>
				<?php }?>
				<?php if(count($items) <= 0){?>
					<p style="margin-left:50px;margin-top:100px;"><?php echo "您截止到目前还没有发过帖子:)";?></p>
				<?php }?>
				<?php }?>
				
			</div>
			<div style="clear:both;"></div>
        </div>
		</div>
		<?php require("footer.php")?>
		<?php require("stat.php");?>
</body>
</html>
