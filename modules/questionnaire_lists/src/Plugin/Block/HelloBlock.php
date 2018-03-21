<?php
/**
 * @file
 * Contains \Drupal\questionnaire_lists\Plugin\Block\HelloBlock.
 */

namespace Drupal\questionnaire_lists\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\user\Entity\User;

/**
 * Provides a 'Hello' Block
 *
 * @Block(
 *   id = "questionnaire_lists_block",
 *   admin_label = @Translation("Questionnaire lists"),
 * )
 */
class HelloBlock extends BlockBase {
    /**
     * {@inheritdoc}
     */

    /**
     * {@inheritdoc}
     *
     * В Drupal 8 очень многое строится на renderable arrays и при отдаче
     * из данной функции содержимого для страницы, мы также должны вернуть
     * массив который спокойно пройдет через drupal_render().
     */
    public function getListForEmployee() {
        $current_user_id = \Drupal::currentUser()->id();
        $webformSubmissionsList = [];

//         $output = array();

//         $output['#title'] = 'HelloWorld page title';

        $output = 'Hello World text!';

        // $nids = \Drupal::entityQuery('node')->condition('type','article')->execute();
        // $nodes =  \Drupal\node\Entity\Node::loadMultiple($nids);
        $sids_current_user = $this->issetOldQuestionnaireForUser($current_user_id);

        $webformSubmissions = \Drupal::service('entity.manager')->getStorage('webform_submission')->loadMultiple($sids_current_user);


        foreach ($webformSubmissions as $webformSubmission) {
            // $webform = $webformSubmission->getWebform();
            $innerDataWebformSubmission = $webformSubmission->getData();

//            if ($submitted_by_id = $webformSubmission->getOwnerId() === $current_user_id) {
                $webformSubmissionsList[] = array(
                    'sid' => $webformSubmission->id(),
                    'label' => $webformSubmission->label(),
                    'serial' => $webformSubmission->serial(),
                    'uuid' => $webformSubmission->uuid(),
                    'is_draft' => $webformSubmission->isDraft() ? true : false,
                    // 'current_page' => $webformSubmission->getCurrentPageTitle(),
                    // 'remote_addr' => $webformSubmission->getRemoteAddr(),
                    'submitted_by_id' => $webformSubmission->getOwnerId(),
                    // 'completed' = WebformDateHelper::format($webform_submission->getCompletedTime()),
                    'created' => $webformSubmission->getCreatedTime(),
                    'changed' => $webformSubmission->getChangedTime(),
                    'sticky' => $webformSubmission->isSticky() ? true : false,
                    'locked' => $webformSubmission->isLocked() ? true : false,
                    'id_employee' => $innerDataWebformSubmission['id_sotrudnika'],
                    'id_teamlead' => $innerDataWebformSubmission['id_timlida'],
                    'name_teamlead' => $innerDataWebformSubmission['name_timlida'],
                    'token' => $webformSubmission->getToken(),
                    'update_url' => $webformSubmission->getTokenUrl()->toString(),
                    'view_url' => str_replace("form", "webform", $webformSubmission->getSourceUrl()->toString())
                    // 'notes' => $webform_submission->getNotes(),
                );
//            }
            // $contentTypesList[] = $contentType->getData();
            // $contentTypesList['teamlead_id'] = $contentType->id();
            // echo 'webforms: ' . $webformSubmission->id();
        }

        return $webformSubmissionsList;
    }

    // получает имя тимлида по id сотрудника
    public function getTimlId($emloyee_id) {
        $ids = \Drupal::entityQuery('user')
            ->condition('status', 1)
            ->condition('roles', 'team_lider')
            ->execute();
        $teamleads = User::loadMultiple($ids);

        foreach ($teamleads as $teamlead) {
            $selected_employees = $teamlead->get('field_select_users')->getValue();
            foreach ($selected_employees as $selected_employee) {

                if (in_array($emloyee_id, $selected_employee)) {
                    return $selected_employees;
                }
            }

        }

        return false;
    }

    // db query get list questionnaire for current employee
    private static function issetOldQuestionnaireForUser($user_id) {

        $submission_query = \Drupal::database()->select('webform_submission', 'ws');
        $submission_query->fields('ws', ['sid']);

        $condition_or = new \Drupal\Core\Database\Query\Condition('OR');
        $condition_or->condition('ws.uid', $user_id);
        $condition_or->condition('wsd.value', $user_id);

        $submission_query->join('webform_submission_data', 'wsd', 'wsd.sid = ws.sid');

        $submission_query->condition($condition_or);
        $submission_query->condition('wsd.name', 'team_entity_sotrudnik');

        $submission_query->orderBy('ws.created', 'DESC');

        $all_submissions = $submission_query->execute()->fetchCol();

        return $all_submissions;

    }

    public function build() {
print_r($this->getTimlid(\Drupal::currentUser()->id()));
//print_r(\Drupal::currentUser());
        return array(
            '#theme' => 'questionnaires-employee-display',
//            '#teamlead' => ,
            '#submissions' => $this->getListForEmployee(),
            '#cache' => array(
                'max-age' => 0,
            ),
        );
    }

}