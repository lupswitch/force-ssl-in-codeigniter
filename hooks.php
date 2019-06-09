/* Then create a new file named hooks.php inside the config folder (i.e. application/config/hooks.php) and add the following code in it: */
$hook['post_controller_constructor'][] = array(
    'function' => 'ssl_redirection',
    'filename' => 'ssl_redirection.php',
    'filepath' => 'hooks'
);
