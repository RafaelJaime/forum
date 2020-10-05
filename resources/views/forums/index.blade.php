@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
    	<h1 class="text-center text-mute"> {{ __("Foros") }} </h1>

    	@forelse($forums as $forum)
	        <div class="panel panel-default">
	            <div class="panel-heading panel-heading-forum">
	                <a href="forums/{{ $forum->id }}"> {{ $forum->name }} </a>
					<span class="pull-right">
						{{ __("Posts") }}: {{ $forum->posts->count() }}
						{{ __("Respuestas") }}: {{ $forum->replies->count() }}
					</span>
	            </div>

	            <div class="panel-body">
	                {{ $forum->description }}
	            </div>
	        </div>
    	@empty
	    <div class="alert alert-danger">
	        {{ __("No hay ningún foro en este momento") }}
	    </div>
    	@endforelse
        @if($forums->count())
            {{ $forums->links() }}
        @endif
        </div>
    </div>
@endsection
