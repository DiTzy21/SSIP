@extends('layouts.account')

@section('title')
EDIT INCOME - OKANEE
@stop

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1> INCOME</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-money-check-alt"></i> EDIT MONEY INCOME</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('account.debit.update', $debit->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NOMINAL (Rp.)</label>
                                    <input type="text" name="nominal" value="{{ old('nominal', $debit->nominal) }}"
                                        placeholder="Insert Nominal" class="form-control currency">

                                    @error('nominal')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>DATE</label>
                                    <input type="text" class="form-control datetimepicker" name="debit_date"
                                        value="{{ old('debit_date', $debit->debit_date) }}" placeholder="Pilih Tanggal">

                                    @error('date_debit')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>CATEGORY</label>
                                    <select class="form-control select2" name="category_id">
                                        <option value="">--CHOOSE CATEGORY --</option>
                                        @foreach ($categories as $hasil)
                                        @if($debit->category_id == $hasil->id)
                                        <option value="{{ $hasil->id }}" selected> {{ $hasil->name }}</option>
                                        @else
                                        <option value="{{ $hasil->id }}"> {{ $hasil->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>DESCRIPTION</label>
                                    <textarea class="form-control" name="description" rows="6"
                                        placeholder="Masukkan Keterangan">{{ old('description', $debit->description) }}</textarea>

                                    @error('description')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            UPDATE</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
<script>
    if($(".datetimepicker").length) {
            $('.datetimepicker').daterangepicker({
                locale: {format: 'YYYY-MM-DD hh:mm'},
                singleDatePicker: true,
                timePicker: true,
                timePicker24Hour: true,
            });
        }

        var cleaveC = new Cleave('.currency', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });

        var timeoutHandler = null;

        /**
         * btn submit loader
         */
        $( ".btn-submit" ).click(function()
        {
            $( ".btn-submit" ).addClass('btn-progress');
            if (timeoutHandler) clearTimeout(timeoutHandler);

            timeoutHandler = setTimeout(function()
            {
                $( ".btn-submit" ).removeClass('btn-progress');

            }, 1000);
        });

        /**
         * btn reset loader
         */
        $( ".btn-reset" ).click(function()
        {
            $( ".btn-reset" ).addClass('btn-progress');
            if (timeoutHandler) clearTimeout(timeoutHandler);

            timeoutHandler = setTimeout(function()
            {
                $( ".btn-reset" ).removeClass('btn-progress');

            }, 500);
        })

</script>
@stop