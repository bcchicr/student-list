<?php

namespace Bcchicr\StudentList\Models\Factory;

use DateTime;
use Bcchicr\StudentList\Models\StudentData;
use Bcchicr\StudentList\Models\Factory\ModelFactory;
use Bcchicr\StudentList\Models\Watcher\IdentityWatcher;

class StudentDataFactory extends ModelFactory
{
    public function __construct(
        private IdentityWatcher $identityWatcher
    ) {
    }
    public function createObject(array $raw): StudentData
    {
        $object = $this->identityWatcher->get(StudentData::class, $raw['student_id']);
        if (!is_null($object)) {
            return $object;
        }

        $object = new StudentData(
            $raw['student_id'],
            $raw['student_first_name'],
            $raw['student_last_name'],
            $raw['student_sex'],
            new DateTime($raw['student_birth_date']),
            $raw['student_group'],
            $raw['student_exam_points'],
        );

        $this->identityWatcher->add($object);
        return $object;
    }
}
