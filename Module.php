<?php
namespace BlogModule;

use PPI\Module\AbstractModule;

class Module extends AbstractModule
{
    protected $name = 'BlogModule';

    /**
     * Get the routes for this module
     *
     * @return \Symfony\Component\Routing\RouteCollection
     */
    public function getRoutes()
    {
        return $this->loadYamlRoutes(__DIR__ . '/resources/config/routes.yml');
    }
    
    /**
     * Get the configuration for this module
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->loadYamlConfig(__DIR__ . '/resources/config/config.yml');
    }
    
    public function getServiceConfig()
    {
        return array('factories' => array(
            
            'blog.cache' => function($sm) {
                return new \Doctrine\Common\Cache\ApcCache();
            }
            
        ));
    }

}
