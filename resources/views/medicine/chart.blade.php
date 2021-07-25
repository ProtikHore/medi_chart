@extends('layouts.app', [
    'title' => "Configuration"
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
                        <h5 class="modal-title">Change Password</h5>
                        <p class="text-danger ml-5" id="message"></p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="medicine_name">Medicine Name</label>
                            <select id="medicine_name" name="medicine_name" class="form-control form-control-sm">
                                @foreach ($medicineList as $list)
                                    <option value={{ $list->id }}>{{ $list->name }} - {{ $list->strength }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label id="position" for="position">Position</label>
                            <select id="position" name="position" class="form-control form-control-sm">
                                <option value="row1_col1">row1_col1</option>
                                <option value="row2_col1">row1_col1</option>
                                <option value="row3_col1">row1_col1</option>
                                <option value="row4_col1">row1_col1</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-warning">Change</button>
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
                        <th>Strength</th>
                        <th>Price</th>
                        <th>Generic Name</th>
                        <th>Pharmaceutical Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chartList as $list)
                    <tr>
                        <td>{{ $list->medicine_list_id }}</td>
                        <td>{{ $list->status }}</td>
                        <td>{{ $list->description }}</td>
                        <td>{{ $list->sequence }}</td>
                        <td>{{ $list->created_at }}</td>
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
            $('#medicine_chart_modal').modal('show').on('shown.bs.modal', function () {
                $('#medicine_name').select2();
            });
        });
    </script>

@endsection
