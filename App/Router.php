<?php

namespace App;

use App\Controllers\DeleteDraftPost;
use App\Controllers\Plugin;

class Router
{
    private $deleteDraftPost;
    private $plugin;

    public function init()
    {
        $this->deleteDraftPost = new DeleteDraftPost();
        $this->plugin = new Plugin();

        add_action('auto_delete_draft_posts_hook', [$this->deleteDraftPost, 'autoDeleteDraftPosts']);
        add_filter('cron_schedules', [$this->plugin, 'addCustomCron']);
    }

}