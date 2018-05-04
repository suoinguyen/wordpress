<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 04-May-18
 * Time: 9:55 PM
 */

class contractsFunctions{
    public function __construct(){
        // filter for every field
        add_filter('acf/fields/post_object/query', array($this, 'contracts_filter_post_object_query'), 10, 3);
    }

    /**
     * Custom filter post object field
     *
     * @param $args
     * @param $field
     * @param $post_id
     * @return mixed
     */
    public function contracts_filter_post_object_query( $args, $field, $post_id ) {
        if ($field['name'] == 'contracts_room'){
            $args['meta_query']  = array(
                array(
                    'key' => 'rooms_rented',
                    'value' => true,//1 is true
                    'compare' => '='
                )
            );
        }

        //Must return $args
        return $args;
    }
    // filter for a specific field based on it's name
    //add_filter('acf/fields/post_object/query/name=my_post_object', 'my_post_object_query', 10, 3);


    // filter for a specific field based on it's key
    //add_filter('acf/fields/post_object/query/key=field_508a263b40457', 'my_post_object_query', 10, 3);
}

new contractsFunctions();