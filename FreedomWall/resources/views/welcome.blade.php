@extends('layout')
<h2 class="mb-1"><span class="text-danger">Freedom</span>Wall</h2>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="card">
               <div class="card-header">
                    <div class="mt-2">
                        <h4><input class="input @error('username') is-danger @enderror" type="text" name="username" id="username" placeholder="Username" value="{{ old('username')}}"></h4>
                        @error('username')
                        <p class="help is-danger">{{ $errors->first('username')}}</p>
                        @enderror
                        <span class="line"></span>  
                    </div>
                </div>
                <div class="card-body">
                    <textarea class="textarea @error('comment') is-danger @enderror" type="textarea" name="comment" id="comment" placeholder="Comment" >{{ old('comment')}}</textarea>
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
                        // console.log(response['data']);
                        var insertData = "";
                        
                        $.each(response['data'], function( index, value ) {
                        // console.log(value.username);
                        var comment = "";
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
                                            <div class="DateClass">'+value.updated_at+'</div>\
                                    </div>\
                                    </a>\
                                </div><p id="id" hidden>'+value.id+'</p>\
                            </div>';


                            // $("#Container").append(insertData);
                        });
                            $("#Container").append(insertData);




                        // for (let i = 0; i <= response['data'].length; i++) {
                        //     // console.log($("#Container"))

                        // var username = response['data'][i].username;
                        // var comment = response['data'][i].comment;
                        // var id = response['data'][i].id;
                        // var date = response['data'][i].updated_at;
                        // lastid = response['data'][0].id;

                        // var insertData ='\
                        //     <div class="row" value="'+id+'">\
                        //         <div class="col-md-6 col-lg-4">\
                        //         <a href="/'+id+'">\
                        //             <div class="card">\
                        //                 <div class="card-header">\
                        //                     <div class="mt-2">\
                        //                         <h4>'+username+'</h4>\
                        //                         <span class="line"></span>\
                        //                     </div>\
                        //                 </div>\
                        //                 <div class="card-body">\
                        //                     <p>'+comment+'</p>\
                        //                 </div>\
                        //                     <div class="DateClass">'+date+'</div>\
                        //             </div>\
                        //             </a>\
                        //         </div><p id="id" hidden>'+id+'</p>\
                        //     </div>'

                    //     $("#Container").append(insertData);
                    //     // console.log($('#row').first().val());
                    //     }
                    //     // 
                        
                    //     },
                    //     error: function(response)
                    //     {
                    //     // console.log('Error getComments'+response);
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
                        var insertData ='\
                            <div class="row">\
                                <div class="col-md-6 col-lg-4">\
                                <a href="/'+response['wall'].id+'">\
                                    <div class="card">\
                                        <div class="card-header">\
                                            <div class="mt-2">\
                                                <h4>'+response['wall'].username+'</h4>\
                                                <span class="line"></span>\
                                            </div>\
                                        </div>\
                                        <div class="card-body">\
                                            <p>'+response['wall'].comment+'</p>\
                                        </div>\
                                            <div class="DateClass">'+response['wall'].updated_at+'</div>\
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
                
                // console.log(name, comment);
            
            });

        });
    </script>

@endsection

