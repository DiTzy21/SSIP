@extends('layouts.account')

@section('title')
ADD INCOME CATEGORY - UANGKU
@stop

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>INCOME CATEGORY</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-dice-d6"></i> ADD INCOME CATEGORY</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('account.categories_debit.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>CATEGORY NAME</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                placeholder="Please Input the Category Name" class="form-control">

                            @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            SAVE</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
<script>
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