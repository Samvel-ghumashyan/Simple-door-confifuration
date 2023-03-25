<?php

use \dconf\Router;

// Router::add('^adminnn/?$', ['controller' => 'Main', 'action' => 'index', 'admin_prefix' => 'adminnn']);
// Router::add('^adminnn/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['admin_prefix' => 'adminnn']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);

Router::add('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)/?$');
