<?php

namespace Inc;

/**
 * Description of Init
 *
 * @author Lubos Hilgert <luboshilgert@gmail.com>
 */
final class Init {
    /**
     * Seznam vsech trid
     * @return type
     */
    public static function get_services(){   
        return [
        Pages\Admin::class,
        Pages\Client::class,
        Base\Enqueue::class,
        Base\SettingsLink::class
        ];
    }
/**
 * Loop skrze classy a inicializace
 */
    public static function register_services(){
        foreach(self::get_services() as $class){
            $service = self::instantiate($class);
            if(method_exists($service, 'register')){
                $service->register();
            }
        }
    } 
    
    private static function instantiate($class){
        $service = new $class;
        return $service;
    }
}
