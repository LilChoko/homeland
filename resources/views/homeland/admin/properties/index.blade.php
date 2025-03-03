@extends('layouts.homeland')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h3>Properties con DataTables</h3>
                <table id="tblProperties1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ADDRESS</th>
                            <th>PRICE</th>
                            <th>LISTING TYPE</th>
                            <th>OFFER TYPE</th>
                            <th>CITY</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties as $p)
                            <tr>
                                <td>{{ $p->address }}</td>
                                <td>{{ $p->price }}</td>
                                <td>{{ $p->list_type ? $p->list_type->name : 'N/A' }}</td>
                                <td>{{ $p->offer_type }}</td>
                                <td>{{ $p->city ? $p->city->name : 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h3>Properties con AJAX</h3>
                <table id="tblProperties2" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ADDRESS</th>
                            <th>PRICE</th>
                            <th>LISTING TYPE</th>
                            <th>OFFER TYPE</th>
                            <th>CITY</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
