<?php

class NamiResourceDirectorySite
{
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'theme_supports']);
        add_action('admin_menu', [$this, 'edit_admin_menu']);
        add_action('init', [$this, 'register_post_types']);
        add_action('init', [$this, 'register_taxonomies']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_filter('pre_get_posts', [$this, 'searchfilter']);
        $this->clean_header();
    }

    public function searchfilter($query)
    {
        if ($query->is_search) {
            $query->set('post_type', ['resource']);
        }
        return $query;
    }

    public function clean_header()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'rest_output_link_wp_head');
    }

    public function enqueue_scripts()
    {
        // Add main CSS
        wp_enqueue_style('app', get_template_directory_uri() . '/css/app.css', [], filemtime(get_template_directory() . '/css/app.css'), 'all');

        // Add AlpineJS from CDN
        wp_enqueue_script('alpine', 'https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js', [], null, true);

        // Remove unnecessary scripts
        wp_dequeue_style('global-styles');
        wp_dequeue_style('classic-theme-styles');
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
    }

    public function edit_admin_menu()
    {
        remove_menu_page('edit.php');
        remove_menu_page('edit-comments.php');
    }

    public function theme_supports()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5');
        add_theme_support('menus');
    }

    public function register_post_types()
    {
        //
        // Resources
        //
        $labels = [
            'name'                => 'Resources',
            'singular_name'       => 'Resource',
            'menu_name'           => 'Resources',
            'all_items'           => 'All Resources',
            'view_item'           => 'View Resource',
            'add_new_item'        => 'Add New Resource',
            'edit_item'           => 'Edit Resource',
            'update_item'         => 'Update Resource',
            'search_items'        => 'Search Resources',
        ];

        $args = [
            'labels'              => $labels,
            'public'              => true,
            'show_in_menu'        => true,
            'show_in_rest'        => true,
            'menu_position'       => 5,
            'taxonomies'          => ['concerns', 'conditions', 'languages', 'demographics'],
            'has_archive'         => true,
        ];

        register_post_type('resource', $args);
    }

    public function register_taxonomies()
    {
        //
        // Concerns
        //
        $labels = [
            'name'              => 'Concerns',
            'singular_name'     => 'Concern',
            'search_items'      => 'Search Concerns',
            'all_items'         => 'All Concerns',
            'edit_item'         => 'Edit Concern',
            'update_item'       => 'Update Concern',
        ];

        $args = [
            'labels'            => $labels,
            'hierarchical'      => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'rewrite'           => ['slug' => 'concern'],
        ];

        register_taxonomy('concern', ['resource'], $args);

        //
        // Conditions
        //
        $labels = [
            'name'              => 'Conditions',
            'singular_name'     => 'Condition',
            'search_items'      => 'Search Conditions',
            'all_items'         => 'All Conditions',
            'edit_item'         => 'Edit Condition',
            'update_item'       => 'Update Condition',
        ];

        $args = [
            'labels'            => $labels,
            'hierarchical'      => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'rewrite'           => ['slug' => 'condition'],
        ];

        register_taxonomy('condition', ['resource'], $args);

        //
        // Languages
        //
        $labels = [
            'name'              => 'Languages',
            'singular_name'     => 'Language',
            'search_items'      => 'Search Languages',
            'all_items'         => 'All Languages',
            'edit_item'         => 'Edit Language',
            'update_item'       => 'Update Language',
        ];

        $args = [
            'labels'            => $labels,
            'hierarchical'      => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'rewrite'           => ['slug' => 'language'],
        ];

        register_taxonomy('language', ['resource'], $args);
              //
        // Demographic
        //
        $labels = [
            'name'              => 'Demographics',
            'singular_name'     => 'Demographic',
            'search_items'      => 'Search Demographics',
            'all_items'         => 'All Demographics',
            'edit_item'         => 'Edit Demographics',
            'update_item'       => 'Update Demographics',
        ];

        $args = [
            'labels'            => $labels,
            'hierarchical'      => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'rewrite'           => ['slug' => 'demographics'],
        ];

        register_taxonomy('demographics', ['resource'], $args);
    }
}

new NamiResourceDirectorySite();

add_filter('facetwp_facet_html', function ($output, $params) {

    // Check that this facet is a "checkboxes" type facet before proceeding.
    if ($params['facet']['type'] === 'checkboxes') {

        $values = $params['values'];
        $selected_values = $params['selected_values'];

        $items = [];

        foreach ($values as $value) {

            $template = <<< 'EOT'
                <div class="relative flex items-start">
                    <div class="flex h-5 items-center">
                        <input type="checkbox" class="facetwp-checkbox h-4 w-4 rounded border-gray-100 text-blue-600 focus:ring-blue-500 %2$s %5$s" id="%1$s" data-value="%1$s" %2$s %5$s>
                    </div>
                    <div class="ml-3">
                        <label for="%1$s" class="text-sm text-gray-700">%3$s (%4$s)</label>
                    </div>
                </div>
            EOT;

            $items[] = sprintf(
                $template,
                $value['facet_value'],
                in_array($value['facet_value'], $selected_values) ? 'checked' : '',
                $value['facet_display_value'],
                $value['counter'],
                $value['counter'] ? '' : 'disabled',
            );
        }
    }

    $output = sprintf('%s', implode($items));
    return $output;
}, 10, 2);


add_filter('facetwp_render_output', function ($output, $params) {

    $headings = [
        'language' => 'Language',
        'condition' => 'Condition',
        'concern' => 'Concern',
        'demographics' => 'Demographics'
    ];

    foreach ($headings as $name => $label) {
        if (isset($output['facets'][$name])) {
            if ($output['facets'][$name] !== '') {
                $output['facets'][$name] = <<< EOT
                <div class="space-y-2">
                    <div class="text-gray-700 font-semibold pb-1 border-b">{$label}</div>
                    <div class="facet">{$output['facets'][$name]}</div>
                </div>
                EOT;
            } else {
                $output['facets'][$name] = <<< EOT
                <div class="space-y-2">
                <div class="text-gray-700 font-semibold pb-1 border-b">{$label}</div>
                    <div class="facet text-gray-500">No filter values</div>
                </div>
                EOT;
            }
        }
    }

    // print_r($output);
    // exit;

    return $output;
}, 10, 2);

            if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_640f780d609a0',
    'title' => 'admin group',
    'fields' => array(
        array(
            'key' => 'field_640f76777485a',
            'label' => 'HelpLine Hub ID',
            'name' => 'helpline_hub_id',
            'aria-label' => '',
            'type' => 'number',
            'instructions' => 'DO NOT EDIT.',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'min' => '',
            'max' => '',
            'placeholder' => '',
            'step' => '',
            'prepend' => '',
            'append' => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'resource',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'side',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
));

acf_add_local_field_group(array(
    'key' => 'group_636fee8b87e08',
    'title' => 'Details',
    'fields' => array(
        array(
            'key' => 'field_636fee8b63c01',
            'label' => 'URL',
            'name' => 'url',
            'aria-label' => '',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
        ),
        array(
            'key' => 'field_636fef7308521',
            'label' => 'Phone',
            'name' => 'phone',
            'aria-label' => '',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
        ),
        array(
            'key' => 'field_636fef0cee055',
            'label' => 'Address',
            'name' => 'address',
            'aria-label' => '',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'maxlength' => '',
            'rows' => '',
            'placeholder' => '',
            'new_lines' => '',
        ),
        array(
            'key' => 'field_63ffc4ee4a029',
            'label' => 'NAMI Resource',
            'name' => 'is_nami',
            'aria-label' => '',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => 'Is this a NAMI Resource?',
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'resource',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
));

endif;      
