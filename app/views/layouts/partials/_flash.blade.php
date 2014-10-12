    @if (Session::has('flash_notification'))
        @if (Session::has('flash_notification.overlay'))
            @include('layouts/partials/_modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
        @else
            <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4>{{ Session::get('flash_notification.message') }}</h4>
            </div>
            {{--go ahead and forget the flash notification to prevent empty pop-ups later--}}
            {{ Session::forget('flash_notification') }}
        @endif
    @endif