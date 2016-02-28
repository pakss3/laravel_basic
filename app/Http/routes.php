<?php


// http://dymlaravel:8083/controller/example1
Route::get("controller/example1", "DymController@example1");
// http://dymlaravel:8083/controller/%EC%A0%84%EB%8B%AC%EB%B0%9B%EC%9D%8C
//Route::get("controller/{id?}", "DymController@example2");
// http://dymlaravel:8083/controller/example3/%EB%B0%95%EC%83%81%EC%88%98
Route::get("controller/example3/{id}", "DymController@example3");





Route::get('controller/example4',["uses"=>"DymController@example4","as"=>"alias"]);

Route::get("controller/example4_url", function(){
	$url = URL::action('DymController@example4');
	$alias = route("alias");
	return $url."<br />".$alias ;
});

// http://dymlaravel:8083/middleware/store/sell/cigarette?age=100
Route::get("middleware/store/sell/cigarette", ['middleware' => ['agecheck'], function(){
	return "더 살거 있음?";
}]);



Route::get("middleware/store/exit/{age}", ['as'=>'storeExit',function($age){
	$msg = "어머님이 누구니..<br>";
	$input = "<input type='text' id='input' value='$age' /><br>";
	$act = "<a href='/middleware/store/sell/cigarette?age=' onclick='event.preventDefault(); location.href=this.href+document.getElementById(\"input\").value;'>다시 구매시도</a>";
	return $msg.$input.$act;
}]);

//http://dymlaravel:8083/middleware/store/gs25/sell?age=21
Route::get('middleware/store/gs25/sell', 
	[
		'uses' => 'Gs25Controller@sell',
		'middleware' => ['agecheck'],	//사용할 middleware 등록
	]
);


Route::get("helper/string/{helper}", function($helper){

	$val = [
		"camel_case" => function(){
			echo "주어진 문자열을 camelCase 형태로 변환합니다<br />";
			return camel_case('camel_case');
		},
		"class_basename" => function(){
			echo "클래스의 네임스페이스를 제거한 클래스의 클래스 명을 반환합니다:<br />";
			return class_basename('Foo\Bar\Baz');
		},
		"e" => function(){
			echo "수는 주어진 문자열에 htmlentities를 실행합니다:<br />";
			return e('<html>foo</html>');
		},
		"ends_with" => function(){
			echo " 함수는 주어진 문자열이 특정 값으로 끝나는지 알아냅니다:<br />";
			return ends_with('This is my name', 'name');
		},
		"snake_case" => function(){
			echo " snake_case 함수는 주어진 문자열을 snake_case 형태로 변환합니다:<br />";
			return snake_case('fooBar');
		},
		"str_limit" => function(){
			echo " str_limit 함수는 문자열의 문자 수를 제한합니다. 함수는 문자열을 첫번째 인자로 받고 반환되는 최대 문자의 길이를 두번째 인자로 받습니다:<br />";
			return str_limit('The PHP framework for web artisans.', 7);
		},
		"starts_with" => function(){
			echo " 함수는 문자열이 주어진 문자열으로 시작하는지 판별합니다:<br />";
			return starts_with('This is my name', 'This');
		},
		"str_contains" => function(){
			echo " 함수는 주어진 문자열이 특정 문자열을 포함하는지 판별합니다:<br />";
			return str_contains('This is my name', 'my');
		},
		"str_finish" => function(){
			echo " str_finish 함수는 문자열 뒤에 주어진 값을 추가합니다:<br />";
			return str_finish('this/string', '/');
		},
		"str_is" => function(){
			echo " 주어진 문자열이 주어진 패턴과 대응되는지 확인합니다. 와일드카드를 표시하기 위해 별표를 사용할 수 있습니다:<br />";
			return str_is('foo*', 'foobar');
		},
		"str_plural" => function(){
			echo " 함수는 문자열을 복수형태로 변환합니다. 이 함수는 현재 영어에만 적용 가능합니다<br />";
			return str_plural('child');
		},
		"str_plural1" => function(){
			echo " 문자열의 단일 혹은 복수 형태를 조회하기 위해서, 함수의 두번째 인자로 정수를 전달할 수 있습니다:<br />";
			return str_plural('child',1);
		},
		"str_singular" => function(){
			echo " str_singular 함수는 문자열을 단수 형태로 변환합니다. 이 함수는 현재 영어에만 적용 가능합니다:<br />";
			return str_singular('cars');
		},
		"str_slug" => function(){
			echo " str_random 함수는 지정된 길이의 문자열을 무작위로 생성합니다:<br />";
			return str_random(40);
		},
		"studly_case" => function(){
			echo " studly_case 함수는 주어진 문자열을 StudlyCase 형태로 변환합니다:<br />";
			return studly_case('foo_bar');
		}
	];
	$execute = function() use ($val,$helper){
		echo $val[$helper]()."<br /><br />==========================<br />";
	};
	$link = function($k){
		echo "<a href='/helper/string/$k'>$k</a><br />";
	};
	$action = function() use ($execute, $link, $val){
		$execute();
		foreach($val as $k => $v){
			echo $link($k);
		}
	};


	$action();
	return "";
});