<?php
namespace Lsv\Timeharvest\Expense\Document;

class Expense
{

    /**
     * @var ExpenseDetails
     */
    private $expense;

    /**
     * @return ExpenseDetails
     */
    public function getExpense()
    {
        return $this->expense;
    }

    /**
     * @param ExpenseDetails $expense
     * @return Expense
     */
    public function setExpense($expense)
    {
        $this->expense = $expense;
        return $this;
    }
}
