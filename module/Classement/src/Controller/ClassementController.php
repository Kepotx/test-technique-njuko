<?php

namespace Classement\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ClassementController extends AbstractActionController
{

    /** @var EntityManager $entityManager */
    private $entityManager;


    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;

    }

    public function indexAction()
    {

        /** TODO : Implementer les classements */


        $sex = isset($_GET["sex"]) ? $_GET["sex"] : "all";
        $event = (int) (isset($_GET["event"]) ? $_GET["event"] : 1);
        if ($sex === "all") {
            $participants = $this->entityManager->getRepository('Application\Entity\Participant')->findBy(
                ['event' => $event],
                ['measured_time' => 'ASC']
            );

        } else {
            $participants = $this->entityManager->getRepository('Application\Entity\Participant')->findBy(
                ['sex' => $sex,
                    'event' => $event],
                ['measured_time' => 'ASC']
            );

        }
        $events = $this->entityManager->getRepository('Application\Entity\Event')->findAll();

        return new ViewModel([
                "events" => $events,
                "participants" => $participants,
                "event" => $event,
                "sex" => $sex,
            ]);
    }



}
