<?php

namespace Drupal\questionnaire_lists\Controller;

use Drupal\Core\Controller\ControllerBase;


class QuestionnairesEmployeeController extends ControllerBase {

    public function getListForEmployee() {
        $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());

        $output = array();

        $output['#title'] = 'HelloWorld page title';

        $output['#markup'] = 'Hello World!';

        $webformSubmissions = \Drupal::service('entity.manager')->getStorage('webform_submission')->loadMultiple();

        $webformSubmissionsList = [];
        foreach ($webformSubmissions as $webformSubmission) {

            $innerDataWebformSubmission = $webformSubmission->getData();

                $webformSubmissionsList[] = array(
                    'sid' => $webformSubmission->id(),
                    'label' => $webformSubmission->label(),
                    'serial' => $webformSubmission->serial(),
                    'uuid' => $webformSubmission->uuid(),
                    'is_draft' => $webformSubmission->isDraft() ? t('Yes') : t('No'),
                    'submitted_by_id' => $webformSubmission->getOwnerId(),
                    'created' => $webformSubmission->getCreatedTime(),
                    'changed' => $webformSubmission->getChangedTime(),
                    'sticky' => $webformSubmission->isSticky() ? t('Yes') : '',
                    'locked' => $webformSubmission->isLocked() ? t('Yes') : '',
                    'id_employee' => $innerDataWebformSubmission['id_sotrudnika'],
                    'id_teamlead' => $innerDataWebformSubmission['id_timlida'],
                    'token' => $webformSubmission->getToken(),
                );
        }

        return [
            '#theme' => 'questionnaires-employee-display',
            '#test_var' => $output,
            '#submissions' => $webformSubmissionsList,
        ];
    }

}