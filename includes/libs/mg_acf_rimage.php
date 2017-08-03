<?php
/**
 * ACF Responsive Image function
 * Set your image field to return a WordPress array and call this function
 * to generate a responsive <img> tag with srcset attributes
 * You can also override the 'alt', 'class', 'size' and 'style' attributes.
 *
 *
 * Example of use:
 *
 *   $image = get_field('eng_imagen');
 *   if( $image ) {
 *       $args = array(
 *           'image' => $image,
 *           'class' => 'classname',
 *           'style'	=> "color:red;"
 *       );
 *       echo mg_acf_rimage($args);
 *   }
 *
 * @author  Mauricio Gelves <mg@maugelves.com>
 * @param   array $args {
 *      @type array        image    (mandatory)
 *      Optionals. Array or string of Query parameters.
 *      @type string       alt
 *      @type string       class
 *      @type string       size
 *      @type string       style
 * }
 * @return  string
 */
function mg_acf_rimage( $args ) {

    /**
     * Define the array of defaults
     */
    $defaults = array(
        'size'  => 'full'
    );

    // Parse the parameters
    $args = wp_parse_args($args, $defaults);

    if ( !empty($args['image']) || !is_array($args['image'])) {

        if ( empty($args['alt']) ) {
            $args['alt'] = $args['image']['alt'];
        }

        $url = $args['image']['url'];

        if ($args['size']) {
            if (isset($image['sizes'][$args['size']])) {
                $url = $image['sizes'][$args['size']];
            }
        }

        if (function_exists('wp_get_attachment_image_srcset')) {
            $img = '<img src="'. $url . '" srcset="' . wp_get_attachment_image_srcset( $args['image']['id'], $args['size'] ) . '" alt="' . $args['alt'] . '"';
        } else {
            $img = '<img src="'. $url . '" alt="' . $args['alt'] . '"';
        }
        
        if( !empty( $args['style'] ) ) {
            $img .= ' style="' . $args['style'] . '"';
        }

        if( !empty( $args['class'] ) ) {
            $img .= ' class="' . $args['class'] . '"';
        }
        $img .= ' />';

        return $img;
    }
}