@extends('layouts.account')

@section('title')
Dashboard - OKANEE
@stop

@section('content')

<script>

</script>
<?php
    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah;
    }
    ?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>TOTAL BALANCE </h4>
                        </div>
                        <div class="card-body" style="font-size: 20px">
                            {{ rupiah($saldo_selama_ini) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>THIS MONTH BALANCE</h4>
                        </div>
                        <div class="card-body" style="font-size: 20px">
                            {{ rupiah($saldo_bulan_ini) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>LAST MONTH BALANCE</h4>
                        </div>
                        <div class="card-body" style="font-size: 20px">
                            {{ rupiah($saldo_bulan_lalu) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-chart-pie"></i> STATISTIK KEUANGAN DALAM 1 TAHUN</h4>
                    </div>

                    <div class="card-body">
                        <div id="container"></div>
                    </div>
                </div>
            </div>
        </div> -->

    </section>
</div>
@stop