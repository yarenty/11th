<?php 
include_once 'lib/includes.php';

$title ="";


$page='home';
@include 'template/head.phtml';

@include 'template/top.phtml';

?>


<?php 

if (!isset($_SESSION["user"])) {
	@include 'template/marketing.phtml';
} else {
	@include 'template/tasks.phtml';
}
?>

<?php 
@include 'template/bottom.phtml';
?>