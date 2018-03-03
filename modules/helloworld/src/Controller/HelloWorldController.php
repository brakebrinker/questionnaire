<?php
 /**
  * @file
  * Contains \Drupal\helloworld\Controller\HelloWorldController.
  * ^ Пишется по следующему типу:
  *  - \Drupal - это указывает что данный файл относится к ядру Drupal, ведь
  *    теперь там еще есть Symfony.
  *  - helloworld - название модуля.
  *  - Controller - тип файла. Папка src опускается всегда.
  *  - HelloWorldController - название нашего класса.
  */

/**
 * Пространство имен нашего контроллера. Обратите внимание что оно схоже с тем
 * что описано выше, только опускается название нашего класса.
 */
namespace Drupal\helloworld\Controller;

/**
 * Используем друпальный класс ControllerBase. Мы будем от него наследоваться,
 * а он за нас сделает все обязательные вещи которые присущи всем контроллерам.
 */
use Drupal\Core\Controller\ControllerBase;

/**
 * Объявляем наш класс-контроллер.
 */
class HelloWorldController extends ControllerBase {

  /**
   * {@inheritdoc}
   *
   * В Drupal 8 очень многое строится на renderable arrays и при отдаче
   * из данной функции содержимого для страницы, мы также должны вернуть
   * массив который спокойно пройдет через drupal_render().
   */
  public function helloWorld() {
    $output = array();

    $output['#title'] = 'HelloWorld page title';

    $output['#markup'] = 'Hello World!';

    $storage = \Drupal::entityTypeManager()->getStorage('webform_submission');
    $webform_submission = $storage->loadByProperties([
    'entity_type' => 'node'
    ]);

    $submission_data = array();
    foreach ($webform_submission as $submission) {
    $submission_data[] = $submission->getData();
    
    }

    $nids = \Drupal::entityQuery('node')->condition('type','article')->execute();
    $nodes =  \Drupal\node\Entity\Node::loadMultiple($nids);

    // $webform = \Drupal::entityTypeManager()->getStorage('webform')->load('anketa_k_dkr');
    // $webform = $webform->getSubmissionForm();

    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());

    // echo 'user: ' . $user->get('uid')->value;

    $contentTypes = \Drupal::service('entity.manager')->getStorage('webform_submission')->loadMultiple();

    $contentTypesList = [];
    foreach ($contentTypes as $contentType) {
        $contentTypesList[] = array($contentType->id(),
        $contentType->label());
        // $contentTypesList[] = $contentType->getData();
        // $contentTypesList['teamlead_id'] = $contentType->id();
    }
    print_r($contentTypesList);
    return $submission_data;
  }

}