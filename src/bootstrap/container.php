<?php
return [
    'settings' => [
        'displayErrorDetails' => getenv('APP_ENV') === "production" ? false : true,
        'determineRouteBeforeAppMiddleware' => true,
        'viewTemplatesDirectory' => INC_ROOT . '/../resources/views',
    ],
    'twig' => function($c) {
        $twig = new \Twig_Environment(new \Twig_Loader_Filesystem($c['settings']['viewTemplatesDirectory']));
        $twig->addExtension(new \App\Twig\TwigExtension($c));
        return $twig;
    },
    'view' => function($c) {
        $view = new \Slim\Views\Twig($c['settings']['viewTemplatesDirectory'], [
            'debug' => getenv('APP_ENV', 'development') === "production" ? false : true
        ]);
        // $view->getEnvironment()->addGlobal('auth', [
        //     'check' => $c->auth->check(),
        //     'user' => $c->auth->user(),
        // ]);
        $view->addExtension(new \Slim\Views\TwigExtension($c['router'], $c['request']->getUri()));
        $view->addExtension(new \Twig_Extension_Debug);
        $view->addExtension(new \App\Twig\TwigExtension($c));
        // $view->getEnvironment()->addGlobal('flash', $c['flash']);
        return $view;
    },
    'db' => function($c) {
          $capsule = new \Illuminate\Database\Capsule\Manager;
          $capsule->addConnection($c['config']->get('database'), 'default');
          return $capsule;
      },
    ];
