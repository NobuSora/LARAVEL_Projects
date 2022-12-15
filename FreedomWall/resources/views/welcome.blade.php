@extends('layout')


<div id="mainForm">

    <h2 class="mb-1"><span class="text-danger">Freedom</span>Wall</h2>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                <div class="card-header">
                        <div class="mt-2">
                            <h4><input class="input @error('username') is-danger @enderror" type="text" name="username" id="username" placeholder="Username"></h4>
                            @error('username')
                            <p class="help is-danger">{{ $errors->first('username')}}</p>
                            @enderror
                            <span class="line"></span>  
                        </div>
                    </div>
                    <div class="card-body">
                        <textarea class="textarea @error('comment') is-danger @enderror" type="textarea" name="comment" id="comment" placeholder="Comment" ></textarea>
                            @error('comment')
                            <p class="help is-danger">{{ $errors->first('comment')}}</p>
                            @enderror
                    </div>
                    <button type="button" value="Post" id="Add" onclick="return confirm('Confirm Post?')">Add</button>
                </div> 
            </div>
        </div>
    </div>


    <div class="container" id="Container">

        {{-- @foreach ($wall as $wall ) --}}
                {{-- <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <a href="/
                        IDTest
                        ">
                        <div class="card">
                            <div class="card-header">
                                <div class="mt-2">
                                    <h4>
                                        UsernameTest
                                    </h4>
                                    <span class="line"></span>  
                                </div>
                            </div>
                            <div class="card-body">
                                <p>
                                    CommentTest
                                </p>
                            </div>
                                <div class="DateClass">
                                    DateTest
                                </div>
                        </div>
                        </a>
                    </div>
                </div> --}}
        {{-- @endforeach --}}

        
    </div>

@section('addScript')
    <script>
        $(document).ready(function () {

                            
            
            $.extend({
                getcomments : function(){
                    $.ajax({
                        url: '/getComments',
                        type: "GET",
                        dataType:"json",
                        success: function(response){ // What to do if we succeed                        
                        var insertData = "";
                        $.each(response['comments'], function( index, value ) {
                        var comment = "";
                            var date = moment(value.updated_at).fromNow();

                        if (value.comment==undefined){comment = "No Comment"}else {comment = value.comment}

                        insertData +='\
                            <div class="row" value="'+value.id+'">\
                                <div class="col-md-6 col-lg-4">\
                                <a href="/'+value.id+'">\
                                    <div class="card">\
                                        <div class="card-header">\
                                            <div class="mt-2">\
                                                <h4>'+value.username+'</h4>\
                                                <span class="line"></span>\
                                            </div>\
                                        </div>\
                                        <div class="card-body">\
                                            <p>'+comment+'</p>\
                                        </div>\
                                            <div class="DateClass" id="dateID'+value.id+'">'+date+'</div>\
                                    </div>\
                                    </a>\
                                </div><p id="id" hidden>'+value.id+'</p>\
                            </div>';
                          
                        });
                        $("#Container").append(insertData);
                            
                            // $("#Container").append(insertData);
                        }
                    }); 
                },

                add : function(){
                    let username = $('#username').val();
                    let comment = $('#comment').val();
                    let id = $('#id').val();
                    $.ajax({ 
                    url: "/store",
                    type:"POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        username:username,
                        comment:comment
                    },
                    success:function(response){
                        // console.log($('#Container').children().first().val());
                        // var date = moment([response['wall'].updated_at]).fromNow();
                        var wall = response['wall'];
                        var date = moment(wall.updated_at).fromNow();
                        var insertData ='\
                            <div class="row">\
                                <div class="col-md-6 col-lg-4">\
                                <a href="/'+wall.id+'">\
                                    <div class="card">\
                                        <div class="card-header">\
                                            <div class="mt-2">\
                                                <h4>'+wall.username+'</h4>\
                                                <span class="line"></span>\
                                            </div>\
                                        </div>\
                                        <div class="card-body">\
                                            <p>'+wall.comment+'</p>\
                                        </div>\
                                            <div class="DateClass">'+date+'</div>\
                                    </div>\
                                    </a>\
                                </div><p id="lastcount"></p>\
                            </div>'
                        $("#Container").prepend(insertData);

                        // console.log(response['wall'].id);
                    },
                    error: function(response) {
                        alert('Error Addpost'+response);
                    },
                    });
                }

                
            });
            
            $.getcomments();
            $("#Add").click(function (e) {
                $.add();

                $('#username').val('');
                $('#comment').val('');

                
                // console.log(name, comment);
            
            });

        });
    </script>
</div>

@endsection

