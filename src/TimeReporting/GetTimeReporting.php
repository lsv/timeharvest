<?php
namespace Lsv\Timeharvest\TimeReporting;

use Lsv\Timeharvest\AbstractTimeharvest;
use Lsv\Timeharvest\DocumentInterface;
use Lsv\Timeharvest\Project\Document\Project;
use Lsv\Timeharvest\TimeReporting\Document\TimeReportSetter;
use Lsv\Timeharvest\TimeReporting\Document\TimeReport;
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

        $resolver->setAllowedTypes('project', ['int', Project::class]);
        $resolver->setNormalizer('project', function (Options $options, $value) {
            if ($value instanceof Project) {
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
    }

    /**
     * Generate the response
     * @return TimeReport[]
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
        return new TimeReportSetter();
    }

    /**
     * {@inheritdoc}
     */
    protected function afterParseData(&$data)
    {
        $output = [];
        /** @var TimeReportSetter $item */
        foreach ($data as $item) {
            $output[] = $item->getDayEntry();
        }
        $data = $output;
    }
}
