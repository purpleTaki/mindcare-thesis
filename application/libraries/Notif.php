<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Notif
{
    private $notifications = array();

    public function addNotification($message, $type = 'info')
    {
        $this->notifications[] = array('message' => $message, 'type' => $type);
    }

    public function getNotifications()
    {
        return $this->notifications;
    }
}
