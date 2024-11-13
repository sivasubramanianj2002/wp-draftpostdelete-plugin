<?php

namespace App\Controllers;

class DeleteDraftPost
{
    /**
     * Auto-delete draft posts.
     *
     * This method retrieves all draft posts and deletes them permanently.
     *
     * @return void
     */
    public function autoDeleteDraftPosts()
    {
        $draftPosts = get_posts(['post_status' => 'draft', 'posts_per_page' => -1]);
        
        if (!empty($draftPosts)) {
            foreach ($draftPosts as $draftPost) {
                wp_delete_post($draftPost->ID, true);
            }
        }
    }
}