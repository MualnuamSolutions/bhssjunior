<?php
class ResultConfiguration extends Eloquent
{
    protected $table = 'results_configurations';

    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [
        'academic_session_id' => 'required|numeric',
        'grade_a' => 'required',
        'grade_b' => 'required',
        'grade_c' => 'required',
        'grade_d' => 'required',
        'grade_o' => 'required',
    ];

    public function assessments()
    {
        return $this->hasMany('AssessmentConfiguration', 'result_config_id', 'id');
    }

    public function academicSession()
    {
        return $this->belongsTo('AcademicSession', 'academic_session_id');
    }

    public static function validator($input)
    {
        $rules = (new self)->rules;
        $messages = array();

        foreach ($input['assessment'] as $assessmentId => $weightage) {
            $rules["assessment.{$assessmentId}"] = "required|numeric|min:0";

            $assessment = Assessment::find($assessmentId);
            $messages = array(
                "assessment.{$assessmentId}.required" => $assessment->short_name . ' weightage is required.',
            );
        }

        $validator = Validator::make($input, $rules, $messages);

        return $validator;
    }

    public static function store($input, $update = false)
    {
        $resultConfiguration = new ResultConfiguration();

        if($update) {
            $resultConfiguration = ResultConfiguration::find($input['id']);
            AssessmentConfiguration::where('result_config_id', '=', $resultConfiguration->id)->delete();
        }

        $resultConfiguration->academic_session_id = $input['academic_session_id'];
        $resultConfiguration->grade_a = $input['grade_a'];
        $resultConfiguration->grade_b = $input['grade_b'];
        $resultConfiguration->grade_c = $input['grade_c'];
        $resultConfiguration->grade_d = $input['grade_d'];
        $resultConfiguration->grade_o = $input['grade_o'];
        $resultConfiguration->user_id = Sentry::getUser()->id;
        $resultConfiguration->save();

        $data = [];
        foreach ($input['assessment'] as $assessmentId => $weightage) {
            $data[] = [
                'result_config_id' => $resultConfiguration->id,
                'assessment_id' => $assessmentId,
                'weightage' => $weightage,
            ];
        }

        AssessmentConfiguration::insert($data);
    }

}
