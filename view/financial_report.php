<?php
    $total_cost ='';
    $total_payment = '';
?>
<?php include 'view/header_student.php'; ?>
<?php include 'view/column_left_student.php'; ?>

<section>
    
    <h2>Financial Report for <?php echo $student->getFirstName(); ?> <?php echo $student->getLastName(); ?></h2>
    
    <h3>Courses Taken</h3>
    <table border="1px,solid,black">
        <tr>
            <th>Term</th>
            <th>Course No</th>
            <th>Title</th>
            <th>Credits</th>
            <th>Cost</th>
        </tr>
        <?php foreach ($coursesTaken as $rec): ?>
        <tr>
            <td><?php echo $rec->getTerm(); ?></td>
            <td><?php echo $rec->getCourseNo(); ?></td>
            <td><?php echo $rec->getTitle(); ?></td>
            <td style="text-align: center"><?php echo $rec->getCredits(); ?></td>
            <td style="text-align: right"><?php echo '$' . number_format($rec->getCost(), 2); ?></td>
        </tr>
        <?php $total_cost += $rec->getCost(); ?>
        <?php endforeach; ?>
        <tr>
            <td colspan="4">Total Cost</td>
            <td style="text-align: right"><?php echo '$' . number_format($total_cost, 2); ?></td>
        </tr>   
    </table>
    <br>
    <h3>Payments Made</h3>
    <table border="1px,solid,black">
        <tr>
            <th>Date</th>
            <th>Payment</th>
        </tr>
        <?php foreach ($payments as $row): ?>
        <tr>
            <td><?php echo $row->getPaymentdate(); ?></td>
            <td style="text-align: right"><?php echo '$'.number_format($row->getPayment(), 2); ?></td>            
        </tr>
        <?php $total_payment += $row->getPayment(); ?>
        <?php endforeach; ?>
        <?php if ($total_cost >= $total_payment) {$due=$total_cost - $total_payment;}
              else {$due=0;}
        ?>
        <tr>
            <td>Balance Due</td>            
            <td style="text-align: right"><?php echo '$'.number_format($due,2) ?></td>
        </tr>   
    </table>
    
</section>

<?php include 'view/footer.php'; ?>
