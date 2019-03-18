@extends('layouts.app')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Create a New Channel
                </div>
                <div class="card-body">
                    <form action="{{ route('channels.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="channel" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">
                                Save Channel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
