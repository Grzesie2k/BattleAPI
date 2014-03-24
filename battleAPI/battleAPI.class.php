<?php
/**
 * BattleAPI is a simple API for Battlelog written in PHP
 * @author Grzegorz Kielak <grzesie.k@o2.pl>
 * @version 140306
 */
class battleAPI {
	private $cfg;
	public function __construct($iniCfgFile='config.ini'){
		$this->loadCfg($iniCfgFile);
	}
	public function loadCfg($iniCfgFile){
		$this->cfg=parse_ini_file(__DIR__.'/'.$iniCfgFile);
		if(is_array($this->cfg))
			return $this->cfg;
		else $this->cfg=array();
		return false;
	}
	private $game;
	private function loadGame($game){
		if(isset($this->game[$game]))
			return true;
		$this->game[$game]=parse_ini_file(__DIR__."/$game/game.ini",true);
		if(is_array($this->game[$game])){
			return $this->game[$game]['url']=parse_ini_file(__DIR__."/$game/url.ini",true);
		}
		return false;
	}
	public $errorReporting=true;
	private function error($message){
		if(!$this->errorReporting) return false;
		$debug=debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS,2)[1];
		$debug="$message in <b>$debug[file]</b> with <b>$debug[class]$debug[type]$debug[function]</b> on line <b>$debug[line]</b>";
		return !trigger_error($debug);
	}
	private function isValIdQuery($game,$platform,$object,$param,$value){
		if(!$this->loadGame($game))								return $this->error("InvalId query parameter 1 '$game'");
		if(!isset($this->game[$game]['platforms'][$platform]))	return $this->error("InvalId query parameter 2 '$platform'");
		if(!isset($this->game[$game]['url'][$object]))			return $this->error("InvalId query parameter 3 '$object'");
		if(!isset($this->game[$game]['url'][$object][$param]))	return $this->error("InvalId query parameter 4 '$param'");
		$keys=$this->getQueryKeys($game,$object,$param);
		if(count($keys)==1 && is_string($value)){
			$keys=array_values($keys);
			return $keys[0];
		}
		if(!is_array($value))									return $this->error('Parameter 5 expected to be an array');
		foreach($keys as $k){
			if(!isset($value[$k]))								return $this->error("Missing key '$k' in array in parameter 5");
		}
		return true;
	}
	public function getAvailableGames(){
		$output=array();
		foreach(scandir(__DIR__) as $file){
			if($file=trim($file,'.') and is_dir(__DIR__.'/'.$file))
				$output[]=$file;
		}
		return $output;
	}
	public function getAvailablePlatforms($game){
		return ($this->loadGame($game) && isset($this->game[$game]['platforms']))?array_keys($this->game[$game]['platforms']):false;
	}
	public function getAvailableObjects($game){
		return ($this->loadGame($game) && isset($this->game[$game]['url']))?array_keys($this->game[$game]['url']):false;
	}
	public function getAvailableParams($game,$object){
		return ($this->loadGame($game) && isset($this->game[$game]['url'][$object]))?array_keys($this->game[$game]['url'][$object]):false;
	}
	public function getQueryKeys($game,$object,$param){
		if(!$this->loadGame($game)) return $this->error("InvalId game '$object'");
		if(!isset($this->game[$game]['url'][$object])) return $this->error("InvalId object '$object'");
		if(!isset($this->game[$game]['url'][$object][$param])) return $this->error("InvalId param '$param'");
		if(!preg_match_all('/\{([a-zA-Z0-9]+)\}/',$this->game[$game]['url'][$object][$param],$keys))
			return true;
		foreach($keys[1] as $k=>$key){
			if(in_array($key,array('platform','platformId'))) unset($keys[1][$k]);
		}
		return $keys[1];
	}
	public function get($game,$platform,$object,$param,$value){
		$k=$this->isValIdQuery($game,$platform,$object,$param,$value);
		if(!$k) return false;
		if(is_string($k))
			$value=array($k=>$value);
		$value['platform']=$platform;
		$value['platformId']=$this->game[$game]['platforms'][$platform];
		foreach($value as $k=>$v){
			$search[]='{'.$k.'}';
			$replace[]=$v;
		}
		list($url,$post,$part)=explode(' ',str_replace($search,$replace,$this->game[$game]['url'][$object][$param]).'  ');
		$url=$this->cfg['battlelog']."/$game/".$url;
		if(!strpos($post,'=')){
			$part=$post;
			$post=null;
		}
		return $this->sendQuery($url,$post,$part);
	}
	private function sendQuery($url,$post=null,$part=null){
		$ch=curl_init($url);
		curl_setopt_array($ch,array(
			CURLOPT_FOLLOWLOCATION	=>false,
			CURLOPT_USERAGENT		=>$this->cfg['useragent'],
			CURLOPT_TIMEOUT			=>1,
			CURLOPT_RETURNTRANSFER	=>true,
		));
		if(!empty($post)) curl_setopt_array($ch,array(
			CURLOPT_POST		=>true,
			CURLOPT_POSTFIELDS	=>$post
		));
		$response=curl_exec($ch);
		curl_close($ch);
		if(strpos($response,'<!DOCTYPE html>')!==FALSE){
			$response=substr($response,strpos($response,'Surface.globalContext = ')+24);
			$response=substr($response,0,strpos($response,'};')+1);
		}
		$response=@json_decode($response,true,9999);
		if(!is_array($response))return null;
		if(!empty($part) and isset($response[$part]))
			$response=$response[$part];
		return $response;
	}
}
?>
