<?php
include ("FaceDetector.php");
$detector=new FaceDetector(dirname(__FILE__).'/smiled_01.xml');
$detector->scan("das.jpg");
$faces=$detector->getFaces();
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}
?>
<html>
	<body>
		<img src="das.jpg" />
		<?php
		foreach($faces as $face) {
			$left = $face['x']."px";
			$top = $face['y']."px";
			$width = $face['width']."px";
			$height = $face['height']."px";
			$color=random_color();
			$div = "<div style='position:absolute; left:[x];top:[y];width:[w];height:[h];border: 1px solid [c]'></div>";
			$div = str_replace("[x]",$left,$div);
			$div = str_replace("[y]",$top,$div);
			$div = str_replace("[w]",$width,$div);
			$div = str_replace("[h]",$height,$div);
			$div = str_replace("[c]",$color,$div);
			echo $div;
		}
		?>
	</body>
</html>