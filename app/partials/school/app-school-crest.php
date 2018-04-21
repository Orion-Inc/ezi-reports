<?php
	$crest = School::getSchoolCrest($_SESSION['SESS_USER_ID']);
?>
<a href="#" class="thumbnail"> 
	<img alt="<?php App::show($_SESSION['SESS_USER_ID'])?>" style="height: 180px; width: 100%; display: block;" src="<?php App::show('data:image;base64,'.$crest)?>">
</a>