<?php

namespace Drupal\questionnaire_forms\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\questionnaire_forms\QuestionnaireForm;
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
        $webform = \Drupal::entityTypeManager()->getStorage('webform')->load('anketa_k_dkr');

        $mustDeletedElements = QuestionnaireForm::getСommonElements($webform, QuestionnaireForm::FLAG_EMPLOY_FORM);

        if (!empty($mustDeletedElements)) {
            foreach ($mustDeletedElements as $mustDeletedElement) {
                $webform->deleteElement($mustDeletedElement);
            }
        }

        $webform = $webform->getSubmissionForm();

        return array(
            '#theme' => 'questionnaires-form-employee-display',
            '#webformEntity' => $mustDeletedElements,
            '#webform' => $webform,
            '#cache' => array(
                'max-age' => 0,
            ),
        );
    }

}