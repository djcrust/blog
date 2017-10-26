
@extends('main')

@section('title', '| Contact')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Contact</h1>
            <hr>
            <form>
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input id="subject" name="subject" class="form-control">
                </div>

                <div class="form-group">
                    <label name="Message">Message:</label>
                    <textarea id="Message" name="Message" class="form-control"></textarea>
                </div>

                <input type="submit" class="btn btn-success" value="Send Message">

            </form>
        </div>
    </div>
</div>

@endsection