@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update a  Reply</div>

                <div class="card-body">
                    <form action="{{ route('reply.update', ['id' => $reply->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="content" class="form-group">Update Your Reply</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ $reply->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right">Update Reply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
