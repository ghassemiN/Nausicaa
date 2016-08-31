<?php 

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>Extra profile information</h3>

	<table class="form-table">

		<tr>
			<th><label for="twitter">Twitter</label></th>
			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Twitter username.</span>
			</td>
		</tr>
		<tr>
			<th><label for="facebook">Facebook</label></th>
			<td>
				<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Facebook Profile URL.</span>
			</td>
		</tr>
		<tr>
			<th><label for="linkedin">Linkedin</label></th>
			<td>
				<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your linkedin Profile URL.</span>
			</td>
		</tr>
		<tr>
			<th><label for="github">Github</label></th>
			<td>
				<input type="text" name="github" id="github" value="<?php echo esc_attr( get_the_author_meta( 'github', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Github username.</span>
			</td>
		</tr>

	</table>
<?php } 

	add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
	add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

	function my_save_extra_profile_fields( $user_id ) {

		if ( !current_user_can( 'edit_user', $user_id ) )
			return false;

		update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
		update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
		update_usermeta( $user_id, 'linkedin', $_POST['linkedin'] );
		update_usermeta( $user_id, 'github', $_POST['github'] );
	}



function my_author_box() { ?>
	<div id="author-profile" class="text-center">

		<?php echo get_avatar( get_the_author_meta( 'user_email' ), '200' ); ?>
		
		<h5 class="author-name"><?php the_author_posts_link(); ?></h5>

		<div class="social-media">
			<?php if ( get_the_author_meta( 'twitter' ) ) { ?>
				<span class="twitter">
					<a href="http://twitter.com/<?php the_author_meta( 'twitter' ); ?>
					"title="Follow me on Twitter">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</a>
				</span>
			<?php } // End check for twitter ?>

			<?php if ( get_the_author_meta( 'facebook' ) ) { ?>
				<span class="facebook">
					<a href="<?php the_author_meta( 'facebook' ); ?>
					"title="My Facebook profile">
					 	<i class="fa fa-facebook" aria-hidden="true"></i>
					 </a>
				</span>
			<?php } // End check for facebook ?>

			<?php if ( get_the_author_meta( 'linkedin' ) ) { ?>
				<span class="linkedin">
					<a href="<?php the_author_meta( 'linkedin' ); ?>
					"title="My Facebook profile">
					 	<i class="fa fa-linkedin" aria-hidden="true"></i>
					 </a>
				</span>
			<?php } // End check for twitter ?>

			<?php if ( get_the_author_meta( 'github' ) ) { ?>
				<span class="twitter">
					<a href="http://github.com/<?php the_author_meta( 'github' ); ?>
						" title="Follow <?php the_author_meta( 'display_name' ); ?> on Twitter"> 
						<i class="fa fa-github" aria-hidden="true"></i>
					</a>
				</span>
			<?php } // End check for twitter ?>
		</div>
	
	</div>

	<p class="author-description author-bio">
		<?php the_author_meta( 'description' ); ?>
	</p>




	<?php } ?>
