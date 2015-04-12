<?php
include_once 'lib/includes.php';
include_once 'lib/functions/default.php';

$page = 'about';
@include 'template/head.phtml';
$title = "About";
@include 'template/top.phtml';

?>

<div class="container">
	<div class="bs-docs-section">
		
		
<h1>Articles</h1>
		
		<ul>
			<li><a href="?q=unproductive">5 THINGS YOU'RE DOING THAT SEEM
					PRODUCTIVE, BUT AREN'T</a></li>
			<li><a href="?q=10000rule">The Myth of the 10,000-Hours Rule</a></li>		
		
		</ul>
<br/><br/><hr/><br/>

<?php

$q = "def";
if (isset ( $_GET ["q"] )) {
	$q = $_GET ["q"];
}

switch ($q) {
	
	case "unproductive" :
		include_once 'articles/5unproductive.phtml';
		break;
	
	
	case "10000rule" :
		include_once 'articles/10000rule.phtml';
		break;

			
	default :
		include_once 'articles/default.phtml';
		
		break;
}

?>
<br/> 



	</div>
</div>

<?php
@include 'template/bottom.phtml';

?>