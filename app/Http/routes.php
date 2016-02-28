<?php
// http://dymlaravel:8083/controller/example1
Route::get("controller/example1", "DymController@example1");
// http://dymlaravel:8083/controller/%EC%A0%84%EB%8B%AC%EB%B0%9B%EC%9D%8C
Route::get("controller/{id?}", "DymController@example2");
// http://dymlaravel:8083/controller/example3/%EB%B0%95%EC%83%81%EC%88%98
Route::get("controller/example3/{id}", "DymController@example3");
