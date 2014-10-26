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

                'results-configuration.create' => 1,
                'results-configuration.store' => 1,
                'results-configuration.index' => 1,
                'results-configuration.edit' => 1,
                'results-configuration.update' => 1,
                'results-configuration.destroy' => 1,
                'results-configuration.show' => 1,

                'results.index' => 1,
                'results.overview' => 1,
                'results.create' => 1,
                'results.show' => 1,
                'results.lock' => 1,
                'results.unlock' => 1,

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

                'settings.index' => 1,
                'settings.store' => 1,

                'printResult' => 1
            ],

            'Staff' => [
                'home' => 1,

                'users.create' => 0,
                'users.store' => 0,
                'users.index' => 0,
                'users.edit' => 0,
                'users.update' => 0,
                'users.show' => 0,
                'users.destroy' => 0,
                'users.profile' => 1,
                'users.updateProfile' => 1,

                'classrooms.create' => 0,
                'classrooms.store' => 0,
                'classrooms.index' => 1,
                'classrooms.edit' => 0,
                'classrooms.update' => 0,
                'classrooms.destroy' => 0,
                'classrooms.show' => 1,
                'classrooms.addstudents' => 0,
                'classrooms.storestudents' => 0,
                'classrooms.students' => 0,

                'exams.create' => 0,
                'exams.store' => 0,
                'exams.index' => 1,
                'exams.edit' => 1,
                'exams.update' => 1,
                'exams.destroy' => 1,
                'exams.show' => 0,
                'exams.print' => 1,

                'results-configuration.create' => 0,
                'results-configuration.store' => 0,
                'results-configuration.index' => 0,
                'results-configuration.edit' => 0,
                'results-configuration.update' => 0,
                'results-configuration.destroy' => 0,
                'results-configuration.show' => 0,

                'results.index' => 1,
                'results.overview' => 1,
                'results.create' => 1,
                'results.show' => 1,
                'results.lock' => 0,
                'results.unlock' => 0,

                'tests.create' => 0,
                'tests.store' => 0,
                'tests.index' => 0,
                'tests.edit' => 0,
                'tests.update' => 0,
                'tests.destroy' => 0,
                'tests.show' => 0,

                'students.create' => 0,
                'students.store' => 0,
                'students.index' => 1,
                'students.edit' => 1,
                'students.update' => 1,
                'students.destroy' => 0,
                'students.show' => 0,
                'students.uploadPhoto' => 0,
                'students.photos' => 1,
                'students.add-photo' => 0,
                'students.storePhoto' => 0,
                'students.removePhoto' => 0,
                'students.defaultPhoto' => 0,
                'students.enrollments' => 1,
                'students.addEnrollment' => 1,
                'students.storeEnrollment' => 1,
                'students.removeEnrollment' => 0,
                'students.measurements' => 1,
                'students.addMeasurement' => 1,
                'students.storeMeasurement' => 1,
                'students.removeMeasurement' => 0,

                'subjects.create' => 0,
                'subjects.store' => 0,
                'subjects.index' => 0,
                'subjects.edit' => 0,
                'subjects.update' => 0,
                'subjects.destroy' => 0,
                'subjects.show' => 0,

                'academicsessions.create' => 0,
                'academicsessions.store' => 0,
                'academicsessions.index' => 0,
                'academicsessions.edit' => 0,
                'academicsessions.update' => 0,
                'academicsessions.destroy' => 0,
                'academicsessions.show' => 0,

                'assessments.create' => 0,
                'assessments.store' => 0,
                'assessments.index' => 0,
                'assessments.edit' => 0,
                'assessments.update' => 0,
                'assessments.destroy' => 0,
                'assessments.show' => 0,
                'assessments.tests' => 0,
                'assessments.createTest' => 0,
                'assessments.storeTest' => 0,

                'marks.create' => 1,
                'marks.store' => 1,
                'marks.index' => 0,
                'marks.edit' => 0,
                'marks.update' => 0,
                'marks.destroy' => 0,
                'marks.show' => 0,

                'settings.index' => 0,
                'settings.store' => 0,

                'printResult' => 0
            ],
            'External' => [
                'home' => 1,

                'users.create' => 0,
                'users.store' => 0,
                'users.index' => 0,
                'users.edit' => 0,
                'users.update' => 0,
                'users.show' => 0,
                'users.destroy' => 0,
                'users.profile' => 1,
                'users.updateProfile' => 1,

                'classrooms.create' => 0,
                'classrooms.store' => 0,
                'classrooms.index' => 1,
                'classrooms.edit' => 0,
                'classrooms.update' => 0,
                'classrooms.destroy' => 0,
                'classrooms.show' => 1,
                'classrooms.addstudents' => 0,
                'classrooms.storestudents' => 0,
                'classrooms.students' => 0,

                'exams.create' => 0,
                'exams.store' => 0,
                'exams.index' => 1,
                'exams.edit' => 1,
                'exams.update' => 1,
                'exams.destroy' => 1,
                'exams.show' => 0,
                'exams.print' => 1,

                'results-configuration.create' => 0,
                'results-configuration.store' => 0,
                'results-configuration.index' => 0,
                'results-configuration.edit' => 0,
                'results-configuration.update' => 0,
                'results-configuration.destroy' => 0,
                'results-configuration.show' => 0,

                'results.index' => 0,
                'results.overview' => 0,
                'results.create' => 0,
                'results.show' => 0,
                'results.lock' => 0,
                'results.unlock' => 0,

                'tests.create' => 0,
                'tests.store' => 0,
                'tests.index' => 0,
                'tests.edit' => 0,
                'tests.update' => 0,
                'tests.destroy' => 0,
                'tests.show' => 0,

                'students.create' => 0,
                'students.store' => 0,
                'students.index' => 1,
                'students.edit' => 0,
                'students.update' => 0,
                'students.destroy' => 0,
                'students.show' => 1,
                'students.uploadPhoto' => 0,
                'students.photos' => 1,
                'students.add-photo' => 0,
                'students.storePhoto' => 0,
                'students.removePhoto' => 0,
                'students.defaultPhoto' => 0,
                'students.enrollments' => 1,
                'students.addEnrollment' => 0,
                'students.storeEnrollment' => 0,
                'students.removeEnrollment' => 0,
                'students.measurements' => 1,
                'students.addMeasurement' => 0,
                'students.storeMeasurement' => 0,
                'students.removeMeasurement' => 0,

                'subjects.create' => 0,
                'subjects.store' => 0,
                'subjects.index' => 0,
                'subjects.edit' => 0,
                'subjects.update' => 0,
                'subjects.destroy' => 0,
                'subjects.show' => 0,

                'academicsessions.create' => 0,
                'academicsessions.store' => 0,
                'academicsessions.index' => 0,
                'academicsessions.edit' => 0,
                'academicsessions.update' => 0,
                'academicsessions.destroy' => 0,
                'academicsessions.show' => 0,

                'assessments.create' => 0,
                'assessments.store' => 0,
                'assessments.index' => 0,
                'assessments.edit' => 0,
                'assessments.update' => 0,
                'assessments.destroy' => 0,
                'assessments.show' => 0,
                'assessments.tests' => 0,
                'assessments.createTest' => 0,
                'assessments.storeTest' => 0,

                'marks.create' => 1,
                'marks.store' => 1,
                'marks.index' => 0,
                'marks.edit' => 0,
                'marks.update' => 0,
                'marks.destroy' => 0,
                'marks.show' => 0,

                'settings.index' => 0,
                'settings.store' => 0,

                'printResult' => 0
            ]
        ];

        return $permissions;
    }

    public static function revoke()
    {
        $lists = self::getPermissions();
        $permissions = [];

        foreach ($lists as $groupName => $list) {
            $group = Sentry::findGroupByName($groupName);
            $group->permissions = $list;
            $group->save();

            $permissions[$groupName] = $group->permissions;
        }

        return $permissions;
    }
}
