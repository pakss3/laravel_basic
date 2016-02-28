<?php

Route::get("hello/world", function(){
	return "hello world";
});

Route::get("user/{name}", function($name = ""){
       return "name=".$name;
});

Route::get("argu_muilt/{arg1}/{arg2}/{arg3}",function($arg1,$arg2,$arg3){
       return "arg1=".$arg1."<br />arg2=".$arg2."<br />arg3=".$arg3;
});


Route::get("where/{num}",function($num){
       return "num=".$num;
})->where(['num' => '[0-9]+']);

//공용 패턴 지정
$router->pattern('id', '[0-9]+');
Route::get('pattern/{id}', function($id){
	return $id;
});

//서브도메인 제어
Route::group(array('domain' => '{sub}.dymlaravel'), function($sub){
    Route::get('agency/{path1}', function($sub, $path1){
        return "subdomain:$sub,path:$path1";
    });
});

//와일드 카드 파라미터를 중간에서 지정 가능
Route::group([
    'prefix' => 'wildcard/{wildcard}',
    'where' => ['wildcard' => '[a-z]+'],
], function()
{
 
 //http://dymlaravel:8083/wildcard/another/detail
    Route::get('detail', function($wildcard)
    {
        return "$wildcard<==중간path";
    });

 //http://dymlaravel:8083/wildcard/anotherd/etc
    Route::get('{other}', function($wildcard,$other)
    {
        return "other: $other";
    });
});

Route::get("view/html", function(){
	$contents = "
	<!doctype html>
	<html lang='ko'>
		<head>
			<meta charset='UTF-8'>
			<title>OK</title>
		</head>
		<body>view/html</body>
	</html>
	";
	return $contents;
});

Route::get("view/folder/hello", function(){
	return view('folder1.hello');
//	return view('folder1.hello',['name'=>"park"]);
//	return view('folder1.hello')->with('name', 'park');
});


Route::get("view/hello/{name}", function($name){
	return view("hello",["name"=>$name]);
});

Route::get("view/blade/main/{name}", function($name){
	return view("blade.main",["name"=>$name]);
});

Route::get("view/blade/syntax/{name}", function($name){
	$syntax_page = ["if","for","while","csif"];
	$for_data = [
		['name'=>'park','due_date'=>'2015-06-11'], 
		['name'=>'lee','due_date'=>'2013-01-10']
	];

	$param = ["name"=>$name,"script"=>"<script>alert(1);</script>","records"=>1,"for_data"=>$for_data];

	if (in_array($name, $syntax_page)){
		return view("blade.$name",$param);	
	}else{
		return view("blade.syntax",$param);	
	}
	
});

Route::get("helper/{helper}", function($helper){

	$val = [
		"array_add" => function(){
			$array = ['foo' => 'bar'];
			$array = array_add($array, 'comment', 'array_add 함수는 배열 내에 키가 존재하지 않는 경우 주어진 key/value 쌍을 배열에 추가합니다.');
			return $array;
		},
		"array_divide" => function(){
			$array = ['foo' => 'bar','foo1' => 'bar1'];
			$array = array_divide($array);
			return array_add($array,'comment','원래의 배열에서 키들을 담고 있는 배열과 값들을 담고 있는 배열, 총 2개의 배열들을 반환합니다.');
		},
		"array_except" => function(){
			$array = ['foo' => 'bar','key' => 'val','comment'=>'메소드는 주어진 키 / 값 쌍을 배열에서 제거합니다.'];
			return array_except($array,'key');
		},
		"array_dot" => function(){
			$array = ['foo' => ['bar' => 'baz'], 'comment'=>'함수는 다차원 배열을 ‘점(.)’으로 배열 깊이를 표기하면서 단일 레벨 배열로 만듭니다.'];
			return array_dot($array);
		},
		"array_fetch" => function(){
			$array = [
				['developer' => ['name' => 'Taylor']],
				['developer' => ['name' => 'Dayle']], 
				['developer' => ['name' => ['comment'=>'메소드는 선택한 중첩된 요소를 포함하는 납작한 1차원 배열을 반환합니다.']]]
			];
			return array_fetch($array,'developer.name');
		},
		"array_first" => function(){
			$array = [100, 200, 300];

			$value = array_first($array, function($key, $value){
				return $value >= 150;
			});
			return ['result'=>$value,'comment'=>'조건의 첫번째 배열의 값, 비슷하게 array_last 존재'];
		},
		"array_flatten" => function(){
			$array = ['name' => 'Joe', 'languages' => ['PHP', 'Ruby']];
			return array_add(array_flatten($array),'comment','메소드는 다차원 배열을 단일 레벨의 1차원 배열로 만듭니다.');
		},
		"array_get" => function(){
			$array = ['name' => 'Joe', "name" => ['languages' => ['PHP', 'Ruby']]];
			return array_add(array_get($array,'name.languages'),'comment','“점(.)”표기법으로 중첩 배열로부터 주어진 값을 찾습니다.');
		},
		"array_only" => function(){
			$array = ['name' => 'Joe', 'age' => 27, 'votes' => 1];
			$array = array_only($array, ['name', 'votes']);

			return array_add($array,'comment','array_only 메소드는 특정한 키 / 값 쌍만을 배열로부터 반환합니다.');
		},

		"array_pluck" => function(){
			$array = [['name' => 'Taylor'], ['name' => 'Dayle']];
			$array = array_pluck($array, 'name');
			
			//fetch의 하위호환..
			return array_add($array,'comment','메소드는 배열로부터 주어진 키 / 값 쌍의 리스트를 뽑아냅니다.(array_fetch와 유사)');
		},
		"array_pull" => function(){
			$array = ['name' => 'Taylor', 'age' => 27];
			$name = array_pull($array, 'name');

			return array_add(['result'=>$name],'comment','배열에서 주어진 키 / 값 쌍을 반환함과 동시에 제거합니다.');
		},
		"array_set" => function(){
			$array = ['name' => 'Taylor', 'age' => 27];
			array_set($array, 'name.editor','park');

			return array_add($array,'comment','“점(.)” 표기법을 사용하여 중첩 배열 내에 값을 설정합니다.');
		},
		"array_sort" => function(){
			$array =  [
					['name' => 'Jill'],
					['name' => 'Barry'],
				['name' => 'Thlee']
			];

			$array = array_sort($array, function($value){
				echo dump($value);
				return $value['name'];
			});

			return array_add($array,'comment','메소드는 주어진 클로져의 결과 값으로 배열을 정렬합니다.');
		},

		"array_where" => function(){
			$array = [100, '200', 300, '400', 500];

			$array = array_where($array, function($key, $value){
				 return is_string($value);
			});

			return array_add($array,'comment','배열을 필터링 합니다.');
		},
		
	][$helper];

	return dd($val());
});