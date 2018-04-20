<?php

namespace Drupal\questionnaire_forms;

class QuestionnaireForm
{
    /**
     * Webform elements excluded.
     */
    const FLAG_EMPLOY_FORM = 'employ_form';

    /**
     * Webform elements included.
     */
    const FLAG_TEAMLEAD_FORM = 'teamlead_form';

    /**
     * Finds elements that belong to two roles at the same time (employ and teamlead).
     * @param $webform
     *   Entity webform.
     *
     * @return array.
     */
    public static function getСommonElements($webform, $flag) {
        $elementsPage = [];

        $elements = $webform->getElementsInitialized();
        if (is_array($elements)) {
            foreach ($elements as $element) {
                if ($flag === QuestionnaireForm::FLAG_TEAMLEAD_FORM && $element['#type'] == 'webform_wizard_page' && in_array('employee', $element['#access_create_roles']) && in_array('team_lider', $element['#access_create_roles'])) {
                    $elementsPage[] = $element['#webform_key'];
                }

                if ($flag === QuestionnaireForm::FLAG_EMPLOY_FORM && $element['#type'] == 'webform_wizard_page' && !in_array('employee', $element['#access_create_roles']) && in_array('team_lider', $element['#access_create_roles'])) {
                    $elementsPage[] = $element['#webform_key'];
                }
            }
        }

        return $elementsPage;
    }
}