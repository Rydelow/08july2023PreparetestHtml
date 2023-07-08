<?php
$observers = array(
	array(
        'eventname' => '\mod_quiz\event\attempt_submitted',
        'includefile' => '/local/mdl_course_enroll/quiz_notification.php',
        'callback' => 'attempt_submitted',
        'internal' => true),
	array(
        'eventname' => '\mod_quiz\event\attempt_started',
        'includefile' => '/local/mdl_course_enroll/quiz_notification.php',
        'callback' => 'attempt_started',
        'internal' => true),
        // array(
        // 'eventname' => '\core\event\user_created',
        // 'includefile' => '/local/mdl_course_enroll/localevent.php',
        // 'callback' => 'userroleassigne',
        // 'internal' => true)

)
?>