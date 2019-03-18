@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <img style="border-radius: 50px;" src="{{ asset($d->user->avatar) }}" alt="" width="40px" height="40px"> &nbsp;&nbsp;&nbsp; 
        <span><b>{{ $d->user->name  }} ({{ $d->user->points }})</b>, {{ $d->created_at->diffForHumans() }}</span>
        @if($d->hasBestAnswer())
            <span style="margin: 0px 5px" class="btn btn-sm btn-danger float-right">Discussion Closed</span>
        @else
            <span style="margin: 0px 5px" class="btn btn-sm btn-success float-right">Discussion Open</span>
        @endif
        @if(Auth::id() == $d->user->id)
            @if(!$d->hasBestAnswer())
            <a style="margin: 0px 5px" href="{{ route('discussion.edit', ['slug' => $d->slug]) }}" class="btn btn-sm btn-info float-right">Edit</a>
            @endif
        @endif
        @if($d->is_being_watched_by_auth_user())
        <a href="{{ route('discussion.unwatch', ['id' => $d->id]) }}" class="btn btn-sm btn-secondary float-right">Unwatch</a>
        @else
        <a href="{{ route('discussion.watch', ['id' => $d->id]) }}" class="btn btn-sm btn-secondary float-right">Watch</a>
        @endif
    </div>
    <div class="card-body">
        <h4><strong>{{ $d->title }}</strong></h4>
        <hr>
        <p>
            {!! Markdown::convertToHtml($d->content) !!}
        </p>
        @if($best_answer)
        <hr>
        <div style="padding: 20px 40px">
            <h4>Best Answer</h4>
            <div class="card">
                <div class="card-hader bg-info text-white">
                    <img style="border-radius: 50px;" src="{{ asset($best_answer->user->avatar) }}" alt="" width="40px" height="40px"> &nbsp;&nbsp;&nbsp; 
                    <span>{{ $best_answer->user->name }} ({{ $best_answer->user->points }})</span>
                </div>
                <div class="card-body">
                    {!! Markdown::convertToHtml($best_answer->content) !!}
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="card-footer">
        <span>{{ $d->replies->count() }} Replies</span>
        <a href="{{ route('channel', ['slug' => $d->channel->slug]) }}" class="btn btn-sm btn-dark float-right">{{ $d->channel->title }}</a>
    </div>
</div>
@foreach($d->replies as $r)

<div class="card">
    <div class="card-header">
        <img style="border-radius: 50px;" src="{{ asset($r->user->avatar) }}" alt="" width="40px" height="40px"> &nbsp;&nbsp;&nbsp; 
        <span><b>{{ $r->user->name }} ({{ $r->user->points }})</b>, {{ $r->created_at->diffForHumans() }}</span>
        @if(!$best_answer)
            @if(Auth::id() == $d->user->id)
            <a href="{{ route('discussion.best-answer', ['id' => $r->id]) }}" class="btn btn-sm btn-info float-right">Mark as Best Answer</a>
            @endif
        @endif
        @if(Auth::id() == $r->user->id)
            @if(!$r->best_answer)
                <a style="margin: 0px 5px" href="{{ route('reply.edit', ['id' => $r->id]) }}" class="btn btn-sm btn-info float-right">Edit</a>
            @endif
        @endif
    </div>
    <div class="card-body">
        <p>
             {!! Markdown::convertToHtml($r->content) !!}
        </p>
    </div>
    <div class="card-footer">
        @if($r->is_liked_by_auth_user())
            <a href="{{ route('reply.unlike', ['id' => $r->id]) }}" class="btn btn-danger btn-sm"><i class="fas fa-thumbs-down"></i><span class="badge">{{ $r->likes->count() }}</a>
        @else
        <a href="{{ route('reply.like', ['id' => $r->id]) }}" class="btn btn-info btn-sm"><i class="fas fa-thumbs-up"></i><span class="badge">{{ $r->likes->count() }}</span></a>
        @endif
    </div>
</div>
@endforeach

<div class="card">
    <div class="card-body">
        @if(Auth::check())
            <form action="{{ route('discussion.reply', ['id' => $d->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="reply">Leave a reply...</label>
                    <textarea class="form-control" name="reply" id="reply" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-secondary float-right">Leave a reply</button>
                </div>
            </form>
        @else
            <div class="text-center">Sign in to leave a reply.</div>
        @endif
    </div>
</div>

@endsection