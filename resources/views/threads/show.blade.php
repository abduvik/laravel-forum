@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $thread->title }}</div>

                    <div class="card-body">
                        <article>
                            <div>{{ $thread->body }}</div>
                        </article>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($thread->replies as $reply)
                    <div class="card">
                        <div class="card-header">
                            <a href="#">{{ $reply->owner->name }}</a>
                            said {{ $thread->created_at->diffForHumans() }}</div>

                        <div class="card-body">
                            <article>
                                <div>{{ $reply->body }}</div>
                            </article>
                        </div>
                    </div>
                    <br>

                @endforeach
            </div>
        </div>
    </div>
@endsection
