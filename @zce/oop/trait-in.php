<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/10/2020
 * Time: 5:36 AM
 */


trait NueroOne
{
    protected $dep = "99.99";
    
    public function get_dep() {
        return $this->dep;
    }
}

class NueroTwo
{
    use NueroOne;
}

class NueroThree extends NueroTwo
{
    protected function proNet() {
        return [2.5, 9, 77, 1001];
    }
}

class NueroFour extends NueroThree
{
    public function get_dep(): int {
        return $this->dep;
    }
}

$n3 = new NueroThree();
//var_dump($n3->proNet());
echo (new NueroThree())->get_dep() . "\n";
echo (new NueroFour())->get_dep();