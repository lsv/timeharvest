<?php
namespace Lsv\Timeharvest\Exceptions;

class RequireAdminException extends Exception
{

    protected $message = 'This method requires admin permissions';
}
