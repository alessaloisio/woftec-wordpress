<?php

add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
	add_meta_box( 'my-meta-box-id', 'L\'article parle d\'une marque ?', 'cd_meta_box_cb', 'post', 'normal', 'high' );
}

function cd_meta_box_cb( $post )
{
	$values = get_post_custom( $post->ID );
	$m_selected = isset( $values['marque'] ) ? esc_attr( $values['marque'][0] ) : '';
	$c_selected = isset( $values['categories'] ) ? esc_attr( $values['categories'][0] ) : '';
	$d_selected = isset( $values['domaine'] ) ? esc_attr( $values['domaine'][0] ) : '';
	$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(),'thumbnail', true);
	$check = isset( $values['img_url'] ) ? esc_attr( $values['img_url'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	

	<p>
		<label for="marque">Marque</label>
		<select name="marque" id="marque">
			<option value="" <?php selected( $m_selected, '' ); ?>></option>
			<option value="samsung" <?php selected( $m_selected, 'samsung' ); ?>>Samsung</option>
			<option value="apple" <?php selected( $m_selected, 'apple' ); ?>>Apple</option>
			<option value="sony" <?php selected( $m_selected, 'sony' ); ?>>Sony</option>
			<option value="asus" <?php selected( $m_selected, 'asus' ); ?>>Asus</option>
			<option value="google" <?php selected( $m_selected, 'google' ); ?>>Google</option>
			<option value="lg" <?php selected( $m_selected, 'lg' ); ?>>LG</option>
			<option value="acer" <?php selected( $m_selected, 'acer' ); ?>>Acer</option>
			<option value="microsoft" <?php selected( $m_selected, 'microsoft' ); ?>>Microsoft</option>
		</select>
	</p>
	
	<p>
		<label for="categories">Catégories</label>
		<select name="categories" id="categories">
			<option value="" <?php selected( $c_selected, '' ); ?>></option>
			<option value="rumeurs" <?php selected( $c_selected, 'rumeurs' ); ?>>Rumeurs</option>
			<option value="smartphone" <?php selected( $c_selected, 'smartphone' ); ?>>Smartphone</option>
			<option value="tablette" <?php selected( $c_selected, 'tablette' ); ?>>Tablette</option>
			<option value="portable" <?php selected( $c_selected, 'portable' ); ?>>Portable</option>
			<option value="accessoires" <?php selected( $c_selected, 'accessoires' ); ?>>Accessoires</option>
		</select>
	</p>

	<p>
		<label for="domaine">Domaine</label>
		<select name="domaine" id="domaine">
			<option value="" <?php selected( $d_selected, '' ); ?>></option>
			<option value="Smartphone" <?php selected( $d_selected, 'Smartphone' ); ?>>Smartphone</option>
			<option value="Jeux Vidéo" <?php selected( $d_selected, 'Jeux Vidéo' ); ?>>Jeux Vidéo</option>
			<option value="PC/Mac" <?php selected( $d_selected, 'PC/Mac' ); ?>>PC/Mac</option>
		</select>
	</p>
	<p>
		<input type="checkbox" name="img_url" id="img_url" <?php checked( $check, $thumb[0] ); ?> />
		<label for="img_url">Cocher pour ajouter l'image à la une, dans page marque.</label>
	</p>
	<?php	

}


add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id )
{
	global $wpdb;
	$table = $wpdb->prefix.'posts';
	$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(),'thumbnail', true);
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
	
	if( isset( $_POST['marque'] ) )
		update_post_meta( $post_id, 'marque', esc_attr( $_POST['marque'] ) );

	if( isset( $_POST['categories'] ) )
		update_post_meta( $post_id, 'categories', esc_attr( $_POST['categories'] ) );

	if( isset( $_POST['domaine'] ) )
		update_post_meta( $post_id, 'domaine', esc_attr( $_POST['domaine'] ) );
	
	// This is purely my personal preference for saving check-boxes
    $chk = isset( $_POST['img_url'] ) && $_POST['img_url'] ? $thumb[0] : '';  
		update_post_meta( $post_id, 'img_url', $chk );
	
	require_once("../marque/config/db.php");
	if(isset($_POST['marque']) AND isset($_POST['categories']) AND isset($_POST['domaine']) AND isset($_POST['img_url'])){
			$req = $bdd->prepare("UPDATE $table SET marque= :mar, categorie_marque= :cat, domaine= :dom, img_article= :img WHERE ID=:idArt AND post_type=\"post\"");
			$req->execute(array(
				'mar' => $_POST['marque'], 
				'cat' => $_POST['categories'], 
				'dom' => $_POST['domaine'], 
				'img' => $thumb[0],
				'idArt' => $post_id
				))or die(print_r($bdd->errorInfo()));
			$req->closeCursor();
	}else{
			$req = $bdd->prepare("UPDATE $table SET marque= :mar, categorie_marque= :cat, domaine= :dom, img_article= :img WHERE ID=:idArt AND post_type=\"post\"");
			$req->execute(array(
				'mar' => '', 
				'cat' => '', 
				'dom' => '', 
				'img' => '',
				'idArt' => $post_id
				))or die(print_r($bdd->errorInfo()));
			$req->closeCursor();
		}
}
?>