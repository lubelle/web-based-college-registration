<?php include '/../view/header_student.php'; ?>
<?php include '/../view/column_left_student.php'; ?>
        
<section>        

    <h2>Payment Results</h2>
    <h3>Thank you for your payment!</h3>        
    <table border="1px, solid, black">
        <tr>
            <td>Payment Amount </td>
            <td style="text-align: right"><?php echo $onePayment->getPaymentFormatted(); ?></td>
        </tr>
        <tr>
            <td>Student ID:</td>
            <td style="text-align: right"><?php echo $onePayment->getStudentID(); ?></td>
        </tr>
        <tr>
            <td>Date: </td>
            <td style="text-align: right"><?php echo $onePayment->getPaymentDate(); ?></td>
        </tr>
    </table>        

</section>      

<?php include '/../view/footer.php'; ?>
        

