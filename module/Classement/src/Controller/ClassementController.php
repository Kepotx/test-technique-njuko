<?php

namespace Classement\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ClassementController extends AbstractActionController
{

    /** @var EntityManager $entityManager */
    private $entityManager;

    private $participants;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;

    }

    public function indexAction()
    {

        /** TODO : Implementer les classements */

        $participants = $this->entityManager->getRepository('Application\Entity\Participant')->findBy(array(), array('measured_time' => 'ASC'));

        return new ViewModel(array(
                "participants" => $participants
            )
        );
    }
}
