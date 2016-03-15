<?php
namespace Lsv\Timeharvest\User;

use Lsv\Timeharvest\AbstractTimeharvest;
use Lsv\Timeharvest\DocumentInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GetUsers extends AbstractTimeharvest
{

    /**
     * Generate the response
     * @return DocumentInterface
     */
    public function getResponse()
    {
        // TODO: Implement getResponse() method.
    }

    /**
     * Configure options
     * @param OptionsResolver $resolver
     * @return OptionsResolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        // TODO: Implement configureOptions() method.
    }

    /**
     * Get url to the api
     * @param array $options
     * @return string
     */
    protected function getUrl(array $options)
    {
        // TODO: Implement getUrl() method.
    }

    /**
     * Get the document class to parse
     * @return DocumentInterface
     */
    protected function getDocumentClass()
    {
        // TODO: Implement getDocumentClass() method.
    }
}
