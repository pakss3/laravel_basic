<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>syntax</title>
 </head>
 <body>
 기본구문 :
	<?php if(count($records) === 1){ ?>
	I have one record!
	<?php }elseif (count($records) > 1){ ?>
	I have multiple records!
	<?php }else{ ?>
	I don't have any records!
	<?php } ?>

<br />
블레이드 문법 : 
	@if (count($records) === 1)
    I have one record!
	@elseif (count($records) > 1)
		I have multiple records!
	@else
		I don't have any records!
	@endif

 </body>
</html>
