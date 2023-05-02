@extends('layouts.account')

@section('title')
OUTCOME REPORT - OKANEE
@stop

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1> OUTCOME REPORT</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-chart-area"></i> MONEY OUTCOME REPORT</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('account.laporan_credit.check') }}" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>EARLY DATE</label>
                                    <input type="text" name="tanggal_awal" value="{{ old('tanggal_awal') }}"
                                        class="form-control datepicker">
                                </div>
                            </div>
                            <div class="col-md-2" style="text-align: center">
                                <label style="margin-top: 38px;">UNTIL</label>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>END DATE</label>
                                    <input type="text" name="tanggal_akhir" value="{{ old('tanggal_kahir') }}"
                                        class="form-control datepicker">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary mr-1 btn-submit btn-block" type="submit"
                                    style="margin-top: 30px"><i class="fa fa-filter"></i> FILTER</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            @if (isset($credit))
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-chart-area"></i> MONEY OUTCOME REPORT</h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">NOMINAL</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col">DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                function rupiah($nominal) {
                                return "Rp " . number_format($nominal, 0, ',', '.');
                                }
                                @endphp
                                @foreach ($credit as $hasil)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ $no }}</th>
                                    <td>{{ $hasil->name }}</td>
                                    <td>{{ rupiah($hasil->nominal) }}</td>
                                    <td>{{ $hasil->description }}</td>
                                    <td>{{ $hasil->credit_date }}</td>
                                </tr>
                                @php
                                $no++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$credit->links("vendor.pagination.bootstrap-4")}}
                        </div>
                    </div>

                </div>
            </div>
            @endif


        </div>
    </section>
</div>
@stop