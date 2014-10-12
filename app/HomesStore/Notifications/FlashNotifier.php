<?php namespace HomesStore\Notifications;


use Illuminate\Session\Store;

class FlashNotifier {

    private $session;

    function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function message($message, $level = 'info', $title = 'Notice')
    {
        $this->session->flash('flash_notification.message', $message);
        $this->session->flash('flash_notification.level', $level);
        $this->session->flash('flash_notification.title', $title);
    }

    public function success($message)
    {
        $this->message($message, 'success');
    }
    public function error($message)
    {
        $this->message($message, 'danger');
    }
    public function warning($message)
    {
        $this->message($message, 'warning');
    }
    public function overlay($message, $title)
    {
        $this->message($message,'',$title);
        $this->session->flash('flash_notification.overlay', true);
    }
}