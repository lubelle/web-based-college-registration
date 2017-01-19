<?php
class TranscriptsDB {
    public static function getAcademicReport($term, $student_id){
        $db = Database::getDB();   
        try {
            $query = 'select c.Term, c.CourseNo, c.Title, c.Instructor, c.DaysTimes,  c.Credits, t.LetterGrade, t.Gradepoints 
                      from student_ s 
                      inner join transcripts_ t on s.StudentID = t.StudentID  
                      inner join course_ c on t.RegCode = c.RegCode 
                      where c.Term = ?
                      and s.StudentID = ? ';         
            $statement = $db->prepare($query);
            $statement->bindValue(1, $term);
            $statement->bindValue(2, $student_id);
            $statement->execute();
            $rows = $statement->fetchAll(); 
            $statement->closeCursor();   
            $transcripts = array();
            foreach ($rows as $row) {
                $transcript = new Transcripts(); 
                $transcript->setTerm($row['Term']);
                $transcript->setCourseNo($row['CourseNo']); 
                $transcript->setTitle($row['Title']);
                $transcript->setInstructor($row['Instructor']); 
                $transcript->setDaystimes($row['DaysTimes']);
                $transcript->setCredits($row['Credits']); 
                $transcript->setLettergrade($row['LetterGrade']);
                $transcript->setGradepoints($row['Gradepoints']); 
                $transcripts[] = $transcript;
            }
            return $transcripts;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
        }
    }
}

