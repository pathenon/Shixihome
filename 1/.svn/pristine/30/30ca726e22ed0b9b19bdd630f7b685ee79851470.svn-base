<?php if(isset($recommend) && count($recommend) > 0){?>
<div class="listbox" style="border: 1px solid #FFA042;border-radius: 8px; margin-top: 10px;">
<p style="font-size:22px;background:#FFA042;text-align:center;color:white;">精选实习职位</p>	
<div class="listbox" style="border:0; padding-left:50px;padding-bottom:20px;">
	
	<!--div style="border-bottom:1px dashed grey; width:90%;"></div-->
	<?php for($i = 0; $i < count($recommend); ++$i){
		$rec = $recommend[$i];
	?>
		
		<div style="width:45%; float:left;padding-top:15px; margin-right:10px;">
				<div class="rec_job_title"><a href="<?php echo site_url()?>/job/detail/<?php echo $rec['id']?>", target="_blank"><?php echo mb_substr(strip_tags($rec['company'].'-'.$rec['job']), 0, 30, "utf-8");?></a></div>
		</div>
	<?php  } ?>

	<div style="clear:both;"></div>
	<!--div style="border-bottom:1px dashed grey; width:90%;"></div><br/-->
</div>
</div>
<?php }?>

<!--div>

<script type="text/javascript">
/*960*90，创建于2014-6-27*/
var cpro_id = "u1601197";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
</div>
<br/-->

<div class="listbox" style="border: 1px solid #66CCFF;border-radius: 8px;margin-top:10px;">
	<p style="font-size:22px;background:#66CCFF;text-align:center;color:white;">热门实习职位</p>
	<?php for($i = 0; $i < count($items); ++$i){
		$item = $items[$i];
	?>
     <div style="padding-top:15px;padding-left:50px;">
		<div style="width:40%; float:left;">
			<div>
				<div class="job_title"><a href="<?php echo site_url()?>/job/detail/<?php echo $item['id']?>", target="_blank"><?php echo mb_substr(strip_tags($item['job']), 0, 21, "utf-8");?></a></div>
				<div class="job_time"><?php echo date("Y-m-d",strtotime($item['publish_time']))?></div>
				<div class="job_desc"><?php echo mb_substr(str_replace('&nbsp;', '', str_replace('<br/>', '', strip_tags($item['description']))).str_replace('&nbsp;', '', str_replace('<br/>', '', strip_tags($item['requirement']))), 0, 110, "utf-8")."...";?></div>
				<div style="margin-top:15px;"><a class="login_bnt" href="<?php echo site_url()?>/job/detail/<?php echo $item['id']?>" , target="_blank">详情</a></div>
			</div>
		</div>
		<?php ++$i; if($i < count($items)){ 
			$item = $items[$i];
		?>
		<div style="width:40%; margin-left:10%; float:left; ">
			<div>
				<div class="job_title"><a href="<?php echo site_url()?>/job/detail/<?php echo $item['id']?>", target="_blank"><?php echo mb_substr($item['job'], 0, 21, "utf-8");?></a></div>
				<div class="job_time"><?php echo date("Y-m-d",strtotime($item['publish_time']))?></div>
				<div class="job_desc"><?php echo mb_substr(str_replace('&nbsp;', '', str_replace('<br/>', '', strip_tags($item['description']))).str_replace('&nbsp;', '', str_replace('<br/>', '', strip_tags($item['requirement']))), 0, 110, "utf-8")."...";?></div>
				<div style="margin-top:15px;"><a class="login_bnt" href="<?php echo site_url()?>/job/detail/<?php echo $item['id']?>" , target="_blank">详情</a></div>
			</div>
		</div>
		<?php }?>
		<div style="clear:both;"></div>
		<br/>
	</div>
	<div class="cutting_line" style="border-bottom:1px dashed grey; width:90%;margin-left:50px;"></div>
	<?php  } ?>
	
	
</div>