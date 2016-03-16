<?php
namespace Lsv\Timeharvest\TimeReporting\Document;

/**
 * Class TimeReportSetter
 * @package Lsv\Timeharvest\TimeReporting\Document
 */
class TimeReportSetter
{

    /**
     * @var TimeReport
     */
    protected $dayEntry;

    /**
     * @return TimeReport
     */
    public function getDayEntry()
    {
        return $this->dayEntry;
    }

    /**
     * @param TimeReport $dayEntry
     * @return TimeReportSetter
     */
    public function setDayEntry($dayEntry)
    {
        $this->dayEntry = $dayEntry;
        return $this;
    }
}
