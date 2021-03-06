@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="{{ $post->image }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle" style="max-width:40px; max-height:40px;" alt="">
                    </div>
                    <div>
                        <div class="font-weight-bold d-flex justify-content-between align-items-center">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username}}</span>
                            </a>
                            @if ($post->user->id != Auth::user()->id)
                                <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button>
                            @endif
                        </div>
                    </div>
                </div>

                <hr />

                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{$post->user->username}}</span>
                        </a>
                    </span> 
                    {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
