@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            {{-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- You are logged in, {{ Auth::user()->name}} --}}
                {{-- </div>
            </div> --}}

            {{-- DataTable View  --}}
            <div class="table-responsive text-center">
                <table class="table table-borderless" id="table">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">First Name</th>
                        <th class="text-center">Last Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Country</th>
                        <th class="text-center">Salary ($)</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr class="item{{$item->id}}">
                        <td>{{$item->id}}</td>
                        <td>{{$item->first_name}}</td>
                        <td>{{$item->last_name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->gender}}</td>
                        <td>{{$item->country}}</td>
                        <td>{{$item->salary}}</td>
                        <td><button class="edit-modal btn btn-info"
                                data-info="{{$item->id}},{{$item->first_name}},{{$item->last_name}},{{$item->email}},{{$item->gender}},{{$item->country}},{{$item->salary}}">
                                <span class="glyphicon glyphicon-edit"></span> Edit
                            </button>
                            <button class="delete-modal btn btn-danger"
                                data-info="{{$item->id}},{{$item->first_name}},{{$item->last_name}},{{$item->email}},{{$item->gender}},{{$item->country}},{{$item->salary}}">
                                <span class="glyphicon glyphicon-trash"></span> Delete
                            </button></td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>

            {{-- End DataTables View --}}
        </div>
    </div>
</div>

{{-- Modal --}}

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>

            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fid" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fname">First Name</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="fname">
                        </div>
                    </div>
                    <p class="fname_error error text-center alert alert-danger hidden"></p>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="lname">Last Name:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="lname">
                        </div>
                    </div>
                    <p class="lname_error error text-center alert alert-danger hidden"></p>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email">
                        </div>
                    </div>
                    <p class="email_error error text-center alert alert-danger hidden"></p>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="gender">Gender</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="gender" name="gender">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="country">Country:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="country">
                        </div>
                    </div>
                    <p
                        class="country_error error text-center alert alert-danger hidden"></p>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="salary">Salary </label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="salary">
                        </div>
                    </div>
                    <p
                        class="salary_error error text-center alert alert-danger hidden"></p>
                </form>
                <div class="deleteContent">
                    Are you Sure you want to delete <span class="dname"></span> ? <span
                        class="hidden did"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class='glyphicon'> </span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- End Modal --}}

<script>
$(document).ready(function() {
    //DataTable Initialization
    $('#table').DataTable({
        pagingType: 'full_numbers'
    });

    //Fill Data
    function fillmodalData(details)
    {
    $('#fid').val(details[0]);
    $('#fname').val(details[1]);
    $('#lname').val(details[2]);
    $('#email').val(details[3]);
    $('#gender').val(details[4]);
    $('#country').val(details[5]);
    $('#salary').val(details[6]);
    }


    //Edit Button
    $(document).on('click', '.edit-modal', function() 
    {
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').removeClass('delete');
        $('.actionBtn').addClass('update');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        var stuff = $(this).data('info').split(',');
        fillmodalData(stuff)
        $('#myModal').modal('show');
    });

    //Update
    $('.modal-footer').on('click', '.update', function() 
    {
        // console.log('Hello');
        // $('#myModal').modal('hide');
        $.ajax({
            type: 'post',
            url: '/editItem',
            data: 
            {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'fname': $('#fname').val(),
                'lname': $('#lname').val(),
                'email': $('#email').val(),
                'gender': $('#gender').val(),
                'country': $('#country').val(),
                'salary': $('#salary').val()
            },
            success: function(data) 
            {
                
                if (data.errors)
                    {
                        
                        if(data.errors.fname) {
                            $('.fname_error').removeClass('hidden');
                            $('.fname_error').text("First name can't be empty !");
                        }
                        if(data.errors.lname) {
                            $('.lname_error').removeClass('hidden');
                            $('.lname_error').text("Last name can't be empty !");
                        }
                        if(data.errors.email) {
                            $('.email_error').removeClass('hidden');
                            $('.email_error').text("Email must be a valid one !");
                        }
                        if(data.errors.country) {
                            $('.country_error').removeClass('hidden');
                            $('.country_error').text("Country must be a valid one !");
                        }
                        if(data.errors.salary) {
                            $('.salary_error').removeClass('hidden');
                            $('.salary_error').text("Salary must be a valid format ! (ex: #.##)");
                        }
                        $('#myModal').modal('show');
                    }
                else
                    {
                        $('.error').addClass('hidden');
                        $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" +
                        data.id + "</td><td>" + data.first_name +
                        "</td><td>" + data.last_name + "</td><td>" + data.email + "</td><td>" +
                        data.gender + "</td><td>" + data.country + "</td><td>" + data.salary +
                        "</td><td><button class='edit-modal btn btn-info' data-info='" + data.id+","+data.first_name+","+data.last_name+","+data.email+","+data.gender+","+data.country+","+data.salary+"'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-info='" + data.id+","+data.first_name+","+data.last_name+","+data.email+","+data.gender+","+data.country+","+data.salary+"' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                    }
                
            }
        });
    });

    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').removeClass('edit');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        var stuff = $(this).data('info').split(',');
        $('.did').text(stuff[0]);
        $('.dname').html(stuff[1] +" "+stuff[2]);
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });


} );



    
</script>


@endsection
