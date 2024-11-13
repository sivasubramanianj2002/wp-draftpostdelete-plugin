<?php

namespace App\Controllers;

class Plugin
{
    /**
     * Add custom cron schedule.
     *
     * @param array $schedules Existing schedules.
     * @return array Modified schedules.
     */
    public function addCustomCron($schedules)
    {
        $schedules['every_minute'] = [
            'interval' => 60,
            'display' => __('Every Minute')
        ];
        return $schedules;
    }

    /**
     * Activate the plugin and schedule the event.
     *
     * This method schedules the auto-delete event if it is not already scheduled.
     *
     * @return void
     */
    public function activate()
    {
        // Schedule the event if not already scheduled
        if (!wp_next_scheduled('auto_delete_draft_posts_hook')) {
            wp_schedule_event(time() + 60, 'every_minute', 'auto_delete_draft_posts_hook');
        }
    }

    /**
     * Deactivate the plugin and unschedule the event.
     *
     * This method clears any scheduled events related to auto-deleting draft posts.
     *
     * @return void
     */
    public function deactivate()
    {
        // Clear scheduled event on deactivation
        $timestamp = wp_next_scheduled('auto_delete_draft_posts_hook');
        if ($timestamp) {
            wp_unschedule_event($timestamp, 'auto_delete_draft_posts_hook');
        }
    }
}