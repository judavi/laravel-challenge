<?php namespace Builders\Filed;

use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['field'] = $this->app->share(function($app){
            $filedBuilder = new FieldBuilder($app['form'], $app['view'], $app['session']);
            return $filedBuilder;
        });
    }
}