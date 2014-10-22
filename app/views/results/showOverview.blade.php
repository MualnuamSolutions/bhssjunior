<?php
$total_tests = 0;
$total_full_mark = 0;
$total_mark = 0;
$total_cumulated = 0;
$all_tests_full_marks = 0;
$all_tests_marks = 0;
$all_tests_weightage = 0;

foreach($classRoom->subjects as $subject) {
    $tests = \Mualnuam\ResultHelper::studentSubjectTest($student->id, $subject->id, $classRoom->id, $assessment->id, $academicSession->id, $resultConfig);

    $allTests = \Mualnuam\ResultHelper::studentSubjectTest($student->id, $subject->id, $classRoom->id, 0, $academicSession->id, $resultConfig);
    $all_tests_full_marks += $allTests['total_of_full_marks'];
    $all_tests_marks += $allTests['total_of_marks'];
    $all_tests_weightage = $allTests['totalWeightage'];

    $total_tests += $tests['count'];
    $total_full_mark += $tests['total_of_full_marks'];
    $total_mark += $tests['total_of_marks'];
    $total_cumulated += ($subject->type == 'Half Paper' ? $tests['cumulated']/2 : $tests['cumulated']);
}
$percentage = $total_full_mark ? round(($total_mark / $total_full_mark) * 100, 2) : 0;

?>
<div class="data-row">
    <table>
        <tbody>
            <tr id="student_{{ $student->id }}">
                <td width="10%">{{ $enrollment->roll_no }}</td>
                <td width="30%">{{ $student->name }}</td>
                <td width="15%">{{ $total_mark }} / {{ $total_full_mark }}</td>
                <td width="15%">{{ round($percentage, 2) }}%</td>
                <td width="10%">{{ $total_tests ? \Mualnuam\ResultHelper::grade( ($percentage/10), $resultConfig ) : 0 }}</td>
                <td width="10%">{{ round( ($resultConfig->weightage / 100 ) * $percentage, 2) }}</td>
                <td width="10%" class="rank">&nbsp;</td>
            </tr>
        </tbody>
    </table>
</div>