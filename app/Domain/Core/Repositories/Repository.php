<?php


namespace App\Domain\Core\Repositories;

/**
 * Class Repository
 * @package IPangan\Domain\Core\Repositories
 */
class Repository
{
    protected $model;

    public function __construct()
    {

    }

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->model, $method], $args);
    }
}
