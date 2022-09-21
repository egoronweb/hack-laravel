@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="home-content">
                        <div class="cards-wrapper">
                            @foreach ($posts as $post)
                                <div class="card" style="width: 100%;">
                                    <img src="{{ url('storage/'.$post->post_image) }}" class="card-img-top" alt="Post Image">   
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->post_title }}</h5>
                                        <p class="card-text">{{ $post->post_body }}</p>
                                        <a href="#" class="btn btn-primary">Open Post</a>
                                        <span class="post-btns edit" style="cursor: pointer;">Edit</span>
                                        <span class="post-btns delete" style="cursor: pointer;">Delete</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-post" style="margin-bottom: 30px;">
                        <form method="POST" action="{{ url('add-post') }}" style="border: 1px solid black; border-radius: 10px 10px; padding: 30px">
                        @csrf
                            <div class="mb-3">
                                <label for="user_id" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id">
                            </div>
                            <div class="mb-3">
                                <label for="post_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="post_title">
                            </div>
                            <div class="mb-3">
                                <label for="post_body" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="post_body">
                            </div>
                            <div class="mb-3">
                                <input type="file" class="post_image" id="post_image" name="post_image">
                            </div>
                            <button class="btn btn-primary" type="submit"><span class="material-symbols-outlined">add</span>Add Post</button>
                        </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
