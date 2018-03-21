<?php
 /**
  * @file
  * Contains \Drupal\questionnaire_lists\Plugin\Block\HelloBlock.
  */
 
 namespace Drupal\questionnaire_lists\Plugin\Block;

 use Drupal\Core\Block\BlockBase;
 
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
         $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());

//         $output = array();

//         $output['#title'] = 'HelloWorld page title';

         $output = 'Hello World text!';

         // $nids = \Drupal::entityQuery('node')->condition('type','article')->execute();
         // $nodes =  \Drupal\node\Entity\Node::loadMultiple($nids);

         $webformSubmissions = \Drupal::service('entity.manager')->getStorage('webform_submission')->loadMultiple();

         $webformSubmissionsList = [];
         foreach ($webformSubmissions as $webformSubmission) {
             // $webform = $webformSubmission->getWebform();
             $innerDataWebformSubmission = $webformSubmission->getData();

             // if ($submitted_by_id = $webformSubmission->getOwnerId() == $user) {
             $webformSubmissionsList[] = array(
                 'sid' => $webformSubmission->id(),
                 'label' => $webformSubmission->label(),
                 'serial' => $webformSubmission->serial(),
                 'uuid' => $webformSubmission->uuid(),
                 'is_draft' => $webformSubmission->isDraft() ? t('Yes') : t('No'),
                 // 'current_page' => $webformSubmission->getCurrentPageTitle(),
                 // 'remote_addr' => $webformSubmission->getRemoteAddr(),
                 'submitted_by_id' => $webformSubmission->getOwnerId(),
                 // 'completed' = WebformDateHelper::format($webform_submission->getCompletedTime()),
                 'created' => $webformSubmission->getCreatedTime(),
                 'changed' => $webformSubmission->getChangedTime(),
                 'sticky' => $webformSubmission->isSticky() ? t('Yes') : '',
                 'locked' => $webformSubmission->isLocked() ? t('Yes') : '',
                 'id_employee' => $innerDataWebformSubmission['id_sotrudnika'],
                 'id_teamlead' => $innerDataWebformSubmission['id_timlida'],
                 'token' => $webformSubmission->getToken(),
                 // 'notes' => $webform_submission->getNotes(),
             );
             // }
             // $contentTypesList[] = $contentType->getData();
             // $contentTypesList['teamlead_id'] = $contentType->id();
             // echo 'webforms: ' . $webformSubmission->id();
         }
         // print_r($webformSubmissionsList);

/*         return [
             '#theme' => 'questionnaires-employee-display',
             '#test_var' => $output,
             '#submissions' => $webformSubmissionsList,
         ];*/

        return $output;
     }
   public function build() {

       $output = 'Hello World text!';
     return array(
         '#theme' => 'questionnaires-employee-display',
       '#markup' => $this->t('Hello, Worlrrrrrrr'),
         '#title' => $this->t('Hello, World test_var!'),
         '#user' => \Drupal::currentUser(),
     );
   }
 
 }