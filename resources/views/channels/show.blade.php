@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $channel->name }}</div>

                <div  class="card-body">
                    @if ($channel->editable())
                        <form id="update-channel-form" action="{{ route('channels.update', $channel->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                    @endif


                        <div class="form-group row justify-content-center">
                            <div class="channel-avatar">
                                @if($channel->editable())
                                    <div onclick="document.getElementById('image').click()" class="channel-avatar-overlay">

                                    </div>
                                @endif

                                <img src="{{ $channel->image() }}" alt="">
                            </div>
                        </div>

                        <div class="form-group">
                            <h4 class="text-center">
                                {{$channel->name}}
                            </h4>
                            <p class="text-center">
                                {{$channel->description}}
                            </p>
                            <div class="text-center">
                                <subscribe-button :channel="{{ $channel }}" :subscriptions="{{ $channel->subscriptions }}"  inline-template>
                                    <button @click="toggleSubscription" class="btn btn-danger">
                                        @{{ isOwner ? '' : isSubscribed ? 'Unsubscribe' : 'Subscribe' }} @{{ subscriptions.length }} @{{ isOwner ? 'Subscribers' : '' }}
                                    </button>
                                </subscribe-button>
                            </div>

                        </div>

                        @if ($channel->editable())
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

                            @if($errors->any())
                            <ul class="list-group mb-5">
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger list-group-item">
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                            @endif

                            <button type="submit" class="btn btn-info">
                                Update channel
                            </button>
                        @endif


                    @if ($channel->editable())
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
