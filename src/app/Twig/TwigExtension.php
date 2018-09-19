<?php
namespace App\Twig;
class TwigExtension extends \Twig_Extension
{
    protected $container;
    public function __construct($container)
    {
        $this->container = $container;
    }
    public function getName()
    {
        return 'app';
    }
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('asset', [$this, 'asset']),
            new \Twig_SimpleFunction('getenv', [$this, 'getenv']),
            new \Twig_SimpleFunction('config', [$this, 'config']),
        ];
    }
    public function asset($name)
    {
        return getenv('APP_URL') . '/' . $name;
    }
    public function getEnv($key, $default = null)
    {
        return getenv($key, $default);
    }
    public function config($key)
    {
        return $this->container->config->get($key);
    }
}
