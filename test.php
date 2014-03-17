<?php
error_reporting(E_ALL);
require 'BattleAPI/BattleAPI.class.php';
$api=new BattleAPI;
echo '<form method="GET" action="">';

echo (isset($_GET['game']))?'<input type="hidden" name="game" value="'.$_GET['game'].'"/>':'';
echo '<label>Game: <select name="game"'.((isset($_GET['game']))?' disabled="disabled"':'').'>';
foreach($api->getAvailableGames() as $game)
	echo '<option'.((isset($_GET['game']) && $_GET['game']==$game)?' selected="selected"':'').'>'.$game.'</option>';
echo '</select></label>';

if(isset($_GET['game'])){
	echo (isset($_GET['platform']))?'<input type="hidden" name="platform" value="'.$_GET['platform'].'"/>':'';
	echo '<label>Platform: <select name="platform"'.((isset($_GET['platform']))?' disabled="disabled"':'').'>';
	foreach($api->getAvailablePlatforms($_GET['game']) as $platform)
		echo '<option'.((isset($_GET['platform']) && $_GET['platform']==$platform)?' selected="selected"':'').'>'.$platform.'</option>';
	echo '</select></label>';
	
	if(isset($_GET['platform'])){
		echo (isset($_GET['object']))?'<input type="hidden" name="object" value="'.$_GET['object'].'"/>':'';
		echo '<label>Object: <select name="object"'.((isset($_GET['object']))?' disabled="disabled"':'').'>';
		foreach($api->getAvailableObjects($_GET['game']) as $object)
			echo '<option'.((isset($_GET['object']) && $_GET['object']==$object)?' selected="selected"':'').'>'.$object.'</option>';
		echo '</select></label>';
		
		if(isset($_GET['object'])){
			echo (isset($_GET['param']))?'<input type="hidden" name="param" value="'.$_GET['param'].'"/>':'';
			echo '<label>Param: <select name="param"'.((isset($_GET['param']))?' disabled="disabled"':'').'>';
			foreach($api->getAvailableParams($_GET['game'],$_GET['object']) as $param)
				echo '<option'.((isset($_GET['param']) && $_GET['param']==$param)?' selected="selected"':'').'>'.$param.'</option>';
			echo '</select></label>';

			if(isset($_GET['param'])){
				echo '<fieldset><legend>Vars</legend>';
				foreach($api->getQueryKeys($_GET['game'],$_GET['object'],$_GET['param']) as $key)
					echo '<label>'.$key.': <input type="text" name="value['.$key.']" placeholder="'.$key.'" value="'.((isset($_GET['value'][$key]))?$_GET['value'][$key]:'').'" /></label>';
				echo '</fieldset>';
			}
		}
	}
}	
if(!empty($_GET['game']) && !empty($_GET['object']) && !empty($_GET['param'])){
	echo '<input type="submit" value="Query" /></form>';
	if(!empty($_GET['value'])){
		$value='';
		if(is_array($_GET['value'])){
			if(count($_GET['value'])==1){
				$value=array_values($_GET['value']);
				$value="'".addslashes($value[0])."'";
			}else {
				$value='array(';
				foreach($_GET['value'] as $k=>$v){
					$value.="'".addslashes($k)."'=>'".addslashes($v)."',";
				}
				$value=substr($value,0,-1).')';
			}
		}
		echo "<pre>".highlight_string('<?php'."\nrequire 'BattleAPI/BattleAPI.class.php';\n\$api=new BattleAPI;\n\$data=\$api->get('$_GET[game]','$_GET[platform]','$_GET[object]','$_GET[param]',$value);\nvar_dump(\$data);\n?>",1)."</pre>";
		echo '<pre>';
		$t=microtime(true);
		eval("\$result=\$api->get('$_GET[game]','$_GET[platform]','$_GET[object]','$_GET[param]',$value);");
		$t=microtime(true)-$t;
		var_dump($result);
		echo '</pre>';
		echo '<p>Wygenerowano w '.number_format($t,2).'s</p>';
	}
}else{
	echo '<input type="submit" value="Next step" /></form>';
}