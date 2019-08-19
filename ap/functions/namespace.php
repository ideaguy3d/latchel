<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/18/2019
 * Time: 11:40 PM
 */

namespace Alpha;
function Hello() {
    echo __NAMESPACE__;
}

namespace Beta;
function Hello() {
    echo __NAMESPACE__;
}

namespace Coda;
\Beta\Hello();
