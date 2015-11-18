<?php

class MailRU {
	private $_URL, $_videoId, $_videoUrls, $_headers, $_VideoKey, $_isOneQuality;
	
	public function __construct($urlData) {
		$this->_URL = $urlData;
		$this->getVideoId();
		$this->getVideoUrls();
		$this->getVideoKey();
	}
	
	private function getVideoId() {
		$result = str_replace("https://my.mail.ru/","",$this->_URL);
		$result = str_replace("/video/","/",$result);
		$result = str_replace(".html","",$result);
		$this->_videoId = $result;
	}
	
	private function getJson() {
		$result = file_get_contents("http://videoapi.my.mail.ru/videos/".$this->_videoId.".json");
		$this->_headers = $http_response_header;
		return $result;
	}
	
	private function getVideoUrls() {
		$json = json_decode($this->getJson());
		
		if (count((array)$json->videos) === 1)
			$this->_isOneQuality = true;
		
		$this->_videoUrls = $json->videos;
	}
	
	private function getVideoKey() {
		foreach($this->_headers as $header) {
			if (strpos($header,'Set-Cookie') !== false)
			{
				$value = explode("video_key=",$header)[1];
				$value = explode(";",$value)[0];
				$this->_VideoKey = $value;
			}
		}
	}
	
	public function IsOneQuality() {
		return $this->_isOneQuality;
	}
	
	public function VideoUrls() {
		return $this->_videoUrls;
	}
	
	public function VideoKey() {
		return $this->_VideoKey;
	}
}
