@extends('layout')


<div id="mainForm">

    <h2 class="mb-1"><span class="text-danger">Freedom</span>Wall</h2>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                <div class="card-header">
                        <div class="mt-2">
                            <h4 id="headUsername"><input class="input" type="text" name="username" id="inUsername" placeholder="Username"></h4>
                            {{-- <p class="help is-danger">Field Username is required!</p> --}}
                            <span class="line"></span>  
                        </div>
                    </div>
                    <div class="card-body">
                        <textarea class="textarea" type="textarea" name="comment" id="inComment" placeholder="Comment" ></textarea>
                           
                    </div>
                    <button type="button" value="Post" id="addBtn" onclick="return confirm('Confirm Post?')">Add</button>
                    <button type="button" value="" id="updateBtn">Update</button>
                </div> 
            </div>
        </div>
    </div>


    <div class="container" id="Container">
    
    </div>
</div>
{{-- @section('deleteScript')
<script>
    $(document).ready(function () {
        console.log('Second Load Ready');


        
    });
</script>
@endsection --}}


@section('addScript')

    <script>
        $(document).ready(function () {
            $('#updateBtn').hide();   
            // console.log('First Load Ready');           
            $.extend({
                //Get Comments from Database
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
                            <div class="row" id="del'+value.id+'">\
                                <div class="col-md-6 col-lg-4">\
                                    <div class="card">\
                                        <div class="card-header">\
                                            <div class="mt-2">\
                                                <h4 id="Username'+value.id+'">'+value.username+'</h4>\
                                                <span class="line"></span>\
                                            </div>\
                                        </div>\
                                        <div class="card-body">\
                                            <p id="Comment'+value.id+'">'+comment+'</p>\
                                        </div>\
                                            <div class="DateClass" id="dateID'+value.id+'">'+date+'</div>\
                                            <button value="'+value.id+'" class="deleteBtn" onclick="$.deleteID($(this).val());">Delete</button><button value="'+value.id+'" class="EditBtn" onclick="$.edit($(this).val());" >Edit</button>\
                                    </div>\
                                </div>\
                            </div>';
                        });
                        $("#Container").append(insertData);
                        }
                    }); 
                },
                
                add : function(){
                    let username = $('#inUsername').val();
                    let comment = $('#inComment').val();
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
                                <div class="row" id="del'+wall.id+'">\
                                    <div class="col-md-6 col-lg-4">\
                                        <div class="card">\
                                            <div class="card-header">\
                                                <div class="mt-2">\
                                                    <h4 id="Username'+wall.id+'">'+wall.username+'</h4>\
                                                    <span class="line"></span>\
                                                </div>\
                                            </div>\
                                            <div class="card-body">\
                                                <p id="Comment'+wall.id+'">'+wall.comment+'</p>\
                                            </div>\
                                                <div class="DateClass">'+date+'</div>\
                                                <button value="'+wall.id+'" class="deleteBtn" onclick="$.deleteID($(this).val());">Delete</button><button value="'+wall.id+'" class="EditBtn" onclick="$.edit($(this).val());" >Edit</button>\
                                        </div>\
                                    </div>\
                                </div>';
                            $("#Container").prepend(insertData);
                            $('#inUsername').val('');
                            $('#inComment').val('');


                            // console.log(response['wall'].id);
                        },
                        error: function(response) {
                            // console.log($('#headUsername').val().length);
                            if($('#inUsername').val().length == 0){
                            alert('Username is Required!');
                            }
                            else if ($('#inComment').val().length == 0){
                            alert('Comment is Required!');
                            }

                        },
                    });
                },

                deleteID : function(id){
                    // console.log(delID);
                    // console.log('Hello');
                    $.ajax({
                    type: "POST",
                    url: "/delete",
                    data: {"_token": "{{ csrf_token() }}",
                            id: id},
                    success: function(response){
                        var delID = response['delwall'].id;
                        // console.log(response['delwall'].id);
                        $('#del'+delID).remove();
                        alert('Deleted Successfully!');
                    },
                    error: function(response) {
                        console.log("Delete Failed");
                    },
                    }); 
                },

                edit : function(id){
                       var usernameIn = $('#Username'+id);
                       var commentIn = $('#Comment'+id);
                        $('#inUsername').val(usernameIn.text());
                        $('#inComment').val(commentIn.text());
                        $('#updateBtn').show();
                        $('#updateBtn').val(id);
                        $('#addBtn').hide();

                        // console.log($('#updateBtn').val());


                    // console.log(commentIn);
                },

                update : function(id){
                    let username = $('#inUsername').val();
                    let comment = $('#inComment').val();
                    $('#del'+id).remove();
                    // console.log("Update Buttons Works");
                    // console.log(id);
                    $.ajax({
                    type: "POST",
                    url: "/update",
                    data: {"_token": "{{ csrf_token() }}",
                            id: id,
                            username: username,
                            comment: comment   
                        },
                    success: function(response){
                        //Test

                        //EndTest
                        // console.log("Update Success");
                        $('#inUsername').val('');
                        $('#inComment').val('');
                        $('#updateBtn').hide();
                        $('#addBtn').show();
                        
                        var upwall = response['upwall'];

                        var update = moment(upwall.updated_at).fromNow();
                        var insertData ='\
                                <div class="row" id="del'+upwall.id+'">\
                                    <div class="col-md-6 col-lg-4">\                                     
                                        <div class="card">\
                                            <div class="card-header">\
                                                <div class="mt-2">\
                                                    <h4 id="Username'+upwall.id+'">'+upwall.username+'</h4>\
                                                    <span class="line"></span>\
                                                </div>\
                                            </div>\
                                            <div class="card-body">\
                                                <p id="Comment'+upwall.id+'">'+upwall.comment+'</p>\
                                            </div>\
                                                <div class="DateClass">'+update+'</div>\
                                                <button value="'+upwall.id+'" class="deleteBtn" onclick="$.deleteID($(this).val());">Delete</button><button value="'+upwall.id+'" class="EditBtn" onclick="$.edit($(this).val());" >Edit</button>\
                                        </div>\
                                    </div>\
                                </div>';
                            $("#Container").prepend(insertData);

                    },
                    error: function(response) {
                        console.log("Update Failed");
                    },
                    }); 


                }

                
            });

            $("#addBtn").click(function () {
                $.add();
                
            });

            $("#updateBtn").click(function (e) { 
                e.preventDefault();
                $.update($(this).val());
            });

            // $('')
            
            $.getcomments();

            
            
            

            


        });
    </script>
@endsection

