
<div class="listbox" style="border:0">
	<?php for($i = 0; $i < count($items); ++$i){
		$item = $items[$i];
	?>
     <div style="padding-top:15px;">
		<div style="width:40%; float:left;">
			<div>
				<div class="job_title"><a href="<?php echo site_url()?>/parttime/detail/<?php echo $item['id']?>", target="_blank"><?php echo mb_substr(strip_tags($item['job']), 0, 21, "utf-8");?></a></div>
				<div class="job_time"><?php echo date("Y-m-d",strtotime($item['publish_time']))?></div>
				<div class="job_desc"><?php echo mb_substr(str_replace('&nbsp;', '', str_replace('<br/>', '', strip_tags($item['description']))), 0, 110, "utf-8")."...";?></div>
				<div style="margin-top:15px;"><a class="login_bnt" href="<?php echo site_url()?>/parttime/detail/<?php echo $item['id']?>" , target="_blank">详情</a></div>
			</div>
		</div>
		<?php ++$i; if($i < count($items)){ 
			$item = $items[$i];
		?>
		<div style="width:40%; margin-left:10%; float:left; ">
			<div>
				<div class="job_title"><a href="<?php echo site_url()?>/parttime/detail/<?php echo $item['id']?>", target="_blank"><?php echo mb_substr($item['job'], 0, 21, "utf-8");?></a></div>
				<div class="job_time"><?php echo date("Y-m-d",strtotime($item['publish_time']))?></div>
				<div class="job_desc"><?php echo mb_substr(str_replace('&nbsp;', '', str_replace('<br/>', '', strip_tags($item['description']))), 0, 110, "utf-8")."...";?></div>
				<div style="margin-top:15px;"><a class="login_bnt" href="<?php echo site_url()?>/parttime/detail/<?php echo $item['id']?>" , target="_blank">详情</a></div>
			</div>
		</div>
		<?php }?>
		<div style="clear:both;"></div>
		<br/>
	</div>
	<div style="border-bottom:1px dashed grey; width:90%;"></div>
	<?php  } ?>
	
	
</div>