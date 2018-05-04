<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 04-May-18
 * Time: 9:55 PM
 */

class roomsFunctions{
    public function __construct(){
        add_filter( 'post_row_actions', array($this, 'rooms_modify_list_row_actions'), 10, 2 );

        //manage_POSTTYPE_posts_columns
        add_filter('manage_rooms_posts_columns', array($this, 'rooms_add_columns'));
        add_filter('manage_rooms_sortable_columns', array($this, 'rooms_add_columns'));

        //manage_POSTTYPE_posts_custom_column
        add_action ('manage_rooms_posts_custom_column', array($this, 'rooms_custom_data_column'), 10, 2);

        //manage_edit-POSTTYPE_sortable_columns
        add_filter('manage_edit-rooms_sortable_columns', array($this, 'rooms_set_custom_column_sortable'));

        add_action('pre_get_posts', array($this, 'rooms_custom_orderby'));
    }

    /**
     * Modify list view action
     *
     * @param $actions
     * @param $post
     * @return mixed
     */
    public function rooms_modify_list_row_actions( $actions, $post ) {
        //Post type rooms
        if ($post->post_type == 'rooms'){
            unset($actions['inline hide-if-no-js']);
            unset($actions['view']);
            $actions['book_room'] = "<a class='book_room' href='".admin_url('/test/book-room')."'>" . __( 'Book Room', 'twentyseventeen' ) . "</a>";
        }
        return $actions;
    }

    /**
     * Add column for table
     *
     * @param $columns
     * @return array
    */
    function rooms_add_columns($columns) {
        return array_merge($columns, array (
            'price' => __('Price', 'twentyseventeen'),
            'floor'   => __('Floor', 'twentyseventeen'),
            'rented'   => __('Rented', 'twentyseventeen'),
        ) );
    }

    /**
     * Add columns to exhibition post list
     *
     * @param $column
     * @param $post_id
     */
    public function rooms_custom_data_column($column, $post_id) {
        switch ($column){
            case 'price':
                $price = get_field('rooms_price', $post_id);
                $price = number_format($price, 0, '.', '.');
                echo $price." VND";
                break;
            case 'floor':
                $room_floor = get_field('rooms_floor', $post_id);
                echo @$room_floor['label'];
                break;
            case 'rented':
                $status = $price = get_field('rooms_rented', $post_id);
                echo $status == true ? "Yes" : "No";
                break;
        }
    }


    /**
     * Set custom column is sortable
     *
     * @param $columns
     * @return mixed
     */
    public function rooms_set_custom_column_sortable($columns) {
        $columns['price'] = 'rooms_price';//meta field
        $columns['floor'] = 'rooms_floor';//meta field
        $columns['rented'] = 'rooms_rented';//meta field
        return $columns;
    }


    /**
     * Custom order by meta field
     *
     * @param $query
     */
    public function rooms_custom_orderby($query) {
        if ( ! is_admin() )
            return;

        $orderby = $query->get( 'orderby');
        if (!$orderby) return;
        switch ($orderby){
            case 'price':
                $query->set('meta_key', 'rooms_price');
                $query->set('orderby', 'meta_value_num');
                break;
            case 'floor':
                $query->set('meta_key', 'rooms_floor');
                $query->set('orderby', 'meta_value_num');
                break;
            case 'rented':
                $query->set('meta_key', 'rooms_rented');
                $query->set('orderby', 'meta_value_num');
                break;
        }
    }
}

new roomsFunctions();