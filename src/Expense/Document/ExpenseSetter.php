<?php
namespace Lsv\Timeharvest\Expense\Document;

/**
 * Class ExpenseSetter
 * @package Lsv\Timeharvest\Expense\Document
 */
class ExpenseSetter
{

    /**
     * @var Expense
     */
    private $expense;

    /**
     * @return Expense
     */
    public function getExpense()
    {
        return $this->expense;
    }

    /**
     * @param Expense $expense
     * @return ExpenseSetter
     */
    public function setExpense($expense)
    {
        $this->expense = $expense;
        return $this;
    }
}
