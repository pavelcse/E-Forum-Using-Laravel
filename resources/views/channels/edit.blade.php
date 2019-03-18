
@extends('layouts.app')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Update Channel: {{ $channel->title }}
                </div>
                <div class="card-body">
                    <form action="{{ route('channels.update', ['channel'=> $channel->id]) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <input type="text" name="channel" value="{{ $channel->title }}" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">
                                Update Channel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
    