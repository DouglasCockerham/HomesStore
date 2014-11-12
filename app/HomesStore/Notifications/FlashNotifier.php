<?php namespace HomesStore\Notifications;

use Illuminate\Session\Store;

class FlashNotifier {

    private $session;

    function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function message($message, $level = 'info', $title = 'Notice', $position = 'top')
    {
        $this->session->flash('flash_notification.message', $message);
        $this->session->flash('flash_notification.level', $level);
        $this->session->flash('flash_notification.title', $title);
        $this->session->flash('flash_notification.position', $position);
    }

    public function success($message, $position)
    {
        $this->message($message, 'success','',$position);
    }
    public function error($message, $position)
    {
        $this->message($message, 'danger','',$position);
    }
    public function warning($message, $position)
    {
        $this->message($message, 'warning','',$position);
    }
    public function overlay($message, $title)
    {
        $this->message($message,'',$title);
        $this->session->flash('flash_notification.overlay', true);
    }
}