<?php
namespace Lsv\Timeharvest\User;

use Lsv\Timeharvest\AbstractTimeharvest;
use Lsv\Timeharvest\DocumentInterface;
use Lsv\Timeharvest\User\Document\UserDetails;
use Lsv\Timeharvest\User\Exceptions\UserDeletedException;
use Lsv\Timeharvest\User\Exceptions\UserNotDeletedException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeleteUser extends AbstractTimeharvest
{

    /**
     * Generate the response
     * @return DocumentInterface
     */
    public function getResponse()
    {
        return $this->doResponse();
    }

    /**
     * Configure options
     * @param OptionsResolver $resolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('_method', 'DELETE');
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
     * Get url to the api
     * @param array $options
     * @return string
     */
    protected function getUrl(array $options)
    {
        return '/people/' . $options['user'];
    }

    /**
     * @param ResponseInterface $response
     * @param mixed $json
     * @throws UserDeletedException
     * @throws UserNotDeletedException
     */
    protected function beforeParseData(ResponseInterface $response, &$json)
    {
        if ($response->getStatusCode() === 200) {
            throw new UserDeletedException($this->options['user']);
        }

        throw new UserNotDeletedException('User not deleted, maybe archive the user instead');
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
