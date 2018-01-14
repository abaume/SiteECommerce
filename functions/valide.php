<?php
function isValid($text)
{
	$delim = array(",","'","/*","*/","--","xp_","AUX", "CLOCK$", "COM", "CON", "CONFIG$", "LPT", "NUL","PRN");
	foreach($delim as $elem)	{
		if(strpos($text,$elem)>0)
		  return false;
	}  
	return true;
} 
?>