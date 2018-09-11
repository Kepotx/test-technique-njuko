<?php

namespace Participant\Form;

use Zend\Form\Form;
use DoctrineModule\Form\Element\ObjectSelect;
use Doctrine\ORM\EntityManager;

class ParticipantForm extends Form
{

    /** @var EntityManager entityManager */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct('user');

        $this->setAttribute('class', 'form-horizontal');

        $this->add([
            'name' => 'id',
            'type' => 'Hidden',
        ]);


        $this->add([
            'name'    => 'firstname',
            'type'    => 'Text',
            'options' => [
                'label' => 'Prénom',
            ],
            'attributes' => [
                'class' => 'form-control'
            ],
        ]);

        $this->add([
            'name'    => 'lastname',
            'type'    => 'Text',
            'options' => [
                'label' => 'Nom',
            ],
            'attributes' => [
                'class' => 'form-control'
            ],
        ]);

        $this->add([
            'name'    => 'sex',
            'type'    => 'Radio',
            'options'    => [
                'label'            => 'Sexe',
                'label_attributes' => ['class' => 'checkbox-inline'],
                'value_options'    => [
                    [
                        'value'      => 'male',
                        'label'      => 'Homme',
                    ],
                    [
                        'value'      => 'female',
                        'label'      => 'Femme',
                    ]
                ]
            ],
        ]);

        $this->add([
            'name'    => 'dossard_number',
            'type'    => 'Number',
            'options' => [
                'label' => 'Numéro de dossard',
            ],
            'attributes' => [
                'class' => 'form-control'
            ],
        ]);


        $this->add([
            'name' => 'event',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => [
                'object_manager' => $this->entityManager,
                'target_class'   => 'Application\Entity\Event',
                'label' => 'Événement',
                'property' => 'name',
                'is_method' => true,
            ],
            'attributes' => [
                'class' => 'form-control'
            ],
        ]);

        $this->add([
            'name'       => 'submit',
            'type'       => 'submit',
            'attributes' => [
                'class' => 'btn btn-primary',
                'value' => 'Sauvegarder'
            ],
        ]);
    }
}