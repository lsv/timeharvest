<?php
namespace Lsv\Timeharvest\User;

use JMS\Serializer\SerializerBuilder;
use Lsv\Timeharvest\AbstractTimeharvest;
use Lsv\Timeharvest\DocumentInterface;
use Lsv\Timeharvest\Exceptions\Exception;
use Lsv\Timeharvest\User\Document\UpdateUser\UpdateUser as UpdateUserDocument;
use Lsv\Timeharvest\User\Document\UserDetails;
use Lsv\Timeharvest\User\Exceptions\UserUpdatedException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lsv\Timeharvest\User\Document\UpdateUser\UpdateUserSetter;

class UpdateUser extends AbstractTimeharvest
{

    /**
     * Configure options
     * @param OptionsResolver $resolver
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('_method', 'PUT');
        $resolver->setRequired('user');
        $resolver->setAllowedTypes('user', [UserDetails::class]);
    }

    /**
     * Generate the response
     * @return UpdateUser
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
        /** @var UserDetails $user */
        $user = $options['user'];
        return sprintf('people/%d', $user->getId());
    }

    protected function getRequestBody(array $options)
    {
        /** @var UserDetails $details */
        $details = $options['user'];
        $userdetail = new UpdateUserDocument();
        $userdetail->setEmail($details->getEmail());
        $userdetail->setAdmin($details->isIsAdmin());
        $userdetail->setFirstname($details->getFirstName());
        $userdetail->setLastname($details->getLastName());
        $userdetail->setTimezone($details->getTimezone());
        $userdetail->setContractor($details->isIsContractor());
        $userdetail->setTelephone($details->getTelephone());
        $userdetail->setActive($details->isIsActive());
        $userdetail->setFutureprojects($details->isHasAccessToAllFutureProjects());
        $userdetail->setHourlyrate($details->getDefaultHourlyRate());
        $userdetail->setDepartment($details->getDepartment());
        $userdetail->setCostrate($details->getCostRate());

        $serializer = SerializerBuilder::create()->build();
        return $serializer->serialize((new UpdateUserSetter())->setUser($userdetail), 'json');
    }

    /**
     * @param ResponseInterface $response
     * @param mixed $json
     * @throws Exception
     * @throws UserUpdatedException
     */
    protected function beforeParseData(ResponseInterface $response, &$json)
    {
        if ($response->getStatusCode() === 200) {
            throw new UserUpdatedException($this->options['user']);
        }

        throw new Exception($this->request, $response, 'User not updated');
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
