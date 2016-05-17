<?php
$sessionUser = "1";
$diff = time();
$diff2 = substr($diff,7);
$paper_id = "p".$sessionUser.$diff2;
echo $paper_id."<br/>";
?>