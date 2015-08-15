<?php

/*
    实习之家
    @author yongleixiao
*/


define("TOKEN", "shixihome");
define("MODE", "DEBUG");
define("BASE_API", "http://www.shixihome.com/index.php/api/");

$weixinAPI = new API();

if (!isset($_GET['echostr'])) {
    $weixinAPI->responseMsg();
} else {
    $weixinAPI->valid();
}


class API
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if($tmpStr == $signature){
            return true;
        } else {
            return false;
        }
    }

    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)){
            $this->logger("R ".$postStr);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $RX_TYPE = trim($postObj->MsgType);
            switch ($RX_TYPE)
            {
                case "event":
                    $result = $this->receiveEvent($postObj);
                    break;
                case "text":
                    $result = $this->receiveText($postObj);
                    break;
                case "location":
                    $result = $this->receiveLocation($postObj);
                    break;
                case "voice":
                    $result = $this->receiveVoice($postObj);
                    break;
                default:
                    $result = "";
                    break;
            }
            $this->logger("T ".$result);
            echo $result;
        }else {
            echo "";
            exit;
        }
    }
    
    private function receiveEvent($object)
    {
        $content = "";
        switch ($object->Event)
        {
            case "subscribe":
                $url = BASE_API . "getHelp";
            	$content = file_get_contents($url);
                break;
            case "unsubscribe":
                $content = "取消关注";
                break;
            default:
                $content = "";
                break;
        }
        $result = $this->transmitText($object, $content);
        return $result;
    }
  
    private function receiveText($object)
    {
        $keyword = trim($object->Content);
        if (strpos($keyword, "@")){
            $words = explode("@", $keyword);
            if (count($words) != 2) {
                return "消息格式不对，格式为：公司名称@城市";
                exit;
            }
            $company = $words[0];
            $place = $words[1];
            $url = BASE_API . "searchCompanyAtPlace?company=" .urlencode($company). "&place=". urlencode($place);
            $content = file_get_contents($url);
            $news = json_decode($content, true);
            //$result = $this->transmitText($object, $content);
            $result = $this->transmitNews($object, $news);
        } else {
            $result = $this->callAPIFunc($object, $keyword);
        }
        return $result;
    }

    private function transmitText($object, $content)
    {
        $textTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[text]]></MsgType>
					<Content><![CDATA[%s]]></Content>
					</xml>";
        $result = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content);
        return $result;
    }

    private function transmitNews($object, $arr_item)
    {
        if(!is_array($arr_item))
            return;
        
        $item_str = "";
        
        $itemTpl = "<item>
        			<Title><![CDATA[%s]]></Title>
        			<Description><![CDATA[%s]]></Description>
                   	<PicUrl><![CDATA[]]></PicUrl>
        			<Url><![CDATA[%s]]></Url>
    				</item>";
        
        foreach ($arr_item as $item) {
            //This is used for debug
            $picUrl = 'http://thinkshare.duapp.com/images/suzhou.jpg';
            $url = $item['url'] ;
            $title = $item['job'];
            $description = $item['description'];
            $str = sprintf($itemTpl, $title, $description, $url);
            $item_str .= $str;
        }

        $newsTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[news]]></MsgType>
					<ArticleCount>%s</ArticleCount>
					<Articles>" . $item_str ."</Articles>
                    <FuncFlag>0</FuncFlag>
					</xml>";

        $result = sprintf($newsTpl, $object->FromUserName, $object->ToUserName, time(), count($arr_item));
        return $result;
    }
    
    private function callAPIFunc($object, $keyword) {
        $result = "";
        $url = "";
        if ($keyword == "9" or $keyword == "帮助") {
        	$url = BASE_API . "getHelp";
            $content = file_get_contents($url);
            $result = $this->transmitText($object, $content);
            return $result;
        }
        if ($keyword == "1" or $keyword == "热门公司") {
        	$url = BASE_API . "searchHotCompany";
        }
        if ($keyword == "2" or $keyword == "私企") {
        	$url = BASE_API . "searchDomesticCompany";
        }
        if ($keyword == "3" or $keyword == "外企") {
        	$url = BASE_API . "searchInternationalCompany";
        }
        if ($keyword == "4" or $keyword == "创业") {
        	$url = BASE_API . "searchStartupCompany";
        }
        if ($keyword == "5" or $keyword == "国企") {
        	$url = BASE_API . "searchStateOwnedCompany";
        }
        if ($url != ""){
        	$content = file_get_contents($url);
        	$news = json_decode($content, true);
        	$result = $this->transmitNews($object, $news);
        } else {
        	$url = BASE_API . "getHelp";
            $content = file_get_contents($url);
            $result = $this->transmitText($object, $content);
        }
        return $result;            
    }

    
    /*
     * The following functions are deprecated
     */
    private function logger($log_content)
    {
        
    }
    
    function make_news($object, $data, $flag = 0){ 
  		$num = count($data);
  		if($num > 1){
   			$items = $this->news_add($data);
   			$news = "<xml>
      		<ToUserName><![CDATA[" . $object->FromUserName . "]]></ToUserName>
      		<FromUserName><![CDATA[" . $object->ToUserName . "]]></FromUserName>
      		<CreateTime><![CDATA[" . time() . "]]></CreateTime> 
      		<MsgType><![CDATA[news]]></MsgType> 
      		<Content><![CDATA[%s]]></Content> 
      		<ArticleCount>" . $num . "</ArticleCount> 
      		<Articles> " . $items . "</Articles> 
      		<FuncFlag>" . $flag . "</FuncFlag> 
      		</xml>";
   			return $news;
  		} else {
            $BASE = "http://www.shixihome.com/index.php/job/detail/";
            $url = $BASE . $data[0]['id'];
   			$news = "<xml>
            <ToUserName><![CDATA[" . $object->FromUserName . "]]></ToUserName>
      		<FromUserName><![CDATA[" . $object->ToUserName . "]]></FromUserName>
      		<CreateTime><![CDATA[" . time() . "]]></CreateTime> 
      		<MsgType><![CDATA[news]]></MsgType> 
      		<Content><![CDATA[%s]]></Content> 
      		<ArticleCount>1</ArticleCount> 
      		<Articles> 
      		<item> 
      		<Title><![CDATA[" .$data[0]['job']. "]]></Title> 
      		<Description><![CDATA[" .$data[0]['requirement']. "]]></Description> 
      		<PicUrl><![CDATA[" .$url. "]]></PicUrl> 
      		<Url><![CDATA[". $url. "]]></Url> 
      		</item></Articles> 
      		<FuncFlag>" . $flag . "</FuncFlag> 
      		</xml>";
   		return $news;
  		}
	}

	function news_add($data){
  		$items = "";
        $BASE = "http://www.shixihome.com/index.php/job/detail/";
  		foreach ($data as $k){
            $url = $BASE . $k['id'];
  			$items .= "<item> 
     		<Title><![CDATA[". $k['job']. "]]></Title> 
     		<Description><![CDATA[". $k['requirement']. "]]></Description> 
     		<PicUrl><![CDATA[". $url ."]]></PicUrl> 
     		<Url><![CDATA[" .$url . "]]></Url> 
     		</item> ";
   		}
   		return $items;
	}
}

?>
