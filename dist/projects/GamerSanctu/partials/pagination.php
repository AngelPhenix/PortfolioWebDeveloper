<div id="pagination"> <span id="colorless">Page:</span>  
<?php for($i=1; $i<=$pagesTotales; $i++){
	if ($i == $actualPage){
		echo $i.' ';
	} else {
		echo '<a href="?page='.$i.'">'.$i.'</a> ';
	}
} ?>
</div>