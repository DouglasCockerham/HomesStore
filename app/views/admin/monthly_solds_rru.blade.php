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

                <label for="from">From</label>
                <input type="text" id="from" name="from">
                <label for="to">to</label>
                <input type="text" id="to" name="to">
                <button class="btn btn-primary btn-sm" id="btnExecute">Execute!</button>
                <button class="btn btn-danger btn-sm" id="btnExport">Export to Excel</button>
                <div id="search-results"></div>
            </section>

        </div>

    </section><!-- container -->

@stop

@section('localScripts')

    <script>

        $(document).ready(function(){

            $(function() {
                $( "#from" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    dateFormat: 'yy-mm-dd',
                    onClose: function( selectedDate ) {
                    $( "#to" ).datepicker( "option", "minDate", selectedDate );
                    }
                });
                $( "#to" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    dateFormat: 'yy-mm-dd',
                    onClose: function( selectedDate ) {
                    $( "#from" ).datepicker( "option", "maxDate", selectedDate );
                    }
                });
            });

            $('#btnExecute').click(function () {
                $.ajax({url:"rruget.php?startDate=" + $('#from').val() + "&endDate=" + $('#to').val(),success:function(result){
                    $("#search-results").html(result);
                }});
            });

            $('#btnExport').click(function(e) {
                window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#search-results').html()));
                e.preventDefault();

            });
        });

    </script>

@stop
