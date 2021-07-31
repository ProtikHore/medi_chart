@extends('layouts.app', [
    'title' => "Medicine List"
])
@section('content')

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
                    @foreach ($medicineList as $list)
                    <tr>
                        <td>{{ $list->name }}</td>
                        <td>{{ $list->strength }}</td>
                        <td>{{ $list->unit_price }}</td>
                        <td>{{ $list->generic_name }}</td>
                        <td>{{ $list->pharmaceutical_name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- <div class="row mt-2">
        <div class="col">
            <div class="d-flex justify-content-center">
                {{ $medicineList->links() }}
            </div>
        </div>
    </div> --}}

    <div>
        {{ $medicineList->links() }}
    </div>

@endsection
