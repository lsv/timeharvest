<?php
namespace Lsv\Timeharvest\TimeReporting;

use Lsv\Timeharvest\AbstractTimeharvest;
use Lsv\Timeharvest\DocumentInterface;
use Lsv\Timeharvest\Project\Document\ProjectDetails;
use Lsv\Timeharvest\TimeReporting\Document\TimeReport;
use Lsv\Timeharvest\TimeReporting\Document\TimeReportDetails;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GetTimeReporting extends AbstractTimeharvest
{

    /**
     * Configure options
     * @param OptionsResolver $resolver
     * @return OptionsResolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired(['project', 'from', 'to']);

        $resolver->setAllowedTypes('project', ['int', ProjectDetails::class]);
        $resolver->setNormalizer('project', function (Options $options, $value) {
            if ($value instanceof ProjectDetails) {
                return $value->getId();
            }
            return $value;
        });

        $resolver->setAllowedTypes('from', [\DateTime::class]);
        $resolver->setNormalizer('from', function (Options $options, \DateTime $value) {
            return $value->format('Ymd');
        });

        $resolver->setAllowedTypes('to', [\DateTime::class]);
        $resolver->setNormalizer('to', function (Options $options, \DateTime $value) {
            return $value->format('Ymd');
        });

        return $resolver;
    }

    /**
     * Generate the response
     * @return TimeReportDetails[]
     */
    public function getResponse()
    {
        return $this->doResponse();
    }

    /**
     * Get url to the api
     * @param array $options
     * @return string
     */
    protected function getUrl(array $options)
    {
        return sprintf(
            'projects/%d/entries?from=%s&to=%s',
            $options['project'],
            $options['from'],
            $options['to']
        );
    }

    /**
     * Get the document class to parse
     * @return DocumentInterface
     */
    protected function getDocumentClass()
    {
        return new TimeReport();
    }

    /**
     * {@inheritdoc}
     */
    protected function afterParseData(&$data)
    {
        $output = [];
        /** @var TimeReport $item */
        foreach ($data as $item) {
            $output[] = $item->getDayEntry();
        }
        $data = $output;
    }
}
