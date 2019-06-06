@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="#">{{ $thread->creator->name }}</a> posted: {{ $thread->title }}
                    </div>

                    <div class="card-body">
                        <article>
                            <div>{{ $thread->body }}</div>
                        </article>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        @if(auth()->check())
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ $thread->path() }}/replies" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control"
                                      placeholder="Have something to say?"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
            <br>
        @else
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body text-center">
                            <a href="{{ route('login') }}">Please login to participate</a>
                        </div>
                    </div>

                </div>
            </div>
            <br>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>
    </div>
@endsection
