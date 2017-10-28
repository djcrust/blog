@extends('main')

@section('title', '| All Categories')

@section('content')

    <div class="row">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Categories</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-create" id="btn_refresh"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
                    <a href="{{ route('exportCategory') }}" class="btn btn-default btn-create"><span class="glyphicon glyphicon-export"></span> Export Excel</a>
                    <button class="btn btn-default btn-create" id="btn_create"><span class="glyphicon glyphicon-new-window"></span> Create</button>
                </div>
            </div>

            <div class="panel-body">

                @include('categories.create')

                <table class="table table-condensed table-hover" id ="table_data">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Updated at at</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody id="cat_list">


                    </tbody>
                </table>

                {!! $categories->render() !!}

            </div>


        </div>

    </div>


@stop

@section('scripts')

    <script type="text/javascript">

        data = "";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#btn_create').on('click',function() {
            $('#category_name').val('');
            $('#category_id').val('0');
            $('#btn-modal_create').text('Create');
            $('.modal-title').text('Create new Category');
            $('#frmCategory').trigger('reset');
            $('#modal_category').modal('show');

            $('#modal_category').on('shown.bs.modal',function () {
               $('#category_name').focus();
           })

        });

        $('tbody').delegate('.btn-edit','click',function () {
            //alert($(this).closest('tr').attr('id'));
            var nid = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: 'api/getCategoryData',
                data: {id:nid},
                success:function (response) {
                    $('#btn-modal_create').text('Update');
                    $('.modal-title').text('Update Category');
                    $('#category_id').val(response.id);
                    $('#category_name').val(response.name);
                    $('#modal_category').modal('show');


                }
            })
        });

        $('tbody').delegate('.btn-delete','click',function () {
            var nid = $(this).data('id');
            var $tr = $(this).closest('tr');
            if(confirm('Are you sure to delete this record?')==true){
                $.ajax({
                    type: 'POST',
                    url: 'api/deleteCategory',
                    data:{id:nid},
                    success:function (data) {
                        $tr.find('td,th').fadeOut(1000,function () {
                            $tr.remove;
                        })
                    }
                })
            }

        });

        $('#frmCategory').submit(function(event) {
            event.preventDefault();
            var form = $('#frmCategory');
            var formdata = form.serialize();

            if($('#category_id').val() == 0) {
                var new_url = 'api/createCategory';
            }else{
                var new_url = 'api/newUpdatedata';
            };

            $.ajax({
                type:'POST',
                url: new_url,
                async: true,
                data : formdata,
                datatype : 'json',
                success:function (data) {

                    read_data();

                    $('#frmCategory').trigger('reset');

                    $('#modal_category').modal('hide');

                }
            })
        });

//        submit = function () {
//            $.ajax({
//                url: 'api/getSavedata',
//                type: 'POST',
//                data: {category_id:$('#category_id').val(),name:$('#name').val()},
//                success : function(response) {
//                    load_data();
//                }
//
//            });
//        }

        $('#btn_refresh').on('click',function() {

            read_data();

        });

        read_data = function () {
            var url = '{{ URL::to('readData')}}';
            $.ajax({
               url:url,
                beforeSend:function(data) {
                    $('.animationload').show();
                },
                complete:function(data){
                    $('.animationload').hide();
                },
                success:function (data) {
                    $('#cat_list').empty().html(data);
                }
            });

        };

        load_data = function () {
            $.ajax({
                url: 'api/getListcategory',
                type: 'GET',
                success: function(response) {
                    data = response.data;

                    $('#cat_list').empty();

                    for(i=0; i< response.data.length; i++){

                        var urledit = '{{ route("categories.edit","id") }}';
                        urledit = urledit.replace('id', data[i].id);

                        var urldelete = '{{ route("categories.destroy","id") }}';
                        urldelete = urldelete.replace('id', data[i].id);

                        $('#cat_list').append('<tr id='+ data[i].id +'>'+
                            '<th>' + data[i].id + '</th>' +
                            '<td>' + data[i].name + '</td>' +
                            '<td>' + data[i].created_at + '</td>' +
                            '<td>' + data[i].updated_at + '</td>' +
                            '<td><button class="btn btn-default btn-edit" data-id="' + data[i].id +'"><span class="glyphicon glyphicon-edit"></span> Edit</button>&nbsp;' +
                            '<button class="btn btn-danger btn-delete" data-id="' + data[i].id + '"><span class="glyphicon glyphicon-remove"></span> Delete</button></td>' +
                            '<tr>');

                    }
                }
            });
        };

        $(document).ready(function () {

            read_data();

        });

    </script>


@endsection
