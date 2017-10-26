
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

            <div class="post">
                <h3>Post Title</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum cupiditate impedit mollitia neque nostrum odio odit pariatur quam sapiente, ullam. Accusantium vitae, voluptate. Ad earum fugiat labore, quis tempora voluptatem.</p>
                <a herf="#" class="btn btn-primary">Read more</a>
            </div>

            <hr>

            <div class="post">
                <h3>Post Title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum cupiditate impedit mollitia neque nostrum odio odit pariatur quam sapiente, ullam. Accusantium vitae, voluptate. Ad earum fugiat labore, quis tempora voluptatem.</p>
                <a herf="#" class="btn btn-primary">Read more</a>
            </div>

            <hr>

            <div class="post">
                <h3>Post Title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum cupiditate impedit mollitia neque nostrum odio odit pariatur quam sapiente, ullam. Accusantium vitae, voluptate. Ad earum fugiat labore, quis tempora voluptatem.</p>
                <a herf="#" class="btn btn-primary">Read more</a>
            </div>

            <hr>

            <div class="post">
                <h3>Post Title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum cupiditate impedit mollitia neque nostrum odio odit pariatur quam sapiente, ullam. Accusantium vitae, voluptate. Ad earum fugiat labore, quis tempora voluptatem.</p>
                <a herf="#" class="btn btn-primary">Read more</a>
            </div>

        </div>

        <div class="col-md-3 col-md-offset-1">
            <h2>SideBar</h2>
        </div>
    </div>
</div>

    @endsection
