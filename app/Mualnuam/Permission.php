<?php namespace Mualnuam;

use Sentry;

class Permission
{
    public static function getPermissions($type = null)
    {
        $permissions = [
            'Admin' => [
                'home' => 1,

                'users.create' => 1,
                'users.store' => 1,
                'users.index' => 1,
                'users.edit' => 1,
                'users.update' => 1,
                'users.show' => 1,
                'users.destroy' => 1,
                'users.profile' => 1,
                'users.updateProfile' => 1,

                'classrooms.create' => 1,
                'classrooms.store' => 1,
                'classrooms.index' => 1,
                'classrooms.edit' => 1,
                'classrooms.update' => 1,
                'classrooms.destroy' => 1,
                'classrooms.show' => 1,
                'classrooms.addstudents' => 1,
                'classrooms.storestudents' => 1,
                'classrooms.students' => 1,

                'exams.create' => 1,
                'exams.store' => 1,
                'exams.index' => 1,
                'exams.edit' => 1,
                'exams.update' => 1,
                'exams.destroy' => 1,
                'exams.show' => 1,
                'exams.print' => 1,

                'results.create' => 1,
                'results.store' => 1,
                'results.index' => 1,
                'results.edit' => 1,
                'results.update' => 1,
                'results.destroy' => 1,
                'results.show' => 1,

                'tests.create' => 1,
                'tests.store' => 1,
                'tests.index' => 1,
                'tests.edit' => 1,
                'tests.update' => 1,
                'tests.destroy' => 1,
                'tests.show' => 1,

                'students.create' => 1,
                'students.store' => 1,
                'students.index' => 1,
                'students.edit' => 1,
                'students.update' => 1,
                'students.destroy' => 1,
                'students.show' => 1,
                'students.uploadPhoto' => 1,
                'students.photos' => 1,
                'students.add-photo' => 1,
                'students.storePhoto' => 1,
                'students.removePhoto' => 1,
                'students.defaultPhoto' => 1,
                'students.enrollments' => 1,
                'students.addEnrollment' => 1,
                'students.storeEnrollment' => 1,
                'students.removeEnrollment' => 1,
                'students.measurements' => 1,
                'students.addMeasurement' => 1,
                'students.storeMeasurement' => 1,
                'students.removeMeasurement' => 1,

                'subjects.create' => 1,
                'subjects.store' => 1,
                'subjects.index' => 1,
                'subjects.edit' => 1,
                'subjects.update' => 1,
                'subjects.destroy' => 1,
                'subjects.show' => 1,

                'academicsessions.create' => 1,
                'academicsessions.store' => 1,
                'academicsessions.index' => 1,
                'academicsessions.edit' => 1,
                'academicsessions.update' => 1,
                'academicsessions.destroy' => 1,
                'academicsessions.show' => 1,

                'assessments.create' => 1,
                'assessments.store' => 1,
                'assessments.index' => 1,
                'assessments.edit' => 1,
                'assessments.update' => 1,
                'assessments.destroy' => 1,
                'assessments.show' => 1,
                'assessments.tests' => 1,
                'assessments.createTest' => 1,
                'assessments.storeTest' => 1,

                'marks.create' => 1,
                'marks.store' => 1,
                'marks.index' => 1,
                'marks.edit' => 1,
                'marks.update' => 1,
                'marks.destroy' => 1,
                'marks.show' => 1,
            ],

            'Staff' => [
                'home' => 1,

                'marks.create' => 1,
                'marks.store' => 1,

                'exams.index' => 1,
                'exams.edit' => 1,
                'exams.update' => 1,
                'exams.destroy' => 1,
                'exams.print' => 1,

                'users.profile' => 1,
                'users.updateProfile' => 1,

                'students.index' => 1,
                'students.edit' => 1,
                'students.update' => 1,
                'students.photos' => 1,
                'students.enrollments' => 1,
                'students.addEnrollment' => 1,
                'students.storeEnrollment' => 1,
                'students.measurements' => 1,
                'students.addMeasurement' => 1,
                'students.storeMeasurement' => 1,
            ]
        ];

        return $permissions;
    }

    public static function revoke()
    {
        $lists = self::getPermissions();

        foreach ($lists as $groupName => $list) {
            $group = Sentry::findGroupByName($groupName);
            $group->permissions = $list;
            $group->save();
        }

        return $lists;
    }
}
