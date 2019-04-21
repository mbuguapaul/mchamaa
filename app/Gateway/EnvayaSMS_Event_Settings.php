<?php
namespace App\Gateway;

/* 
 * Update some of the app's settings.
 */
class EnvayaSMS_Event_Settings extends EnvayaSMS_Event
{
    public $settings;
    
    function __construct($settings /* associative array of key => value pairs (values can be int, bool, or string) */)
    {
        $this->event = EnvayaSMS::EVENT_SETTINGS;
        $this->settings = $settings;
    }
}
