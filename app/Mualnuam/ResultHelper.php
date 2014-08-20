<?php namespace Mualnuam;
use Exam, Test, Mark, User;

class ResultHelper
{
    public static function studentSubjectTest($studentId, $subjectId, $classRoomId, $assessmentId, $academicSessionId, $resultConfig)
    {
        $testTable = (new Test)->getTable();
        $examTable = (new Exam)->getTable();
        $markTable = (new Mark)->getTable();
        $userTable = (new User)->getTable();

        $tests = Mark::join($examTable, $markTable . '.exam_id', '=', $examTable . '.id')
            ->join($testTable, $examTable . '.test_id', '=', $testTable . '.id')
            ->join($userTable, $examTable . '.user_id', '=', $userTable . '.id')
            ->where($testTable . '.subject_id', '=', $subjectId)
            ->where('student_id', '=', $studentId)
            ->where('class_room_id', '=', $classRoomId)
            ->where('academic_session_id', '=', $academicSessionId)
            ->where('assessment_id', '=', $assessmentId)
            ->select(
                $testTable . '.name as testName',
                $testTable . '.totalmarks',
                $markTable . '.mark',
                $examTable . '.name as examName',
                $examTable . '.user_id',
                $userTable . '.name as teacherName'
            )
            ->get();

        $return = [
            'count' => $tests->count(),
            'total_of_full_marks' => 0,
            'total_of_marks' => 0,
            'teacher_name' => '',
        ];

        foreach($tests as $test) {
            $return['total_of_full_marks'] += $test->totalmarks;
            $return['total_of_marks'] += $test->mark;
            $return['teacher_name'] = $test->teacherName;
        }

        $return['percentage'] = round(($return['total_of_marks'] / $return['total_of_full_marks']) * 100, 2);
        $return['cumulated'] = round(($return['percentage'] / 100) * $resultConfig->weightage, 2);
        $return['grade'] = self::grade( ($return['total_of_marks']/$return['count']), $resultConfig );

        return $return;
    }

    public static function grade($point, $resultConfig)
    {
        $point = floor($point);
        return $point;

        if($point >= $resultConfig->grade_o)
            return 'O';
        else if($point < $resultConfig->grade_o && $point >= $resultConfig->grade_a)
            return 'A';
        else if($point < $resultConfig->grade_a && $point >= $resultConfig->grade_b)
            return 'B';
        else if($point < $resultConfig->grade_b && $point >= $resultConfig->grade_c)
            return 'C';
        else if($point < $resultConfig->grade_c && $point >= $resultConfig->grade_d)
            return 'D';
    }
}