<?php
namespace Lsv\Timeharvest\Expense;

use Symfony\Component\OptionsResolver\OptionsResolver;

class GetExpensesByUser extends GetExpensesByProject
{

    /**
     * Configure options
     * @param OptionsResolver $resolver
     * @return OptionsResolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver = parent::configureOptions($resolver);
        $resolver->remove('project');

        $resolver->setRequired('user');
        $resolver->setAllowedTypes('user', ['int']);
        return $resolver;
    }

    /**
     * Get url to the api
     * @param array $options
     * @return string
     */
    protected function getUrl(array $options)
    {
        return sprintf(
            'people/%d/expenses?from=%s&to=%s&is_closed=%s',
            $options['user'],
            $options['from'],
            $options['to'],
            $options['is_closed']
        );
    }
}
