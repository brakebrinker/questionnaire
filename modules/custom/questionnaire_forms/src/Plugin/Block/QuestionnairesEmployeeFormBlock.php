<?php

namespace Drupal\questionnaire_forms\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\webform\Entity\Webform;

/**
 * Provides a 'QuestionnairesEmployeeForm' Block
 *
 * @Block(
 *   id = "questionnaire_forms_block_for_employee",
 *   admin_label = @Translation("Questionnaire form for employee"),
 * )
 */
class QuestionnairesEmployeeFormBlock extends BlockBase
{

    public function build()
    {
//        $webform = new Webform();
//        $webform->getSubmissionForm([
//            'webform_id' => 'anketa_k_dkr'
//        ]);
        $webform = \Drupal::entityTypeManager()->getStorage('webform')->load('anketa_k_dkr');
//        $webform = new Webform();
        $webform = $webform->getSugetSubmissionForm();

        $title = 'Hi test block';
//
//
//        $view_builder = \Drupal::service('entity_type.manager')->getViewBuilder('webform');
//        $build        = $view_builder->view($webform);

//                print_r($webform);

        return array(
            '#theme' => 'questionnaires-form-employee-display',
            '#title' => $title,
            '#webform' => $webform,
            '#cache' => array(
                'max-age' => 0,
            ),
        );
    }

}