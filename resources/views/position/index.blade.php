@extends('layouts.app', [
    'title' => "Position"
])
@section('content')

    <div class="row">
        <div class="col">
            <button id="position_add">Add</button>
        </div>
    </div>

    <div id="position_modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="position_form">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Position</h5>
                        <p class="text-danger ml-5" id="message"></p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" id="position" name="position" class="form-control form-control-sm" placeholder="Position">
                        </div>

                        <div class="form-group">
                            <label for="staus">Status</label>
                            <select id="status" name="status" class="form-control form-control-sm">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control form-control-sm" cols="5" rows="5"></textarea>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-warning" id="position_form_submit">Submit</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Postion</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allPositions as $position)
                    <tr>
                        <td>{{ $position->position }}</td>
                        <td>{{ $position->status }}</td>
                        <td>{{ $position->description }}</td>
                        <td><i class="far fa-edit edit" data-id="{{ $position->id }}" style="cursor: pointer; font-size: 1rem;" data-toggle="tooltip" title="Edit"></i></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script language="javascript")>

        $(document).ready(function () {
            console.log('hello');
        });

        $(document).on('click', '#position_add', function () {
            $('#position_form').trigger('reset');
            clearForm();
            $('#position_modal').modal('show');
        });


        function clearForm() {
            $('#form_message').empty();
            $('#position_form').find('.text-danger').removeClass('text-danger');
            $('#position_form').find('.is-invalid').removeClass('is-invalid');
            $('#position_form').find('span').remove();
            return true;
        }


        $(document).on('submit', '#position_form' ,function () {
            console.log('hello');
            let data = new FormData(this);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('save/position') }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    location.reload();
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return false;
        });

        $(document).on('click', '.edit', function () {
            let id = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ url('get/position/edit/data') }}' + '/' + id,
                cache: false,
                success: function (result) {
                    console.log(result);
                    //clearForm();
                    //$('#position_form').trigger('reset');
                    $('#id').val(result.id);
                    $('#position').val(result.position);
                    $('#status').val(result.status);
                    $('#description').val(result.description);
                    $('#position_form_submit').text('UPDATE');
                    $('#position_modal').modal('show');
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return false;
        });


    </script>

@endsection
