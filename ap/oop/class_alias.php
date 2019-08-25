<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/24/2019
 * Time: 2:54 PM
 */

// class_alias() lets us conditionally load namespaces

if(extension_loaded('memcached')){
    class_alias('Memcached', 'Cache');
}
else {
    class_alias('InternalCacheProvider', 'Cache');
}

class NinjaDatabase{
    public function __construct(Cache $cache) {
    }
}





//