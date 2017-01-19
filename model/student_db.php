<?php
class StudentDB {
    public static function getStudent($student_id){
        $db = Database::getDB();
        try {
            $query = 'select StudentID, PassCode, FirstName, LastName, CreditAmount, CreditCard
                      from student_ where StudentID = ?';
            $statement = $db->prepare($query);
            $statement->bindValue(1, $student_id);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
            $student = new Student($row['StudentID'],
                                   $row['PassCode'],
                                   $row['FirstName'],
                                   $row['LastName'],
                                   $row['CreditAmount'],
                                   $row['CreditCard']);       
            return $student; 
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
        }
    }
    public static function getSelectedCourses($term, $sid){
        $db = Database::getDB();
        try {
            $query = 'select FirstName, LastName, CreditCard, CourseNo, Title, Cost
                      from student_ s
                      inner join transcripts_ t on s.StudentID = t.StudentID
                      inner join course_ c on t.RegCode = c.RegCode
                      and c.Term = ?
                      and s.StudentID = ?';        
            $statement = $db->prepare($query);
            $statement->bindValue(1, $term);
            $statement->bindValue(2, $sid);
            $statement->execute();
            $result = $statement->fetchAll();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
        }
    }
}
?>