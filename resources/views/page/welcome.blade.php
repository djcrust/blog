
@extends('main')

@section('title', '| Homepage')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Hello, world!</h1>
                <p class="lead">Thank you for your visit</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">

            @foreach($posts as $post)

            <div class="post">
                <h3>{{ $post->title }}</h3>
                    <p>{{ $post->body }}</p>
                <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read more</a>
            </div>



                @endforeach

        </div>

        <div class="col-md-3 col-md-offset-1">
            <h2>SideBar</h2>
        </div>
    </div>
</div>

    @endsection
