@extends('admin.layout-admin')

@php
    $showHeading  = true;
    $buttonReport = true;
@endphp

@section('title', 'Dashboard')
@section('namePageHeading', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col">
            <h3> session :  {{ $user }}</h3>
             
            <input type="text" id="keywordText" />
            <button id="btnSearchText"> OK </button>

            <div class="table-responsive mt-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>MSV</th>
                            <th>Ho ten</th>
                            <th>Email</th>
                            <th>Dia chi</th>
                            <th>Tuoi</th>
                            <th>Gioi tinh</th>
                            <th>Hoc bong</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // khai bao bien
                            /* */
                            $totalMoney = 0;
                        @endphp
                        {{-- comment blade laravel --}}
                        @foreach ($students as $key => $item)
                            @php
                                $totalMoney += $item['money'];
                            @endphp
                            <tr class="{{ $item['id'] % 2 === 0 ? 'chan' : 'le' }}">
                                <td>{{ $item['id'] }}</td>
                                <td>{!! $item['name'] !!}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['address'] }}</td>
                                <td>{{ $item['age'] }}</td>
                                {{-- <td>{{ $item['gender'] == 1 ? 'Nam' : 'Nu' }}</td> --}}
                                @if($item['gender'] == 1)
                                    <td> Nam </td>
                                @elseif($item['gender'] == 0)
                                    <td> Nu </td>
                                @endif
                                <td>{{ number_format($item['money']) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">Tong tien</td>
                            <td> {{ number_format($totalMoney) }} </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- import file js --}}
    <script src="{{ asset('admin/js/dashboard/search.js') }}"></script>
@endpush