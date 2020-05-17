@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary">Create Post<a>
                    <h3>Your Blog Posts</h3>
                    <table class="table table-stripped">
                        <tr>
                            <td>Title</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><p>{{$post->body}}</p></td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                            </tr> 
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection