<?php
 /**
  * @file
  * Contains \Drupal\questionnaire_lists\Controller\QuestionnairesEmployeeController.
  * ^ Пишется по следующему типу:
  *  - \Drupal - это указывает что данный файл относится к ядру Drupal, ведь
  *    теперь там еще есть Symfony.
  *  - questionnaire_lists - название модуля.
  *  - Controller - тип файла. Папка src опускается всегда.
  *  - QuestionnairesEmployeeController - название нашего класса.
  */

/**
 * Пространство имен нашего контроллера. Обратите внимание что оно схоже с тем
 * что описано выше, только опускается название нашего класса.
 */
namespace Drupal\questionnaire_lists\Controller;

/**
 * Используем друпальный класс ControllerBase. Мы будем от него наследоваться,
 * а он за нас сделает все обязательные вещи которые присущи всем контроллерам.
 */
use Drupal\Core\Controller\ControllerBase;
use Drupal\webform\Utility\WebformDateHelper;

/**
 * Объявляем наш класс-контроллер.
 */
class QuestionnairesEmployeeController extends ControllerBase {

  /**
   * {@inheritdoc}
   *
   * В Drupal 8 очень многое строится на renderable arrays и при отдаче
   * из данной функции содержимого для страницы, мы также должны вернуть
   * массив который спокойно пройдет через drupal_render().
   */
    public function getListForEmployee() {
        $output = array();

        $output['#title'] = 'HelloWorld page title';

        $output['#markup'] = 'Hello World!';

        // $storage = \Drupal::entityTypeManager()->getStorage('webform_submission');
        // $webform_submission = $storage->loadByProperties([
        // 'entity_type' => 'node'
        // ]);

        // $submission_data = array();
        // foreach ($webform_submission as $submission) {
        // $submission_data[] = $submission->getData();

        // }

        $nids = \Drupal::entityQuery('node')->condition('type','article')->execute();
        $nodes =  \Drupal\node\Entity\Node::loadMultiple($nids);

        // $webform = \Drupal::entityTypeManager()->getStorage('webform')->load('anketa_k_dkr');
        // $webform = $webform->getSubmissionForm();

        $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());

        // echo 'user: ' . $user->get('uid')->value;

        $webformSubmissions = \Drupal::service('entity.manager')->getStorage('webform_submission')->loadMultiple();

        $webformSubmissionsList = [];
        foreach ($webformSubmissions as $webformSubmission) {
            $innerDataWebformSubmission = $webformSubmission->getData();

            $webformSubmissionsList[] = array(
                'sid' => $webformSubmission->id(),
                'label' => $webformSubmission->label(),
                'serial' => $webformSubmission->serial(),
                'uuid' => $webformSubmission->uuid(),
                // 'is_draft' => $webformSubmission->isDraft() ? t('Yes') : t('No'),
                // 'current_page' => $webformSubmission->getCurrentPageTitle(),
                // 'remote_addr' => $webformSubmission->getRemoteAddr(),
                // 'submitted_by' => $webformSubmission->getOwner()->toLink(),
                'created' => $webformSubmission->getCreatedTime(),
                // 'completed' = WebformDateHelper::format($webform_submission->getCompletedTime()),
                'changed' => $webformSubmission->getChangedTime(),
                'sticky' => $webformSubmission->isSticky() ? t('Yes') : '',
                'locked' => $webformSubmission->isLocked() ? t('Yes') : '',
                // 'id_employee' => $innerDataWebformSubmission[''],
                // 'notes' => $webform_submission->getNotes(),
            );
            // $contentTypesList[] = $contentType->getData();
            // $contentTypesList['teamlead_id'] = $contentType->id();
        }
        print_r($innerDataWebformSubmission);
        // return $submission_data;

        $testval = 'Test Value';

        return [
            '#theme' => 'questionnaires-employee-display',
            '#test_var' => $output,
        ];
    }

}