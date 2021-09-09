@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $channel->name }}</div>

                <div  class="card-body">
                    <form id="update-channel-form" action="{{ route('channels.update', $channel->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row justify-content-center">
                            <div class="channel-avatar">
                                <div onclick="document.getElementById('image').click()" class="channel-avatar-overlay">

                                </div>
                                <img src="{{ $channel->image() }}" alt="">
                            </div>
                        </div>

                        <input onchange="document.getElementById('update-channel-form').submit()" style="display: none" id="image" type="file" name="image">

                        <div class="form-group">
                            <label for="name" class="form-control-label">
                                Name
                            </label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $channel->name }}">
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-control-label">
                                Description
                            </label>
                            <textarea rows="3" name="description" id="description" class="form-control">
                                {{ $channel->description }}
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-info">
                            Update channel
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
