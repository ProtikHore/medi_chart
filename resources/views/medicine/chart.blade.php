@extends('layouts.app', [
    'title' => "Medicine Chart"
])
@section('content')

    <div class="row">
        <div class="col">
            <button id="medicine_chart_add">Add</button>
        </div>
    </div>

    <div id="medicine_chart_modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="medicine_chart_modal_form">
                    <div class="modal-header">
                        <h5 class="modal-title">Add to Chart</h5>
                        <p class="text-danger ml-5" id="message"></p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="medicine_name">Medicine Name</label>
                            <select id="medicine_name" name="medicine_name" class="form-control form-control-sm">
                                @foreach ($medicineList as $list)
                                    <option value={{ $list->id }}>{{ $list->name }} - {{ $list->strength }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="position">Position</label>
                            <select id="position" name="position" class="form-control form-control-sm">
                                @foreach ($positions as $position)
                                    <option value={{ $position->id }}>{{ $position->position }}</option>
                                @endforeach
                            </select>
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
                        <button type="submit" class="btn btn-sm btn-warning" id="medicine_chart_modal_form_submit">Submit</button>
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
                        <th>Name</th>
                        <th>Postion</th>
                        <th>Price</th>
                        <th>Generic Name</th>
                        <th>Pharmaceutical Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chartList as $list)
                    <tr>
                        <td>{{ $list->MedicineList->name }} - {{ $list->MedicineList->strength }}</td>
                        <td>{{ $list->position->position }}</td>
                        <td>{{ $list->MedicineList->unit_price }}</td>
                        <td>{{ $list->MedicineList->generic_name }}</td>
                        <td>{{ $list->MedicineList->pharmaceutical_name }}</td>
                        <td><i class="far fa-edit edit" data-id="{{ $list->id }}" style="cursor: pointer; font-size: 1rem;" data-toggle="tooltip" title="Edit"></i></td>
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

        $(document).on('click', '#medicine_chart_add', function () {
            $('#medicine_chart_modal_form').trigger('reset');
            clearForm();
            $('#medicine_chart_modal').modal('show').on('shown.bs.modal', function () {
                $('#medicine_name').select2();
            });
        });


        function clearForm() {
            $('#form_message').empty();
            $('#medicine_chart_modal_form').find('.text-danger').removeClass('text-danger');
            $('#medicine_chart_modal_form').find('.is-invalid').removeClass('is-invalid');
            $('#fomedicine_chart_modal_formrm').find('span').remove();
            return true;
        }


        $(document).on('submit', '#medicine_chart_modal_form' ,function () {
            console.log('hello');
            let data = new FormData(this);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('medicine/add/to/chart') }}',
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
                url: '{{ url('get/medicine/chart/edit/data') }}' + '/' + id,
                cache: false,
                success: function (result) {
                    console.log(result);
                    //clearForm();
                    //$('#position_form').trigger('reset');
                    $('#id').val(result.id);
                    $('#medicine_name').val(result.medicine_list_id);
                    $('#position').val(result.position_id);
                    $('#status').val(result.status);
                    $('#description').val(result.description);
                    $('#medicine_chart_modal_form_submit').text('UPDATE');
                    $('#medicine_chart_modal').modal('show');
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return false;
        });

    </script>

@endsection
