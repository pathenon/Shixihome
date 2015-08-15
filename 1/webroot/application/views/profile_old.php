<html>
<head>
	<?php require("title.php");?>
</head>
<body>
		<?php require("header.php")?>
        <div class="container2">
            <div class="wrapper" style="text-align:left;">
			<div class="content">					
				<div class="job-detail validator-v5">
					<p class="title">个人信息</p>
                    <p><span>用户名：</span><span><?php if($client['name'] != null) echo $client['name']?></span></p><br/>
                    <p><span>注册邮箱：</span><span><?php if($client['email'] != null) echo $client['email']?></span></p><br/>
                    <p><span>绑定电话：</span><span><?php if($client['phone'] != null) echo $client['phone']?></span></p><br/>
					<p><span>社交账户：</span><span><?php if($client['social_account'] != null) echo $client['social_account']?></span></p><br/>
				</div>
				
				<?php if($intern != null){ ?>
				<?php echo form_open_multipart("rencai/updateInternInfo/".$intern['uid']); ?>
				<div class="job-detail validator-v5">
					<p class="title">我的实习简历</p>
                    <p><span>LinkedIn简历</span><input name ="resume" size=100 value="<?php if($intern['resume'] != null) echo $intern['resume']?>"/></p><br/>
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
					</form></span></p>
				</div>
				<?php }?>
				
				
				<div class="job-detail validator-v5">
					<p class="title">我的消息</p>
                    <div class="listbox"><table style="12px/1.5 arial,\5b8b\4f53;" class="table table-striped table-hover" width=100%>
                    <tr style="font-weight:bold;"><td style="width:1%"></td><td style="width:10%;">发信人</td><td style="width:65%;">内容</td><td style="width:17%;">发送时间</td><td>操作</td></tr>
						<?php foreach($msgs as $msg):?>
                    <tr><td></td><td><?php echo $msg['from_name'];?></td><td><?php echo $msg['content'];?></td><td><?php echo $msg['publish_time'];?></td><td><a href="<?php echo site_url()."/social/email/".$msg['from_id']?>">回复</a></td></tr>
						<?php  endforeach ?>
                    </table></div>
				</div>
				
				
				<div class="job-detail validator-v5">
					<p class="title">我的帖子</p>
                    <div class="listbox"><table style="12px/1.5 arial,\5b8b\4f53;" class="table table-striped table-hover" width=100%>
                    <tr style="font-weight:bold;text-align:center;"><td style="width:1%"></td><td style="width:17%;">公司</td><td style="width:20%;">职位</td><td style="width:15%;">实习地点</td><td style="width:12%;">发布时间</td><td style="width:7%"></td><td style="width:7%">状态</td><td>操作</td></tr>
						<?php foreach($items as $item):?>
                    <tr><td></td><td><?php echo mb_substr($item['company'], 0, 12, "utf-8")?></td><td><?php echo mb_substr($item['job'], 0, 16, "utf-8");?></td><td><?php echo mb_substr($item['place'], 0, 8, "utf-8");?></td><td><?php echo date("Y-m-d",strtotime($item['publish_time']))?></td><td><a href="<?php echo site_url()?>/job/detail/<?php echo $item['id']?>", target="_blank">详情</a></td>
					<td><?php if($item['state'] == 1) echo "有效"; else echo "无效";?></td>
						<td><span><a href="<?php echo site_url()?>/job/changeJobState/<?php echo $item['id'];?>/<?php echo $item['state']?>"><?php if($item['state'] == 1) echo "使无效"; else echo "重激活";?></a></span><span style="margin-left:8px;"><a href="<?php echo site_url()?>/job/edit/<?php echo $item['id'];?>" >编辑</a></span><span style="margin-left:8px;"><a href="<?php echo site_url()?>/job/topJob/<?php echo $item['id'];?>" >一键置顶</a></span></td></tr>
						<?php  endforeach ?>
                    </table></div>
				</div>
					
			</div>
           </div>
            <div style="clear:both;"></div>
        </div>

		<?php require("footer.php")?>
		<?php require("stat.php");?>
</body>
</html>
