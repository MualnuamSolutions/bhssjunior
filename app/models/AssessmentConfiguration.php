<?php
class AssessmentConfiguration extends Eloquent
{
    protected $table = 'assessment_configurations';

    public function assessment()
    {
        return $this->belongsTo('Assessment', 'assessment_id');
    }

}
