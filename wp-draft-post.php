<?php
/**
 * Plugin name: Delete Drafts
 * Description: Plugin to Delete Draft posts every minute.
 * Author: Siva
 * Version: 1.0
 */

defined('ABSPATH') or die('not access');

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

// Activation hook to schedule the event and add custom cron schedules
register_activation_hook(__FILE__, function()  
{
    (new App\Controllers\Plugin())->activate();
}
);

// Deactivation hook to unschedule the event and remove custom cron schedules
register_deactivation_hook(__FILE__, function() {
    (new App\Controllers\Plugin())->deactivate();
});


if(class_exists('App\\Router')){
    (new App\Router()) ->init();
}