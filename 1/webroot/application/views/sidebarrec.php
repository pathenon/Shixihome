					 <div class="bannertip" style="border-bottom: 1px solid rgb(243, 101, 35);">
						<span class ="title" style="background: rgb(243, 101, 35); ">热门暑期实习</span>
					</div>
				<?php  for($i = 0; $i < count($hotsummer); ++$i){
					$rec = $hotsummer[$i];
				?>
				<div style="margin-top:20px;">
					<div class="bighead"><img src="<?php echo base_url().'/images/s'.rand(1, 7).'.jpg'?>"/></div>
					<div class="rec_job_title"><a href="<?php echo site_url()?>/job/detail/<?php echo $rec['id'];?>", target="_blank"><?php echo mb_substr(strip_tags($rec['job']), 0, 15, "utf-8");?></a></div>				
				</div>
				<?php }?>
				<br/>
				 <div class="bannertip" style="border-bottom: 1px solid rgb(153, 204, 1);">
						<span class ="title" style="background: rgb(153, 204, 1); ">热门内推实习</span>
				</div>
				<?php  for($i = 0; $i < count($hotrec); ++$i){
					$rec = $hotrec[$i];
				?>
				<div style="margin-top:20px;">
					<div class="bighead"><img src="<?php echo base_url().'/images/s'.rand(1, 7).'.jpg'?>"/></div>
					<div class="rec_job_title"><a href="<?php echo site_url()?>/job/detail/<?php echo $rec['id'];?>", target="_blank"><?php echo mb_substr(strip_tags($rec['job']), 0, 15, "utf-8");?></a></div>				
				</div>
				<?php }?>