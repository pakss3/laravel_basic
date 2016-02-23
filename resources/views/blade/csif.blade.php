<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>syntax</title>
 </head>
 <body>
 제어구조 대체 문법(Control Structures alternative syntax)
 즉 if, while, for, foreach, 그리고 switch. 
 각 경우에 대체 문법의 기본형태는 괄호열기를 콜른 (:)으로 대체하고 괄호닫기는 각각 endif;, endwhile;, endfor;, endforeach;, 또는 endswitch;으로 대체한다.<br />

	<?php if(count($records) === 1) : ?>
	I have one record!
	<?php elseif (count($records) > 1) :?>
	I have multiple records!
	<?php else : ?>
	I don't have any records!
	<?php endif; ?>

 </body>
</html>
