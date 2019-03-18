@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update a  Discussion</div>

                <div class="card-body">
                    <form action="{{ route('discussion.update', ['id' => $discussion->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="content" class="form-group">Update Your Question</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ $discussion->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right">Update Discussion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
