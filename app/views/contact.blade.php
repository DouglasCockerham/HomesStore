@extends('layouts.master')

@section('title')
    Contact
@stop

@section('bodyId')
"contact"
@stop

@section('PageContent')

<section class="main col col-md-7">
    <div class="contact-form">
        <p>We are here to answer any questions about you may have about our housing market or our team.  Reach out to us and we will respond as quickly as possible.  We love getting messages from our existing or prospective clients, so go ahead and drop us a line.</p>
        <p>We are also interested in any feedback you may have regarding our site or services.  If there is something that you need and cannot find here, let us know.  We are constantly searching for ways to improve our services to you.</p>
        <br>

        {{ Form::open(array('route' => 'send-contact-message', 'method' => 'post')) }}

            <!-- Email Form Input -->
            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter your email address']) }}
                @if($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <!-- Name Form Input -->
            <div class="form-group">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter your name']) }}
                @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <!-- Phone Form Input -->
            <div class="form-group">
                {{ Form::label('phone', 'Phone:') }}
                {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Optional, but we assume that you\'d like a call back if entered']) }}
                @if($errors->has('phone'))
                    <div class="error">{{ $errors->first('phone') }}</div>
                @endif
            </div>
            <!-- Message Form Input -->
            <div class="form-group">
                {{ Form::label('message', 'Message:') }}
                {{ Form::textarea('message', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'What\'s on your mind?']) }}
                @if($errors->has('message'))
                    <div class="error">{{ $errors->first('message') }}</div>
                @endif
            </div>
            <div class="form-group">
                {{ Form::submit('Send', ['class' => 'btn btn-success']) }}
            </div>

        {{ Form::close() }}
    </div>
</section>

<section class="col-md-5">
    <table class="table table-condensed">
        <tr>
            <td colspan="2">
                <h3>Kelly Cockerham</h3>
                <h5>Chief Executive & Team Leader</h5>
                <div>
                    <div class="pull-left">
                        <img src="images/kellysm.jpg" alt="Kelly Cockerham" class="img-circle">
                    </div>
                    <div class="pull-right">
                        <a href="assets/kellycockerham.vcf" data-toggle="tooltip" data-placement="left" data-original-title="Download my vCard">
                        <span class="fa-stack fa-lg vCard">
                            {{--<i class="fa fa-circle-o-notch fa-spin fa-stack-2x"></i>--}}
                            <i class="fa fa-download fa-stack-2x"></i>
                        </span>
                        </a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td><i class="fa fa-phone-square"></i> Direct:</td>
            <td>(813) 417-5428 <i data-toggle="tooltip" data-original-title="You may also text directly to this number" class="fa fa-info-circle"></i></td>
        </tr>
        <tr>
            <td><i class="fa fa-fax"></i> Fax:</td>
            <td>(863) 537-1073</td>
        </tr>
        <tr>
            <td><i class="fa fa-envelope"></i> email:</td>
            <td><a href="mailto:kellycockerham@homes-store.com">kellycockerham@homes-store.com</a></td>
        </tr>
        <tr>
            <td><i class="fa fa-envelope-o"></i> email:</td>
            <td><a href="mailto:kellycockerham@remax.net">kellycockerham@remax.net</a></td>
        </tr>
        <tr>
            <td colspan="2" class="socialButtons">
                <a href="https://www.linkedin.com/profile/view?id=19770092">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-2x linkedin-icon"></i>
                        <i data-toggle="tooltip" data-original-title="Find me on LinkedIn" class="fa fa-linkedin fa-stack-1x linkedin-icon"></i>
                    </span>
                </a>
                <a href="https://plus.google.com/u/0/+Homes-Store/posts">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-2x google-icon"></i>
                        <i data-toggle="tooltip" data-original-title="Add us to your circles on Google+" class="fa fa-google-plus fa-stack-1x google-icon"></i>
                    </span>
                </a>
                <a href="https://www.facebook.com/HomesStore">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-2x facebook-icon"></i>
                        <i data-toggle="tooltip" data-original-title="'Like' us on Facebook" class="fa fa-facebook fa-stack-1x facebook-icon"></i>
                    </span>
                </a>
                <a href="https://twitter.com/HomesStore">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-2x twitter-icon"></i>
                        <i data-toggle="tooltip" data-original-title="Follow us on Twitter" class="fa fa-twitter fa-stack-1x twitter-icon"></i>
                    </span>
                </a>
            </td>
        </tr>

    </table>

    <table class="table table-condensed">
        <tr>
            <td colspan="2">
                <h3>Douglas Cockerham</h3>
                <h5>Chief Technologist & Real Estate Professional</h5>
                <div>
                    <div class="pull-left">
                        <img src="images/dougsm.jpg" alt="Douglas Cockerham" class="img-circle">
                    </div>
                    <div class="pull-right">
                        <a href="assets/douglascockerham.vcf" data-toggle="tooltip" data-placement="left" data-original-title="Download my vCard">
                        <span class="fa-stack fa-lg vCard">
                            {{--<i class="fa fa-circle-o-notch fa-spin fa-stack-2x"></i>--}}
                            <i class="fa fa-download fa-stack-2x"></i>
                        </span>
                        </a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td><i class="fa fa-phone-square"></i> Direct:</td>
            <td>(813) 731-1457 <i data-toggle="tooltip" data-original-title="You may also text directly to this number" class="fa fa-info-circle"></i></td>
        </tr>
        <tr>
            <td><i class="fa fa-fax"></i> Fax:</td>
            <td>(863) 537-1073</td>
        </tr>
        <tr>
            <td><i class="fa fa-envelope"></i> email:</td>
            <td><a href="mailto:douglas.cockerham@homes-store.com">douglas.cockerham@homes-store.com</a></td>
        </tr>
        <tr>
            <td><i class="fa fa-envelope-o"></i> email:</td>
            <td><a href="mailto:douglas.cockerham@remax.net">douglas.cockerham@remax.net</a></td>
        </tr>
        <tr>
            <td colspan="2" class="socialButtons">
                <a href="https://www.linkedin.com/profile/view?id=22787383">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-2x linkedin-icon"></i>
                        <i data-toggle="tooltip" data-original-title="Find me on LinkedIn" class="fa fa-linkedin fa-stack-1x linkedin-icon"></i>
                    </span>
                </a>
                <a href="https://plus.google.com/u/0/+Homes-Store/posts">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-2x google-icon"></i>
                        <i data-toggle="tooltip" data-original-title="Add us to your circles on Google+" class="fa fa-google-plus fa-stack-1x google-icon"></i>
                    </span>
                </a>
                <a href="https://www.facebook.com/HomesStore">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-2x facebook-icon"></i>
                        <i data-toggle="tooltip" data-original-title="'Like' us on Facebook" class="fa fa-facebook fa-stack-1x facebook-icon"></i>
                    </span>
                </a>
                <a href="https://twitter.com/HomesStore">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-2x twitter-icon"></i>
                        <i data-toggle="tooltip" data-original-title="Follow us on Twitter" class="fa fa-twitter fa-stack-1x twitter-icon"></i>
                    </span>
                </a>
            </td>
        </tr>
    </table>
</section>
@stop
