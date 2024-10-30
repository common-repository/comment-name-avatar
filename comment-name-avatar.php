<?php 
/*
Plugin Name: Comment Name Avatar
Description: This plugin shows comment author avatar look like skype avatar with short name.
Author: Amit Bhalani
Author URI: https://amitbhalani.wordpress.com/
Version: 1.0.1
*/

/* Define ABCL comment name */
class ABCL_comment_name {
	
	/* set the default constuctor of ABCL comment */
	function __construct() {
		
		wp_enqueue_style( 'ABCL_change_avatar', plugins_url('/css/change_avatar.css', __FILE__), false, '1.0.0', 'all');
		
		add_filter("get_avatar" , array($this, 'ABCL_change_avatar') , 1, 5);
	}
	
	/* change the avatar and design for aatar */
	public function ABCL_change_avatar($avatar, $coo, $size, $default, $alt)
	{
		global $in_comment_loop,$comment;
		$author_name = $comment->comment_author;
		
		if(!empty($author_name)){
			$words = explode(" ", $author_name );
			$acronym = "";

			foreach ($words as $w) {
			  $acronym .= $w[0];
			}
			
			return '<div class="abcl-author-icon">'.strtoupper($acronym).'</div>';
		} else {
			return '<div class="abcl-author-icon">USER</div>';
		}
	}

}
/*
 * Instantiate the class.
 */
$abcl = new ABCL_comment_name(); // go

?>