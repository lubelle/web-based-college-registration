<?php
class FinancialDB {
    public static function addPayment($onePayment){
        $db = Database::getDB();       
        $student_id = $onePayment->getStudentID();
        $payment = $onePayment->getPayment();
        $paymentDate = $onePayment->getPaymentDate();
        try {
            $query = 'insert into financial_ (StudentID, Payment, PaymentDate) values (:student_id, :payment, :paymentDate)';
            $statement = $db->prepare($query);
            $statement->bindValue(':student_id', $student_id);
            $statement->bindValue(':payment', $payment);
            $statement->bindValue(':paymentDate', $paymentDate);
            $result = $statement->execute();
            $statement->closeCursor();   
            return $onePayment;
        }
        catch (PDOException $e) {
            $error_message = $e->getMessage();
        }
    }
    public static function getAllPayment($student_id){
        $db = Database::getDB();
        try {
            $query = 'select PaymentDate, Payment
                      from Financial_
                      where StudentID = ?
                      order by PaymentDate' ;
            $statement = $db->prepare($query);
            $statement->bindValue(1, $student_id);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            foreach ($rows as $row) {
                $payment = new Financial();
                $payment->setPaymentDate($row['PaymentDate']);
                $payment->setPayment($row['Payment']);
                $payments[] = $payment;
            }
            return $payments;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();    
        }
    }
}
?>
