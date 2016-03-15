<?php
namespace Lsv\Timeharvest\Exceptions;

class StopExecutionException extends \Exception
{
    /**
     * @var mixed
     */
    private $data;

    /**
     * StopExecutionException constructor.
     * @param mixed $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}
