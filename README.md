# Force SSL in Codeigniter

Open config file from location application/config/config.php and enable or set hooks to true like this:

$config['enable_hooks'] = TRUE;
-----------------------------------------------

Then create a new file named hooks.php inside the config folder (i.e. application/config/hooks.php) and add the following code in it:

$hook['post_controller_constructor'][] = array(
    'function' => 'ssl_redirection',
    'filename' => 'ssl_redirection.php',
    'filepath' => 'hooks'
);
------------------------------------------------

Now create a new directory named hooks inside the application folder (i.e. application/hooks) and then create a new file named ssl_redirection.php inside the hooks folder (i.e. application/hooks/ssl_redirection.php).

Add the following code in the ssl_redirection.php file:

<code>
function ssl_redirection(){

    $CI =& get_instance();

    $class = $CI->router->fetch_class();

    $exclude =  array('client');  // add more controller name to exclude ssl cetrificate.

    if(!in_array($class,$exclude)) {

        // redirecting to ssl cetrificate.

        $CI->config->config['base_url'] = str_replace('http://', 'https://', $CI->config->config['base_url']);

        if ($_SERVER['SERVER_PORT'] != 443) redirect($CI->uri->uri_string());

    } else {

        // redirecting with no ssl cetrificate.

        $CI->config->config['base_url'] = str_replace('https://', 'http://', $CI->config->config['base_url']);

        if ($_SERVER['SERVER_PORT'] == 443) redirect($CI->uri->uri_string());

    }
}

</code>
;
------------------------------------------------
