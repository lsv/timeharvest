<?php
namespace Lsv\Timeharvest\Expense;

use Lsv\Timeharvest\AbstractTimeharvest;
use Lsv\Timeharvest\DocumentInterface;
use Lsv\Timeharvest\Expense\Document\ExpenseSetter;
use Lsv\Timeharvest\Project\Document\Project;
use Lsv\Timeharvest\TimeReporting\Document\TimeReport;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GetExpensesByProject extends AbstractTimeharvest
{

    /**
     * Configure options
     * @param OptionsResolver $resolver
     * @return OptionsResolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired(['from', 'to', 'project']);

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

        $resolver->setDefault('is_closed', false);
        $resolver->setAllowedValues('is_closed', [true, false]);
        $resolver->setNormalizer('is_closed', function (Options $options, $value) {
            return $value ? 'yes' : 'no';
        });

        return $resolver;
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
            'projects/%d/expenses?from=%s&to=%s&is_closed=%s',
            $options['project'],
            $options['from'],
            $options['to'],
            $options['is_closed']
        );
    }

    /**
     * Get the document class to parse
     * @return DocumentInterface
     */
    protected function getDocumentClass()
    {
        return new ExpenseSetter();
    }

    /**
     * {@inheritdoc}
     */
    protected function afterParseData(&$data)
    {
        $output = [];
        /** @var ExpenseSetter $item */
        foreach ($data as $item) {
            $output[] = $item->getExpense();
        }

        $data = $output;
    }
}
