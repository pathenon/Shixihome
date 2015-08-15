<?php
function friendlyDate($sTime,$type = 'normal',$alt = 'false') {
			if (!$sTime)
				return '';
			//sTime=源时间，cTime=当前时间，dTime=时间差
			$cTime      =   time();
			$dTime      =   $cTime - $sTime;
			$dDay       =   intval(date("z",$cTime)) - intval(date("z",$sTime));
			//$dDay     =   intval($dTime/3600/24);
			$dYear      =   intval(date("Y",$cTime)) - intval(date("Y",$sTime));
			//normal：n秒前，n分钟前，n小时前，日期
			if($type=='normal'){
				if( $dTime < 60 ){
					if($dTime < 10){
						return '刚刚';    //by yangjs
					}else{
						return intval(floor($dTime / 10) * 10)."秒前";
					}
				}elseif( $dTime < 3600 ){
					return intval($dTime/60)."分钟前";
				//今天的数据.年份相同.日期相同.
				}elseif( $dYear==0 && $dDay == 0  ){
					//return intval($dTime/3600)."小时前";
					return '今天'.date('H:i',$sTime);
				}elseif($dYear==0){
					return date("m月d日 H:i",$sTime);
				}else{
					return date("Y-m-d H:i",$sTime);
				}
			}elseif($type=='mohu'){
				if( $dTime < 60 ){
					return $dTime."秒前";
				}elseif( $dTime < 3600 ){
					return intval($dTime/60)."分钟前";
				}elseif( $dTime >= 3600 && $dDay == 0  ){
					return intval($dTime/3600)."小时前";
				}elseif( $dDay > 0 && $dDay<=7 ){
					return intval($dDay)."天前";
				}elseif( $dDay > 7 &&  $dDay <= 30 ){
					return intval($dDay/7) . '周前';
				}elseif( $dDay > 30 ){
					return intval($dDay/30) . '个月前';
				}
			//full: Y-m-d , H:i:s
			}elseif($type=='full'){
				return date("Y-m-d , H:i:s",$sTime);
			}elseif($type=='ymd'){
				return date("Y-m-d",$sTime);
			}else{
				if( $dTime < 60 ){
					return $dTime."秒前";
				}elseif( $dTime < 3600 ){
					return intval($dTime/60)."分钟前";
				}elseif( $dTime >= 3600 && $dDay == 0  ){
					return intval($dTime/3600)."小时前";
				}elseif($dYear==0){
					return date("Y-m-d H:i:s",$sTime);
				}else{
					return date("Y-m-d H:i:s",$sTime);
				}
			}
 }
?>
<?php if(isset($recommend) && count($recommend) > 0){?>
<!--div class="listbox" style="border: 1px solid #FFA042; margin-top: 10px;">
<p style="font-size:22px;background:#FFA042;text-align:center;color:white;">精选实习职位</p-->	
<div class="listbox" style="margin-top:10px;">
	<p style="color:red;margin-left:5px;font-size:22px;"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span><span style="margin-left:10px;">精选实习职位</span></p>
	<div class="cutting_line" style="border-bottom:1px solid grey; width:98%;margin-top:10px; margin-left:auto; margin-right:auto;"></div>
	<?php for($i = 0; $i < count($recommend); ++$i){
		$rec = $recommend[$i];
	?>
		
		<!--div style="width:45%; float:left;padding-top:15px; margin-right:10px;">
				<div class="rec_job_title"><a href="<?php echo site_url()?>/job/detail/<?php echo $rec['id']?>", target="_blank"><?php echo mb_substr(strip_tags($rec['company'].'-'.$rec['job']), 0, 30, "utf-8");?></a></div>
		</div-->
		 <div style="padding-top:15px;padding-left:20px;">
		<div style="width:95%; margin-left:auto; margin-right:auto;">
			<div class="head" style="float:left; width:18%;"><img src="<?php echo base_url().'/images/h'.rand(1, 14).'.jpg'?>"/></div>
			<div style="float:left; width:75%;">
				<div class="job_title"><a href="<?php echo site_url()?>/job/detail/<?php echo $rec['id']?>", target="_blank"><?php echo mb_substr(strip_tags($rec['job']), 0, 40, "utf-8");?></a></div>				
				<div class="job_desc"><?php echo mb_substr(str_replace('&nbsp;', '', str_replace('<br/>', '', strip_tags($rec['description']))).str_replace('&nbsp;', '', str_replace('<br/>', '', strip_tags($rec['requirement']))), 0, 100, "utf-8")."...";?></div>
			</div>
			<div style="float:left; text-align:right; width:7%;">
				<div class="job_time"><?php echo friendlyDate(strtotime($rec['publish_time']), "mohu")?></div>
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
	<div class="cutting_line" style="border-bottom:1px dashed grey; width:95%;margin-top:10px; margin-left:auto; margin-right:auto;"></div>
	<?php  } ?>
</div>
<?php }?>


<!--div class="listbox" style="border: 1px solid #66CCFF;margin-top:10px;">
	<p style="font-size:22px;background:#66CCFF;text-align:center;color:white;">热门实习职位</p-->
<div class="listbox" style="margin-top:10px;">
	<p style="color:red;margin-left:5px;font-size:22px;"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span><span style="margin-left:10px;">热门实习职位</span></p>
	<div class="cutting_line" style="border-bottom:1px solid grey; width:98%;margin-top:10px; margin-left:auto; margin-right:auto;"></div>
	<?php for($i = 0; $i < count($items); ++$i){
		$item = $items[$i];
	?>
     <div style="padding-top:15px;padding-left:20px;">
		<div style="width:95%; margin-left:auto; margin-right:auto;">
			<div class="head" style="float:left; width:18%;"><img src="<?php echo base_url().'/images/h'.rand(1, 14).'.jpg'?>"/></div>
			<div style="float:left; width:75%;">
				<div class="job_title"><a href="<?php echo site_url()?>/job/detail/<?php echo $item['id']?>", target="_blank"><?php echo mb_substr(strip_tags($item['job']), 0, 40, "utf-8");?></a></div>				
				<div class="job_desc"><?php echo mb_substr(str_replace('&nbsp;', '', str_replace('<br/>', '', strip_tags($item['description']))).str_replace('&nbsp;', '', str_replace('<br/>', '', strip_tags($item['requirement']))), 0, 100, "utf-8")."...";?></div>
			</div>
			<div style="float:left; text-align:right; width:7%;">
				<div class="job_time"><?php echo friendlyDate(strtotime($item['publish_time']), "mohu")?></div>
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
	<div class="cutting_line" style="border-bottom:1px dashed grey; width:95%;margin-top:10px; margin-left:auto; margin-right:auto;"></div>
	<?php  } ?>
	
	
</div>