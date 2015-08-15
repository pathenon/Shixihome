<?php
session_start();

include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

if (isset($_REQUEST['code'])) {
	$keys = array();
	$keys['code'] = $_REQUEST['code'];
	$keys['redirect_uri'] = WB_CALLBACK_URL;
	try {
		$token = $o->getAccessToken( 'code', $keys ) ;
	} catch (OAuthException $e) {
	}
}

if ($token) {
	$_SESSION['token'] = $token;
	setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
	
	$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );

	$ms  = $c->home_timeline(); // done
	$uid_get = $c->get_uid();
	$uid = $uid_get['uid'];
	$user_message = $c->show_user_by_id( $uid);//鏍规嵁ID鑾峰彇鐢ㄦ埛绛夊熀鏈俊鎭?	//$_SESSION['avatar'] = $user_message["profile_image_url"];
	//var_dump($user_message);
	//$_SESSION['user'] = $user_message["screen_name"];
?>
授权成功，<a href="<?php echo site_url()?>/user/weibo_login/<?php echo $user_message["screen_name"];?>/<?php echo urlencode($user_message["profile_image_url"]);?>">返回首页</a><br />
		<script type='text/javascript'>
         window.location.href='/index.php/user/weibo_login/<?php echo $user_message["screen_name"];?>/<?php echo urlencode($user_message["profile_image_url"]);?>';
        </script>
<?php
} else {
?>
授权失败，<a href="<?php echo site_url()?>">返回首页</a>
		<script type='text/javascript'>
         window.location.href='/index.php/job/index';
        </script>
<?php
}
?>
