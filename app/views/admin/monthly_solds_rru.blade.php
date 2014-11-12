@extends('layouts/master')

@section('title')Monthly Solds - RRU
@stop

@section('bodyID')admin-monthlyReport
@stop

@section('PageContent')

    <header class="jumbotron">
        <h1>Welcome</h1>
        <h3>Uncommon Service, Outstanding Results!</h3>
    </header>
    <section class="container">

        <div class="content row">

            <section class="main col col-lg-12">

                {{ Form::open(['data-remote']) }}

                    <!-- DateFrom Form Input -->
                    <div class="form-group">
                        {{ Form::label('dateFrom', 'From:') }}
                        {{ Form::text('dateFrom', null, ['class' => 'form-control', 'id' => 'dateFrom']) }}
                    </div>
                    <!-- DateTo Form Input -->
                    <div class="form-group">
                        {{ Form::label('dateTo', 'To:') }}
                        {{ Form::text('dateTo', null, ['class' => 'form-control', 'id' => 'dateTo']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Get Report', ['class' => 'btn btn-default']) }}
                    </div>

                {{ Form::close() }}

                {{--<label for="from">From</label>--}}
                {{--<input type="text" id="from" name="from">--}}
                {{--<label for="to">to</label>--}}
                {{--<input type="text" id="to" name="to">--}}
                {{--<button class="btn btn-primary btn-sm" id="btnExecute">Execute!</button>--}}
                {{--<button class="btn btn-danger btn-sm" id="btnExport">Export to Excel</button>--}}
                <div id="search-results"></div>
            </section>

        </div>

    </section><!-- container -->

@stop

@section('localScripts')

    <script>

        $(document).ready(function(){

            $(function() {
                $( "#dateFrom" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    dateFormat: 'yy-mm-dd',
                    onClose: function( selectedDate ) {
                    $( "#dateTo" ).datepicker( "option", "minDate", selectedDate );
                    }
                });
                $( "#dateTo" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    dateFormat: 'yy-mm-dd',
                    onClose: function( selectedDate ) {
                    $( "#dateFrom" ).datepicker( "option", "maxDate", selectedDate );
                    }
                });
            });

//            $('#btnExecute').click(function () {
//                $.ajax({url:"rruget.php?startDate=" + $('#from').val() + "&endDate=" + $('#to').val(),success:function(result){
//                    $("#search-results").html(result);
//                }});
//            });
//
//            $('#btnExport').click(function(e) {
//                window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#search-results').html()));
//                e.preventDefault();
//
//            });

            (function() {

              $('form[data-remote]').on('submit', function(e) {

                var form = $(this);
                var method = form.find('input[name="_method"]').val() || 'POST';
                var url = form.prop('action');

                $.ajax({
                  type: method,
                  url: url,
                  data: form.serialize(),
                  success: function() {
                    alert('all done!')
                  }
                });

                e.preventDefault;

              });
            })();

        });

    </script>

@stop
