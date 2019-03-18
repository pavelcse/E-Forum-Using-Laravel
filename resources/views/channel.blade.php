@extends('layouts.app')

@section('content')
    @foreach($discussions as $d)

        <div class="card">
            <div class="card-header">
                <img style="border-radius: 50px;" src="{{ asset($d->user->avatar) }}" alt="" width="40px" height="40px"> &nbsp;&nbsp;&nbsp; 
                <span><b>{{ $d->user->name }}</b>, {{ $d->created_at->diffForHumans() }}</span>
                @if($d->hasBestAnswer())
                    <span style="margin: 0px 5px" class="btn btn-sm btn-danger float-right">Discussion Closed</span>
                @else
                    <span style="margin: 0px 5px" class="btn btn-sm btn-success float-right">Discussion Open</span>
                @endif
                <a href="{{ route('discussion', ['slug' => $d->slug]) }}" class="btn btn-sm btn-secondary float-right">View Discussion</a>
            </div>
            <div class="card-body">
                <h4><strong><u>{{ $d->title }}</u></strong></h4>
                <p>{{ str_limit($d->content, 250) }}</p>
            </div>
            <div class="card-footer">
                <span>{{ $d->replies->count() }} Replies</span>
                <a href="{{ route('channel', ['slug' => $d->channel->slug]) }}" class="btn btn-sm btn-dark float-right">{{ $d->channel->title }}</a>
            </div>
        </div>
        <br>
    @endforeach
    <br>

    <div class="d-flex justify-content-center">
        <h3>{{ $discussions->links() }}</h3>
    </div>

@endsection
