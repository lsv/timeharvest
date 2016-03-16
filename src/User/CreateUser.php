<?php
namespace Lsv\Timeharvest\User;

use JMS\Serializer\SerializerBuilder;
use Lsv\Timeharvest\AbstractTimeharvest;
use Lsv\Timeharvest\DocumentInterface;
use Lsv\Timeharvest\Exceptions\Exception;
use Lsv\Timeharvest\User\Document\CreateUser\CreateUser as CreateUserDocument;
use Lsv\Timeharvest\User\Document\CreateUser\CreateUserSetter;
use Lsv\Timeharvest\User\Exceptions\UserCreatedException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateUser extends AbstractTimeharvest
{

    /**
     * Configure options
     * @param OptionsResolver $resolver
     * @return OptionsResolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('_method', 'POST');

        $resolver->setRequired(['email', 'firstname', 'lastname']);
        $resolver->setAllowedTypes('email', 'string');
        $resolver->setAllowedTypes('firstname', 'string');
        $resolver->setAllowedTypes('lastname', 'string');

        $resolver->setDefined([
            'admin', 'contractor', 'telephone',
            'active', 'futureprojects', 'timezone',
            'hourlyrate', 'department', 'costrate'
        ]);
        $resolver->setAllowedValues('admin', [true, false]);
        $resolver->setDefault('admin', false);

        $resolver->setAllowedValues('contractor', [true, false]);
        $resolver->setDefault('contractor', false);

        $resolver->setAllowedTypes('telephone', 'string');
        $resolver->setDefault('telephone', '');

        $resolver->setAllowedValues('active', [true, false]);
        $resolver->setDefault('active', true);

        $resolver->setAllowedValues('futureprojects', [true, false]);
        $resolver->setDefault('futureprojects', true);

        $resolver->setAllowedTypes('timezone', ['null', 'string']);
        $resolver->setDefault('timezone', null);

        $resolver->setAllowedTypes('hourlyrate', ['float', 'int']);
        $resolver->setDefault('hourlyrate', 0);

        $resolver->setAllowedTypes('department', 'string');
        $resolver->setDefault('department', '');

        $resolver->setAllowedTypes('costrate', ['float', 'int', 'null']);
        $resolver->setDefault('costrate', null);
    }

    /**
     * Generate the response
     * @return string
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
        return '/people';
    }

    protected function getRequestBody(array $options)
    {
        $serializer = SerializerBuilder::create()->build();
        return $serializer->serialize($this->createUserDetail($options), 'json');
    }

    /**
     * @param ResponseInterface $response
     * @param mixed $json
     * @throws Exception
     * @throws UserCreatedException
     */
    protected function beforeParseData(ResponseInterface $response, &$json)
    {
        if ($response->getStatusCode() === 201) {
            throw new UserCreatedException($this->createUserDetail($this->options)->getUser());
        }

        throw new Exception($this->request, $response, 'User not created');
    }

    /**
     * Get the document class to parse
     * @return DocumentInterface
     * @codeCoverageIgnore
     */
    protected function getDocumentClass()
    {
    }

    /**
     * @param array $options
     * @return CreateUserDocument
     */
    private function createUserDetail(array $options)
    {
        $details = new CreateUserDocument();
        $details
            ->setEmail($options['email'])
            ->setFirstname($options['firstname'])
            ->setLastname($options['lastname'])
            ->setAdmin($options['admin'])
            ->setContractor($options['contractor'])
            ->setTelephone($options['telephone'])
            ->setActive($options['active'])
            ->setFutureprojects($options['futureprojects'])
            ->setTimezone($options['timezone'])
            ->setHourlyrate($options['hourlyrate'])
            ->setDepartment($options['department'])
            ->setCostrate($options['costrate'])
        ;
        return (new CreateUserSetter())->setUser($details);
    }
}
