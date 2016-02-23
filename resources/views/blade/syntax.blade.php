<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>syntax</title>
 </head>
 <body>
	기본출력: {{ $name }}.<br />
	함수 출력: {{ time() }}<br />
	삼항연산자: {{ isset($name) ? $name : 'Default' }}<br />
	그대로 출력 : @{{ @를 붙이면 그대로 출력 }}<br />
	xxs: {{ $script }}.<br />
	escape 처리 안함 : Hello, {!! $script !!}.

 </body>
</html>
