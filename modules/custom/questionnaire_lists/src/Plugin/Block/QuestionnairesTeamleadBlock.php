<?php
/**
 * @file
 * Contains \Drupal\questionnaire_lists\Plugin\Block\QuestionnairesTeamleadBlock.
 */

namespace Drupal\questionnaire_lists\Plugin\Block;


use Drupal\Core\Block\BlockBase;
use Drupal\user\Entity\User;

/**
 * Provides a 'QuestionnairesTeamlead' Block
 *
 * @Block(
 *   id = "questionnaire_lists_block_for_teamlead",
 *   admin_label = @Translation("Questionnaire list for teamlead"),
 * )
 */
class QuestionnairesTeamleadBlock extends BlockBase
{
    public function getListForTeamlead() {
        $current_user_id = \Drupal::currentUser()->id();
        $webformSubmissionsList = [];

        $sids_current_user = $this->issetAllQuestionnairesIDForUser($current_user_id);

        $webformSubmissions = \Drupal::service('entity.manager')->getStorage('webform_submission')->loadMultiple($sids_current_user);

        foreach ($webformSubmissions as $webformSubmission) {

            $innerDataWebformSubmission = $webformSubmission->getData();

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
                'entity_employee' => User::load($innerDataWebformSubmission['team_entity_sotrudnik']),
                'name_teamlead' => $innerDataWebformSubmission['name_timlida'],
                'token' => $webformSubmission->getToken(),
                'update_url' => $webformSubmission->getTokenUrl()->toString(),
                'view_url' => str_replace("form", "webform", $webformSubmission->getSourceUrl()->toString())
            );
        }

        return $webformSubmissionsList;
    }

    // db query get list questionnaire for current teamlead
    private static function issetAllQuestionnairesIDForUser($user_id) {

        $submission_query = \Drupal::database()->select('webform_submission', 'ws');
        $submission_query->fields('ws', ['sid']);

        $condition_or = new \Drupal\Core\Database\Query\Condition('OR');
        $condition_or->condition('ws.uid', $user_id);
        $condition_or->condition('wsd.value', $user_id);

        $submission_query->join('webform_submission_data', 'wsd', 'wsd.sid = ws.sid');

        $submission_query->condition($condition_or);
        $submission_query->condition('wsd.name', 'id_timlida');

        $submission_query->orderBy('ws.created', 'DESC');

        $all_submissions = $submission_query->execute()->fetchCol();

        return $all_submissions;

    }

    public function build() {

        return array(
            '#theme' => 'questionnaires-teamlead-display',
            '#submissions' => $this->getListForTeamlead(),
            '#cache' => array(
                'max-age' => 0,
            ),
        );
    }

}