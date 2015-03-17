<div class="comments">

	<h5 id="#comments-title"><?php echo count($comments); ?> Comments</h5>
	<ol>
		<?php wp_list_comments('type=comment&callback=comment&max_depth=1000&style=ol'); ?>
	</ol>

			<div id="respond" class="comment-respond">
				<h5 id="replytitle" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h5>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="clearfix">

				
				
					<?php if ( $user_ID ) { ?>
					<p style="margin-bottom:10px">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;|&nbsp;<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
					<?php } else { ?>
					<p class="input-row"><label for="author">Your Name *</label><input type="text" name="author" class="text_input" id="author" size="22" tabindex="1">
					</p>
					
					<p class="input-row"><label for="email">Your Email *</label><input type="text" name="email" class="text_input" id="email" size="22" tabindex="2">
					</p>
					
					<p class="input-row"><label for="url">Website</label><input type="text" name="url" class="text_input" id="url" size="22" tabindex="3">
					</p>
					
					<?php }?>
					
					<?php comment_id_fields(); do_action('comment_form', $post->ID); ?>
				
			
				
					<p class="input-row message-row"><label>Your Comment</label><textarea name="comment" id="comment" tabindex="4"></textarea></p>
					<input type="submit" name="submit" class="button" id="submit" tabindex="5" value="Submit">
				
				</form>
			</div>

</div>