<?php namespace Mualnuam;
use Exam, Test, Mark, User, Subject, AssessmentConfiguration, Assessment, DB;

class ResultHelper
{
    public static function studentSubjectTest($studentId, $subjectId, $classRoomId, $assessmentId, $academicSessionId, $resultConfig = null, $excludeGroup = null)
    {
        $subjectTable = (new Subject)->getTable();
        $assessmentTable = (new Assessment)->getTable();
        $testTable = (new Test)->getTable();
        $examTable = (new Exam)->getTable();
        $markTable = (new Mark)->getTable();
        $userTable = (new User)->getTable();

        $tests = Mark::join($examTable, $markTable . '.exam_id', '=', $examTable . '.id')
            ->join($testTable, $examTable . '.test_id', '=', $testTable . '.id')
            ->join($userTable, $examTable . '.user_id', '=', $userTable . '.id')
            ->join('users_groups', 'users_groups.user_id', '=', $userTable . '.id')
            ->join($assessmentTable, $testTable . '.assessment_id', '=', $assessmentTable . '.id')
            ->where(function($q) use($testTable, $subjectId, $studentId, $classRoomId, $academicSessionId, $assessmentTable, $assessmentId, $resultConfig, $excludeGroup) {
                $q->where($testTable . '.subject_id', '=', $subjectId);
                $q->where('student_id', '=', $studentId);
                $q->where('class_room_id', '=', $classRoomId);
                $q->where('academic_session_id', '=', $academicSessionId);

                if($excludeGroup)
                    $q->where('users_groups.group_id', '!=', $excludeGroup); // Exclude all marks entered by group
                
                if($assessmentId != 0)
                    $q->where('assessment_id', '=', $assessmentId);
                elseif($assessmentId == 0) {
                    $assessment = Assessment::find($resultConfig->assessment_id);
                    $q->where($assessmentTable . '.order', '<=', $assessment->order);
                }
            })
            ->select(
                $assessmentTable . '.order as assessmentOrder',
                $testTable . '.name as testName',
                $testTable . '.totalmarks',
                $testTable . '.assessment_id',
                $markTable . '.mark',
                $examTable . '.name as examName',
                $examTable . '.user_id',
                $userTable . '.short_name as teacherName'
            )
            ->orderBy($assessmentTable . '.order', 'desc')
            ->get();

        $return = [
            'count' => $tests->count(),
            'total_of_full_marks' => 0,
            'total_of_marks' => 0,
            'teacher_name' => '',
            'totalCumulated' => 0,
            'totalWeightage' => 0,
        ];

        $cumulatedData = [];

        foreach($tests as $test) {
            $return['total_of_full_marks'] += $test->totalmarks;
            $return['total_of_marks'] += $test->mark;
            $return['teacher_name'][] = $test->teacherName;

            if($assessmentId == 0) {
                if(!isset($cumulatedData[$test->assessment_id]))
                    $cumulatedData[$test->assessment_id] = ['mark' => 0, 'total' => 0];

                $cumulatedData[$test->assessment_id]['mark'] += $test->mark;
                $cumulatedData[$test->assessment_id]['total'] += $test->totalmarks;
            }
        }

        foreach($cumulatedData as $id => $data ) {
            // Get assessment configuration
            $config = AssessmentConfiguration::where('assessment_id', '=', $id)
                ->where('result_config_id', '=', $resultConfig->id)
                ->first();

            $percentage = $data['total'] > 0 ? round(($data['mark'] / $data['total']) * 100, 2) : null;
            $cumulated = round(($percentage / 100) * $config->weightage, 2);
            $return['totalCumulated'] += $cumulated;
            $return['totalWeightage'] += $resultConfig->weightage; // Weightage percentage completed
        }

        $return['teacher_name'] = is_array($return['teacher_name']) ? implode('<br>', array_unique($return['teacher_name'])) : null;

        $return['percentage'] = $return['total_of_full_marks'] > 0 ? round(($return['total_of_marks'] / $return['total_of_full_marks']) * 100, 2) : 0;
        
        $return['cumulated'] = round(($return['percentage'] / 100) * $resultConfig->weightage, 2);

        $point = $return['percentage'] / 10;
        $return['grade'] = self::grade( $point, $resultConfig );

        return $return;
    }

    public static function grade($point, $resultConfig)
    {
        $point = floor($point);

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

    public static function lastAssessment($academicSessionId, $classRoomId = 0, $studentId = 0, $subjectId = 0, $excludeGroup = null)
    {
        $assessmentTable = (new Assessment)->getTable();
        $testTable = (new Test)->getTable();
        $examTable = (new Exam)->getTable();
        $markTable = (new Mark)->getTable();
        $userTable = (new User)->getTable();

        return Mark::join($examTable, $markTable . '.exam_id', '=', $examTable . '.id')
            ->join($testTable, $examTable . '.test_id', '=', $testTable . '.id')
            ->join($assessmentTable, $testTable . '.assessment_id', '=', $assessmentTable . '.id')
            ->join($userTable, $examTable . '.user_id', '=', $userTable . '.id')
            ->join('users_groups', 'users_groups.user_id', '=', $userTable . '.id')
            ->where(function($q) use($testTable, $subjectId, $studentId, $classRoomId, $academicSessionId, $excludeGroup) {

                if($excludeGroup)
                    $q->where('users_groups.group_id', '!=', $excludeGroup); // Exclude all marks entered by group

                if($studentId != 0)
                    $q->where('student_id', '=', $studentId);

                if($classRoomId != 0)
                    $q->where('class_room_id', '=', $classRoomId);

                if($academicSessionId != 0)
                    $q->where('academic_session_id', '=', $academicSessionId);

                if($subjectId != 0)
                    $q->where($testTable . '.subject_id', '=', $subjectId);
            })
            ->select(
                $assessmentTable . '.name',
                $assessmentTable . '.short_name',
                $assessmentTable . '.order as assessmentOrder'
            )
            ->orderBy($assessmentTable . '.order', 'desc')
            ->first();
    }

    public static function testMarkExists($academicSessionId, $assessmentId, $classRoomId, $subjectId = null, $excludeGroup = null)
    {
        $examTable = (new Exam)->getTable();
        $markTable = (new Mark)->getTable();
        $userTable = (new User)->getTable();
        $testTable = (new Test)->getTable();
        
        $tests = Mark::join($examTable, $markTable . '.exam_id', '=', $examTable . '.id')
            ->join($testTable, $examTable . '.test_id', '=', $testTable . '.id')
            ->join($userTable, $examTable . '.user_id', '=', $userTable . '.id')
            ->join('users_groups', 'users_groups.user_id', '=', $userTable . '.id')
            ->where(function($q) use($testTable, $academicSessionId, $assessmentId, $classRoomId, $subjectId, $excludeGroup) {
                $q->where('academic_session_id', '=', $academicSessionId);
                
                if($classRoomId != 0)
                    $q->where('class_room_id', '=', $classRoomId);
                
                if($excludeGroup)
                    $q->where('users_groups.group_id', '!=', $excludeGroup); // Exclude all marks entered by group
                
                if($assessmentId != 0)
                    $q->where('assessment_id', '=', $assessmentId);

                if($subjectId != 0)
                    $q->where($testTable . '.subject_id', '=', $subjectId);
            })->count();

        return $tests ? true : false;
    }
}