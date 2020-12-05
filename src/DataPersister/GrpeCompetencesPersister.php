<?php


namespace App\DataPersister;

use App\Entity\Profil;
use App\Entity\Grpecompetences;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;

/**
 *
 */
class GrepCompetencesPersister implements ContextAwareDataPersisterInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $_entityManager;
    

    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->_entityManager = $entityManager;
        
    }


    /**
     * {@inheritdoc}
     */
    public function supports($data, array $context = []): bool
    {
        return $data instanceof Grpecompetences;
    }

    /**
     * @param Grpecompetences $data
     */
    public function persist($data, array $context = [])
    {
        
    }

    public function remove($data, array $context = [])
    {

        
        foreach ($data->getCompetences() as $value) {
            
            $data->removeCompetences($value);
            $this->_entityManager->persist($data);
        }
        
        
        $this->_entityManager->flush();
    }
}