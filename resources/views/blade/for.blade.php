<!doctype html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <title>syntax</title>
 </head>
 <body>
	@for ($i=0; $i < count($for_data); $i++)
		<p>
			for :
			{{ $for_data[$i]['name'] }} , {{ $for_data[$i]['due_date'] }}
		</p>
	@endfor

	@foreach ($for_data as $f)
		<p>
			foreach : 
			{{ $f['name'] }} , {{ $f['due_date'] }}
		</p>
	@endforeach

{{-- 이 주석은 렌더링된 HTML에 포함되지 않습니다. --}}

 </body>
</html>
