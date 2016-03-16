<?php
namespace Lsv\Timeharvest\Expense\Document;

/**
 * Class Expense
 * @package Lsv\Timeharvest\Expense\Document
 */
class Expense
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var float
     */
    protected $totalCost;

    /**
     * @var int
     */
    protected $units;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @var int
     */
    protected $projectId;

    /**
     * @var int
     */
    protected $expenseCategoryId;

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var \DateTime
     */
    protected $spentAt;

    /**
     * @var boolean
     */
    protected $isClosed;

    /**
     * @var string
     */
    protected $notes;

    /**
     * @var int
     */
    protected $invoiceId;

    /**
     * @var boolean
     */
    protected $billable;

    /**
     * @var int
     */
    protected $companyId;

    /**
     * @var boolean
     */
    protected $hasReceipt;

    /**
     * @var string
     */
    protected $receiptUrl;

    /**
     * @var boolean
     */
    protected $isLocked;

    /**
     * @var string
     */
    protected $lockedReason;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Expense
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalCost()
    {
        return $this->totalCost;
    }

    /**
     * @param float $totalCost
     * @return Expense
     */
    public function setTotalCost($totalCost)
    {
        $this->totalCost = $totalCost;
        return $this;
    }

    /**
     * @return int
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @param int $units
     * @return Expense
     */
    public function setUnits($units)
    {
        $this->units = $units;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Expense
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Expense
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     * @return Expense
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpenseCategoryId()
    {
        return $this->expenseCategoryId;
    }

    /**
     * @param int $expenseCategoryId
     * @return Expense
     */
    public function setExpenseCategoryId($expenseCategoryId)
    {
        $this->expenseCategoryId = $expenseCategoryId;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return Expense
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSpentAt()
    {
        return $this->spentAt;
    }

    /**
     * @param \DateTime $spentAt
     * @return Expense
     */
    public function setSpentAt($spentAt)
    {
        $this->spentAt = $spentAt;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsClosed()
    {
        return $this->isClosed;
    }

    /**
     * @param boolean $isClosed
     * @return Expense
     */
    public function setIsClosed($isClosed)
    {
        $this->isClosed = $isClosed;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return Expense
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return int
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @param int $invoiceId
     * @return Expense
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isBillable()
    {
        return $this->billable;
    }

    /**
     * @param boolean $billable
     * @return Expense
     */
    public function setBillable($billable)
    {
        $this->billable = $billable;
        return $this;
    }

    /**
     * @return int
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param int $companyId
     * @return Expense
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isHasReceipt()
    {
        return $this->hasReceipt;
    }

    /**
     * @param boolean $hasReceipt
     * @return Expense
     */
    public function setHasReceipt($hasReceipt)
    {
        $this->hasReceipt = $hasReceipt;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiptUrl()
    {
        return $this->receiptUrl;
    }

    /**
     * @param string $receiptUrl
     * @return Expense
     */
    public function setReceiptUrl($receiptUrl)
    {
        $this->receiptUrl = $receiptUrl;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsLocked()
    {
        return $this->isLocked;
    }

    /**
     * @param boolean $isLocked
     * @return Expense
     */
    public function setIsLocked($isLocked)
    {
        $this->isLocked = $isLocked;
        return $this;
    }

    /**
     * @return string
     */
    public function getLockedReason()
    {
        return $this->lockedReason;
    }

    /**
     * @param string $lockedReason
     * @return Expense
     */
    public function setLockedReason($lockedReason)
    {
        $this->lockedReason = $lockedReason;
        return $this;
    }
}
