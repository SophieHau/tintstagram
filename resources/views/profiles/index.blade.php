@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-1 col-md-3 p-5">
        <img src="{{ $user->profile->profileImage() }}" alt="profile image" style="max-width:350px;" class="w-100"/>
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username }}</div>
                    @if ($user->id != Auth::user()->id)
                        <follow-button user-id="{{ $user-> id }}" follows="{{ $follows }}"></follow-button>
                    @endif
                </div>

                @can('update', $user->profile)
                <a href="/p/create">Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postsCount }} </strong>posts</div>
                <div class="pr-5"><strong>{{ $followersCount }} </strong>followers</div>
                <div class="pr-5"><strong>{{ $followingsCount }} </strong>following</div>
            </div>
            <div class="pt-4 font-weight-bold" >
                {{ $user->profile->title }}
            </div>
            <div>
                {{ $user->profile->description }}
            </div>
            <div>
            <a href="https://laravel.com/">{{ $user->profile->url }}</a>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach ($user->posts as $post)  
        <div class="col-4 pb-4 d-flex justify-content-between">
            <a href="/p/{{ $post->id }}">
                <img src="{{ $post->image }}" style="height:350px; width:350px; object-fit: cover" >
            </a>
        </div>
        
        @endforeach

    </div>
</div>
@endsection
