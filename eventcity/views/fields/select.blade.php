<div class="form-group">
  <label for="<?=$campo;?>"><?=$texto;?></label>
  <select name="<?=$campo;?>" class="form-control">
  	<?php 
  		foreach($opciones as $key=>$val){ 
  			$selected="";
  			if($key == $value){
  				$selected="selected";
  			}
  	?>
  		<option value="<?=$key;?>" <?=$selected;?>><?=$val;?></option>
	<?php } ?>
  </select>
</div>