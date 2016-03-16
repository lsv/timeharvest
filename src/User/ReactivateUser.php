<?php
namespace Lsv\Timeharvest\User;

use Lsv\Timeharvest\AbstractTimeharvest;
use Lsv\Timeharvest\DocumentInterface;
use Lsv\Timeharvest\Exceptions\Exception;
use Lsv\Timeharvest\User\Document\UserDetails;
use Lsv\Timeharvest\User\Exceptions\UserNotReOrDeactivatedException;
use Lsv\Timeharvest\User\Exceptions\UserReOrDeactivatedException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReactivateUser extends AbstractTimeharvest
{

    /**
     * Configure options
     * @param OptionsResolver $resolver
     * @return OptionsResolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('_method', 'POST');
        $resolver->setRequired('user');
        $resolver->setAllowedTypes('user', ['int', UserDetails::class]);
        $resolver->setNormalizer('user', function (Options $options, $value) {
            if ($value instanceof UserDetails) {
                return $value->getId();
            }
            return $value;
        });
    }

    /**
     * Generate the response
     * @return DocumentInterface
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
        return sprintf('people/%d', $options['user']);
    }

    /**
     * @param ResponseInterface $response
     * @param mixed $json
     * @throws UserNotReOrDeactivatedException
     * @throws UserReOrDeactivatedException
     */
    protected function beforeParseData(ResponseInterface $response, &$json)
    {
        if ($response->getStatusCode() === 200) {
            throw new UserReOrDeactivatedException('User activated or deactivated');
        }

        throw new UserNotReOrDeactivatedException('User could not be activated or deactivated');
    }

    /**
     * Get the document class to parse
     * @return DocumentInterface
     * @codeCoverageIgnore
     */
    protected function getDocumentClass()
    {
    }
}
