<?php

// Block direct requests
defined( 'ABSPATH' ) or die( '-1' );
?>
<p>
	<label for="<?php echo rg_get_field_id($instance, 'allow_duplicate_files'); ?>">
		<?php rc_e('ROKGALLERY_LABEL_GALLERY'); ?>
	</label>
	<?php echo RokGallery_Forms_Fields_GalleryManager::getInput( $instance, rg_get_field_name($instance, 'gallery_id'), rg_get_field_id($instance, 'gallery_id'), $instance['gallery_id'], rg_get_field_id($instance, 'title') );?>
</p>

<p>
    <label for="<?php echo rg_get_field_id($instance, 'sort_by'); ?>">
        <?php rc_e('ROKGALLERY_LABEL_SORT_BY'); ?>
    </label>
    <select class="widefat" id="<?php echo rg_get_field_id($instance, 'sort_by'); ?>"
            name="<?php echo rg_get_field_name($instance, 'sort_by'); ?>">
        <option value="gallery_ordering"<?php rg_selected($instance['sort_by'], 'gallery_ordering'); ?>><?php rc_e('ROKGALLERY_SORT_GALLERY_ORDERING'); ?></option>
        <option value="slice_title"<?php rg_selected($instance['sort_by'], 'slice_title'); ?>><?php rc_e('ROKGALLERY_SORT_TITLE'); ?></option>
        <option value="slice_updated_at"<?php rg_selected($instance['sort_by'], 'slice_updated_at'); ?>><?php rc_e('ROKGALLERY_SORT_UPDATED'); ?></option>
        <option value="file_created_at"<?php rg_selected($instance['sort_by'], 'file_created_at'); ?>><?php rc_e('ROKGALLERY_SORT_CREATED'); ?></option>
        <option value="loves"<?php rg_selected($instance['sort_by'], 'loves'); ?>><?php rc_e('ROKGALLERY_SORT_LOVES'); ?></option>
        <option value="views"<?php rg_selected($instance['sort_by'], 'views'); ?>><?php rc_e('ROKGALLERY_SORT_VIEWS'); ?></option>
        <option value="random"<?php rg_selected($instance['sort_by'], 'random'); ?>><?php rc_e('ROKGALLERY_SORT_RANDOM'); ?></option>
    </select>
</p>

<p>
    <label for="<?php echo rg_get_field_id($instance, 'sort_direction'); ?>">
        <?php rc_e('ROKGALLERY_LABEL_SORT_DIRECTION'); ?>
    </label>
    <select class="widefat" id="<?php echo rg_get_field_id($instance, 'sort_direction'); ?>"
            name="<?php echo rg_get_field_name($instance, 'sort_direction'); ?>">
        <option value="ASC"<?php rg_selected($instance['sort_direction'], 'ASC'); ?>><?php rc_e('ROKGALLERY_ASCENDING'); ?></option>
        <option value="DESC"<?php rg_selected($instance['sort_direction'], 'DESC'); ?>><?php rc_e('ROKGALLERY_DESCENDING'); ?></option>
    </select>
</p>

<p>
    <label for="<?php echo rg_get_field_id($instance, 'limit_count'); ?>">
        <?php rc_e('ROKGALLERY_LABEL_LIMIT'); ?>
    </label>
    <input class="widefat" id="<?php echo rg_get_field_id($instance, 'limit_count'); ?>"
           name="<?php echo rg_get_field_name($instance, 'limit_count'); ?>" type="text"
           value="<?php echo $instance['limit_count']; ?>"/>
</p>

<p>
    <label for="<?php echo rg_get_field_id($instance, 'autoplay_delay'); ?>">
        <?php rc_e('ROKGALLERY_LABEL_AUTOPLAY_DELAY'); ?>
    </label>
    <input class="widefat" id="<?php echo rg_get_field_id($instance, 'autoplay_delay'); ?>"
           name="<?php echo rg_get_field_name($instance, 'autoplay_delay'); ?>" type="text"
           value="<?php echo $instance['autoplay_delay']; ?>"/>
</p>
