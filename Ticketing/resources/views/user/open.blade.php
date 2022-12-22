@extends('layouts.app')

@section('nav')
<li><a class="ticks active" href="/home">Open Tickets</a></li>
<li><a class="ticks" href="/assigned">Assigned Tickets</a></li>
<li><a class="ticks" href="/resolved">Resolved Tickets</a></li>
<li><a class="ticks" href="/archived">Archived</a></li>
@endsection

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">

            {{-- DataTable View  --}}
            <div class="table-responsive text-center">
                <table class="table table-borderless" id="table">
                    {{-- Create Ticket button --}}
                        <button type="button" class="Create createBtn" data-dismiss="modal">Create Ticket</button>
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Created By</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Posted On</th>
                    </tr>
                </thead>
                <tbody id="tablebody">
                    @foreach($data as $item)
                    <tr class="item{{$item->id}}">
                        <td class="edit-modal" data-info="{{$item->id}},You,{{$item->title}},{{$item->status}},{{$item->created_at}}">{{$item->id}}</td>
                        <td class="edit-modal" data-info="{{$item->id}},You,{{$item->title}},{{$item->status}},{{$item->created_at}}">You</td>
                        <td class="edit-modal" data-info="{{$item->id}},You,{{$item->title}},{{$item->status}},{{$item->created_at}}">{{$item->title}}</td>
                        <td class="edit-modal" data-info="{{$item->id}},You,{{$item->title}},{{$item->status}},{{$item->created_at}}">{{$item->status}}</td>
                        <td class="edit-modal" data-info="{{$item->id}},You,{{$item->title}},{{$item->status}},{{$item->created_at}}">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>

            {{-- End DataTables View --}}
        </div>
    </div>
</div>

{{-- View Modal --}}

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    {{-- //ID --}}
                    <div class="form-group">
                        <label class="control-label col-sm-2">ID</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="fid" disabled>
                        </div>
                    </div>
                    {{-- //Created By --}}
                    <div class="form-group">
                        <label class="control-label col-sm-3">Created By</label>
                        <div class="col-sm-12">
                            <input type="name" class="form-control" id="created_by" disabled>
                        </div>
                    </div>
                    {{-- //Title --}}
                    <div class="form-group">
                        <label class="control-label col-sm-2">Title</label>
                        <div class="col-sm-12">
                            <input type="name" class="form-control" id="title" disabled>
                        </div>
                    </div>
                    {{-- //Status --}}
                    <div class="form-group">
                        <label class="control-label col-sm-2">Status</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="status" disabled>
                        </div>
                    </div>
                    {{-- //Created At --}}
                    <div class="form-group">
                        <label class="control-label col-sm-3">Posted On</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="posted_on" disabled>
                        </div>
                    </div>                    
                </form>
                
            </div>
        </div>
    </div>
</div>

{{-- End View Modal --}}

{{-- Create Modal --}}

<div id="myModalCreate" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    {{-- //Created By --}}
                    <div class="form-group">
                        <label class="control-label col-sm-3">Created By</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="post_created_by" disabled>
                        </div>
                    </div>
                    {{-- //Title --}}
                    <div class="form-group">
                        <label class="control-label col-sm-2">Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="post_title">
                        </div>
                    </div>
                    {{-- //Status --}}
                    <div class="form-group">
                        <label class="control-label col-sm-2">Status</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="post_status" value="Pending" disabled>
                        </div>
                    </div>
                    {{-- //Created At --}}
                    <div class="form-group">
                        <label class="control-label col-sm-3">Date</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="post_posted_on">
                        </div>
                    </div>

                    {{-- //Buttons --}}
                    <div class="modal-footer">
                        <button type="button" class="btn actionBtn" data-dismiss="modal">
                            <span id="footer_action_button" class='glyphicon'></span>
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>
</div>

{{-- End View Modal --}}

<script>
$(document).ready(function() {
    //DataTable Initialization
    $('#table').DataTable({
        pagingType: 'full_numbers'
    });

    //Fill Data
    function fillmodalData(data)
    {
    $('#fid').val(data[0]);
    $('#created_by').val(data[1]);
    $('#title').val(data[2]);
    $('#status').val(data[3]);
    $('#posted_on').val(data[4]);
    }


    //View Button
    $(document).on('click', '.edit-modal', function() 
    {
        var data = $(this).data('info').split(',');
        fillmodalData(data)
        $('#myModal').modal('show');
    });

    //Create Button
    $(document).on('click', '.Create', function() 
    {
        $('#footer_action_button').text("Post Ticket");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('postTicket');
        $('.modal-title').text('Create Ticket');
        $('.form-horizontal').show();
        $('#post_created_by').val('{{auth()->user()->name}}');
        $('#myModalCreate').modal('show');
    });

    //Post Ticket
    $('.modal-footer').on('click', '.postTicket', function() 
    {
        $.ajax(
        {
            type: 'post',
            url: '/user/store',
            data: 
            {
                '_token': $('input[name=_token]').val(),
                'name': $('#post_created_by').val(),
                'title': $('#post_title').val(),
                'status': 'Open',
                'date': $('#post_posted_on').val(),

            },
            success: function(response) 
            {   
                var data = response['sendData'][0];
                var addData = '\
                        <td class="edit-modal" data-info="'+data.id+',You,'+data.title+','+data.status+','+data.created_at+'">'+data.id+'</td>\
                        <td class="edit-modal" data-info="'+data.id+',You,'+data.title+','+data.status+','+data.created_at+'">You</td>\
                        <td class="edit-modal" data-info="'+data.id+',You,'+data.title+','+data.status+','+data.created_at+'">'+data.title+'</td>\
                        <td class="edit-modal" data-info="'+data.id+',You,'+data.title+','+data.status+','+data.created_at+'">'+data.status+'</td>\
                        <td class="edit-modal" data-info="'+data.id+',You,'+data.title+','+data.status+','+data.created_at+'">'+data.created_at+'</td>\
                        ';
                $('#tablebody').prepend(addData);
            }
                
        });
    });
}); 
</script>


@endsection
