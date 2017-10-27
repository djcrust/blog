@extends('main')

@section('title', '| All Categories')

@section('content')

    <div class="row">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Categories</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-create"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
                    <button class="btn btn-default btn-create"><span class="glyphicon glyphicon-export"></span> Export Excel</button>
                    <button class="btn btn-default btn-create" id="btn_create"><span class="glyphicon glyphicon-new-window"></span> Create</button>
                </div>
            </div>

            <div class="panel-body">

                @include('categories.create')

                <table class="table table-hover" id ="table_data">
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

                    @foreach($categories as $category)
                        <tr id = "{{ $category->id }}">
                            <th>{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td>
                                <button class="btn btn-default btn-edit" data-id="{{ $category->id }}">Edit</button>
                                <button class="btn btn-danger btn-delete" data-id="{{ $category->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>




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

           $('#modal_category').modal('show');

           $('#modal_category').on('shown.bs.modal',function () {
               $('#category_name').focus();
           })

        })

        $('.btn-edit').on('click',function () {
            //alert($(this).data('id'));

            alert($(this).closest('tr').attr('id'));
        })

        $('#frmCategory').submit(function(event) {
            event.preventDefault();
            var form = $('#frmCategory');
            var formdata = form.serialize();
            $.ajax({
                type:'POST',
                url: 'api/createCategory',
                async: true,
                data : formdata,
                datatype : 'json',
                success:function (data) {

                    load_data();

                    $('#frmCategory').trigger('reset');

                    $('#modal_category').modal('hide');

                }
            })
        })

        submit = function () {
            $.ajax({
                url: 'api/getSavedata',
                type: 'POST',
                data: {category_id:$('#category_id').val(),name:$('#name').val()},
                success : function(response) {
                    load_data();
                }

            });
        }

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
                            '<td><button class="btn btn-default" data-id=' + data[i].id +'>Edit</button>' +
                            '<button class="btn btn-danger" data-id=' + data[i].id + '>Delete</button></td>' +
                            '<tr>');

                    }
                }
            });
        }

    </script>


@endsection
