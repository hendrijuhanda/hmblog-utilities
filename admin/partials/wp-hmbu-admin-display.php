<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://juhanda.net
 * @since      1.0.0
 *
 * @package    Wp_Hmbu
 * @subpackage Wp_Hmbu/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <form method="post" action="options.php" novalidate="novalidate">

        <?php 

            $apikey = get_option('apikey');
            $disable_render = get_option('disable_render');
        
            settings_fields($this->plugin_name);
            do_settings_sections($this->plugin_name);
        
        ?>

        <table class="form-table">
            <tr>
                <th scope="row"><label for="apikey">API Key</label></th>
                <td><input name="apikey" type="text" id="apikey" aria-describedby="api-key" class="large-text" value="<?php echo ($apikey ?: ''); ?>">
                <p class="description" id="api-key">The key to authorize connection with Honest Mining main site blog front-end. The value must be exactly same with .env BLOG_API_KEY.</p></td>
            </tr>
            <tr>
                <th scope="row">Front-End Render</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text">
                            <span>Disable Front-End</span>
                        </legend>
                        <label for="disable_render">
                            <input name="disable_render" type="checkbox" id="disable_render" value="1" <?php echo ($disable_render ? 'checked' : ''); ?>> Disable render
                        </label>
                    </fieldset>
                    <p class="description" id="disable-render">If checked, this domain (<?php echo esc_html(get_home_url()); ?>) front-end won't be rendered.</p>
                </td>
            </tr>
        </table>

        <?php submit_button('Save Changes', 'primary','submit', TRUE); ?>

    </form>
</div>
