<?php
namespace Lsv\Timeharvest\User;

use Lsv\Timeharvest\AbstractTimeharvest;
use Lsv\Timeharvest\DocumentInterface;
use Lsv\Timeharvest\User\Document\User;
use Lsv\Timeharvest\User\Document\UserDetails;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GetUsers extends AbstractTimeharvest
{

    /**
     * Configure options
     * @param OptionsResolver $resolver
     * @return OptionsResolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('updated', null);
        $resolver->setAllowedTypes('updated', ['null', \DateTime::class]);
        $resolver->setNormalizer('updated', function (Options $options, $value) {
            if ($value instanceof \DateTime) {
                return $value->format('Y-m-d H:i');
            }
            return null;
        });
    }

    /**
     * Generate the response
     * @return UserDetails[]
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
            'people%s',
            $options['updated'] ? '?updated_since=' . urlencode($options['updated']) : ''
        );
    }

    /**
     * Get the document class to parse
     * @return DocumentInterface
     */
    protected function getDocumentClass()
    {
        return new User();
    }

    /**
     * {@inheritdoc}
     */
    protected function afterParseData(&$data)
    {
        $output = [];
        /** @var User $item */
        foreach ($data as $item) {
            $output[] = $item->getUser();
        }
        $data = $output;
    }
}
