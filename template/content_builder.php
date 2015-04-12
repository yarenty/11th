<?php

function article_head_builder_full($header) {
 
 return "<table class=\"contentpaneopen\" ><tbody><tr>
<td class=\"contentheading\" >
<a href=\"#\" class=\"contentpagetitle\">".$header."</a>
</td></tr></tbody></table>";

};


function article_body_builder_full($strong, $text) {
 
return "<table class=\"contentpaneopen\"  width=\"95%\"><tbody><tr>
<td colspan=\"2\" valign=\"top\"><div align=\"left\">
<strong> ".$strong." </strong> ".$text." </div>
</td></tr></tbody></table>";
};



function article_body_builder_product_right($id, $name, $info, $price, $picture) {
 
 return "<table class=\"contentpaneopen\"  width=\"95%\"><tbody><tr>
<td valign=\"top\"><div align=\"left\">
	<u>Description:</u><br/> ".$info."	<br/><br/>
	<u>Price:</u><br/> <b>EUR ".$price."</b><br/>
</div>
</td><td valign=\"top\"><div align=\"right\">
<div style=\"text-align: center;\">
<a href=\"javascript:bigpicture('".$picture."',800,600)\" alt=\"".$name."\">
	<img alt=\"".$name."\" src=\"pictures/".$picture."\"></a><br/>
</div></div>

</td></tr><tr>
<td colspan=\"2\" valign=\"top\"><center>
<a href=\"order.php?pid=".$id."\">ORDER NOW</a><br/> </center>
</td></tr></tbody></table>";
 
};



function article_body_builder_product_left($id, $name, $info, $price, $picture) {
 
 return "<table class=\"contentpaneopen\"  width=\"95%\"><tbody><tr>
<td valign=\"top\"><div align=\"right\">
<div style=\"text-align: center;\">
<a href=\"javascript:bigpicture('".$picture."',800,600)\" alt=\"".$name."\">
	<img alt=\"".$name."\" src=\"pictures/".$picture."\"></a><br/>
</div></div>
</td> 
 <td valign=\"top\"><div align=\"left\">
	<u>Description:</u><br/> ".$info."	<br/><br/>
	<u>Price:</u><br/> <b>EUR ".$price."</b><br/>
</div>

</td></tr><tr>
<td colspan=\"2\" valign=\"top\"><center>
<a href=\"order.php?pid=".$id."\">ORDER NOW</a><br/> </center>
</td></tr></tbody></table>";
 
};



function article_body_builder_product_right_noorder($id, $name, $info, $price, $picture) {
 
 return "<table class=\"contentpaneopen\"  width=\"95%\"><tbody><tr>
<td valign=\"top\"><div align=\"left\">
".$info."	<br/><br/>
</div>
</td><td valign=\"top\"><div align=\"right\">
<div style=\"text-align: center;\">
<a href=\"javascript:bigpicture('".$picture."',800,600)\" alt=\"".$name."\">
	<img alt=\"".$name."\" src=\"pictures/".$picture."\"></a><br/>
</div></div>

</td></tr></tbody></table>";
 
};



function article_body_builder_product_left_noorder($id, $name, $info, $price, $picture) {
 
 return "<table class=\"contentpaneopen\"  width=\"95%\"><tbody><tr>
<td valign=\"top\"><div align=\"right\">
<div style=\"text-align: center;\">
<a href=\"javascript:bigpicture('".$picture."',800,600)\" alt=\"".$name."\">
	<img alt=\"".$name."\" src=\"pictures/".$picture."\"></a><br/>
</div></div>
</td> 
 <td valign=\"top\"><div align=\"left\">
 ".$info."	<br/><br/>
</div>

</td></tr></tbody></table>";
 
};




function article_separator_builder_full() {
  return "<span class=\"article_separator\">&nbsp;</span>";
 };


?>