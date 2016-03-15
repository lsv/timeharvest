<?php
namespace Lsv\Timeharvest\TimeReporting\Document;

class TimeReport
{

    /**
     * @var TimeReportDetails
     */
    protected $dayEntry;

    /**
     * @return TimeReportDetails
     */
    public function getDayEntry()
    {
        return $this->dayEntry;
    }

    /**
     * @param TimeReportDetails $dayEntry
     * @return TimeReport
     */
    public function setDayEntry($dayEntry)
    {
        $this->dayEntry = $dayEntry;
        return $this;
    }
}
