@extends('blade.layout.master')

@section('title', 'Page [Title]')

@section('sidebar')
    @parent
	<br />============================
	<br />[sidebar]
    <nav>
	   <a href=‘#a1’>[이동1]</a>
	   <a href=‘#a2’>[이동2]</a>
   </nav>
   ===========================
@stop

@section('content')
    <p>This is [content].</p>
@stop