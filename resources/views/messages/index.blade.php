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

                <div id="chat" class="h-100">



                </div>{{--end of div--}}

                <form action="" id="form">

                        <input type="text" name="" id="input">

                        <button class="btn btn-primary btn-sm">Send</button>

                </form>{{--end of form--}}

            </div>{{--end of col-md-9--}}

        </div>{{-- end of row --}}

    </div>{{-- end of container --}}

@endsection