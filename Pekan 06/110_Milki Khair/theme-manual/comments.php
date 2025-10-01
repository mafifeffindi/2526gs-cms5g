<?php
if (post_password_required()) return;
if (have_comments()) {
  echo '<h3>Komentar</h3><ol class="comment-list">';
  wp_list_comments();
  echo '</ol>';
}
comment_form();

