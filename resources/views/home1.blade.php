@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Layout View</div>

				<div class="panel-body">
					@foreach($home as $ho)
					<p>This is title {{$ho->title}}</p>
					<p>This is body <?=$ho->body?></p>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
