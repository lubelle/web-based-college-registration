<?php
class CourseDB {
    public static function getCoursesTaken($student_id){
        $db = Database::getDB();
        try {
            $query = 'select c.Term, c.CourseNo, c.Title, c.Credits, c.Cost
                        from course_ c
                        inner join transcripts_ t on t.RegCode = c.RegCode
                        inner join student_ s on s.StudentID = t.StudentID
                        where s.StudentID = ?
                        order by c.Term';
            $statement = $db->prepare($query);
            $statement->bindValue(1, $student_id);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();       
            foreach ($rows as $row) {
                $course = new Course();
                $course->setTerm($row['Term']);
                $course->setCourseNo($row['CourseNo']);
                $course->setTitle($row['Title']);
                $course->setCredits($row['Credits']);
                $course->setCost($row['Cost']);
                $courses[] = $course;
            }
            return $courses;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
        }
    }
}
