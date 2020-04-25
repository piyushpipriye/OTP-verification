<?php
function redirect($new_location){
	header("Location:".$new_location);
	exit;
}