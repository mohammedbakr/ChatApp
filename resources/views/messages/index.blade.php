@extends('layouts.app')

@section('content')
    
    <div class="container">

        <div class="row">

            <div class="col-md-3">

                <h3>Online Users</h3>

                <hr>

                <h5 id="no-online-users">No Online Users</h5>

                <ul class="list-group" id="online-users">
                    


                </ul>{{-- end of list group --}}

            </div>{{-- end of col-md-3--}}

            <div class="col-md-9" id="chat-container">

                <div id="chat">

                    @foreach ($messages as $message)
                        
                    <div id="message" class="{{ auth()->user()->id == $message->user_id ? 'pull-right bg-primary' : 'pull-left bg-info' }}">

                        <p><strong>{{ $message->user->name }}</strong></p>

                        <p>{{ $message->body }}</p>
                    
                    </div>
                    
                    <div class="clearfix"></div>
                    
                    @endforeach

                </div>{{--end of div--}}

                <form action="" id="form">

                        <input class="form-control" type="text" name="" id="chat-text" data-url="{{ route('messages.store') }}">

                        <button class="btn btn-primary btn-sm">Send</button>

                </form>{{--end of form--}}

            </div>{{--end of col-md-9--}}

        </div>{{-- end of row --}}

    </div>{{-- end of container --}}

@endsection