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
<div class="joblist-box rec-border">
<p style="font-size:22px;background:#FFA042;text-align:center;color:white;">精选实习职位</p>	
	<?php for($i = 0; $i < count($recommend); ++$i){
		$rec = $recommend[$i];
	?>		
	<div style="width:98%;margin-left:auto; margin-right:auto; padding-top:10px;">
		<span class="job_title"><a href="<?php echo site_url()?>/job/appdetail/<?php echo $rec['id']?>", target="_blank"><?php echo mb_substr(strip_tags($rec['company'].'-'.$rec['job']), 0, 15, "utf-8");?></a></span>
		<span class="job_time">
			<?php 		
				echo friendlyDate(strtotime($rec['publish_time']), "mohu");
			?>
		</span>
	</div>
	<div class="cutting_line" style="border-bottom:1px dashed grey; width:95%;margin-left:auto; margin-right:auto; padding-top:10px;"></div>
	<?php  } ?>
</div>
<?php  } ?>
	
<div class="joblist-box com-border">
	<p style="font-size:22px;background:#66CCFF;text-align:center;color:white;">热门实习职位</p>
	<?php for($i = 0; $i < count($items); ++$i){
		$item = $items[$i];
	?>
     <div style="width:98%;margin-left:auto; margin-right:auto; padding-top:10px;">
			<span class="job_title"><a href="<?php echo site_url()?>/job/appdetail/<?php echo $item['id']?>", target="_blank"><?php echo mb_substr(strip_tags($item['job']), 0, 15, "utf-8");?></a></span>
			<span class="job_time">
			<?php 		
				echo friendlyDate(strtotime($item['publish_time']), "mohu");
			?>
			</span>
			<!--div class="job_desc"><?php echo mb_substr(str_replace('&nbsp;', '', str_replace('<br/>', '', strip_tags($item['description']))).str_replace('&nbsp;', '', str_replace('<br/>', '', strip_tags($item['requirement']))), 0, 110, "utf-8")."...";?></div-->
			<!--div style="margin-top:15px;"><a class="login_bnt" href="<?php echo site_url()?>/job/detail/<?php echo $item['id']?>" , target="_blank">详情</a></div-->
	</div>
	<div class="cutting_line" style="border-bottom:1px dashed grey; width:95%;margin-left:auto; margin-right:auto; padding-top:10px;"></div>
	<?php  } ?>
</div>