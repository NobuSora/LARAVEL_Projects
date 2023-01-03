@extends('layouts.app')

@section('content')


<div class="container">
    Select to Chat
    <div class="row justify-content-center">
        <!-- User List -->
        <div class="col-md-2">
        Bryan Hernandez<br>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Messages</div>
                    <div id="chat-content">
                        <ul>

                        </ul>
                    </div>
            </div>
            <div class="card">
                <div class="card-header"><input type="text" placeholder="Message Here" id="inputMsg"><input type="button" value="Send" id="sendBtn"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        let ip_address = '127.0.0.1';
        let socket_port = '3000';
        let socket = io(ip_address+':'+socket_port);

        // socket.on('connection');
        let chatInput = $('#inputMsg');

        chatInput.keypress(function (e) { 
            let message = $(this).val();
            // console.log(message);
            if(e.which === 13 && !e.shiftKey){
                // alert('Success');
                socket.emit('sendChatToServer', message);
                chatInput.val('');
            return false;}
        });

        socket.on('sendChatToClient', (message)=>{
            $('#chat-content ul').append("<li>"+message+"</li>");
        });

    });
</script>
@endsection
