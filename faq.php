<?php
include_once 'lib/includes.php';
include_once 'lib/functions/default.php';

$page = 'about';
@include 'template/head.phtml';
$title = "FAQ";
@include 'template/top.phtml';

?>

<div class="container">
	<div class="bs-docs-section">

<?php

include_once 'articles/faq.phtml';
		
?>

	</div>
</div>

<?php
@include 'template/bottom.phtml';

?>