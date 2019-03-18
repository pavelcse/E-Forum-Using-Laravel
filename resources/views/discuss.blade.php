@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create a New Discussion</div>

                <div class="card-body">
                    <form action="{{ route('discussions.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-group" for="title">Title</label>
                            <input type="text" class="form-control" value="{{ old('title') }}" name="title">
                        </div>
                        <div class="form-group">
                            <label for="channel_id" class="form-group">Pic a Channel</label>
                            <select name="channel_id" id="channel_id" class="form-control">
                                @foreach($channels as $channel)
                                    <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content" class="form-group">Ask a Question</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right">Create Discussion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
