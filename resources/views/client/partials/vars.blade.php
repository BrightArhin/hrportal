@php
foreach ($appraisals as $appraisal){
    $appwithComments =  $appraisal->load('comment.employee_comment');
    $employeescores = $appwithComments->employeescores;
    $supervisorscores = $appwithComments->supervisorscores;
    $comments = $appwithComments->comment;
    $disapproved_comments = $comments->filter(function($comment){
        if($comment->employee_comment !== null ){
            return $comment;
        }
    });
    global $emp_comment;
    foreach ($disapproved_comments as $discomment){
        $emp_comment = $discomment->employee_comment;
    }

@endphp
