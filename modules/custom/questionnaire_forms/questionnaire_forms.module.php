<?php

function questionnaire_lists_theme($existing, $type, $theme, $path) {
    return [
        'questionnaires-form-employee-display' => [
            'variables' => [
                'title' => NULL,
                'webform' => NULL,
            ],
            'template' => 'questionnaires-form-employee',
        ],
//        'questionnaires-teamlead-display' => [
//            'variables' => [
//                'submissions' => NULL,
//            ],
//            'template' => 'questionnaires-teamlead',
//        ],
    ];
}
