<?php 
    //File name: payment.php
    //set default value of variables for initial load  
    if (!isset($amount_paid)) { $amount_paid = ''; }  
    if (!isset($amount_due)) { $amount_due = ''; }
?> 

<?php include 'view/header_student.php'; ?>
<?php include 'view/column_left_student.php'; ?>

<section>
    
        <h2>Course Payment</h2>
            <?php if (!empty($error_message)) { ?>
                <p class="error_message"><?php echo htmlspecialchars($error_message); ?></p>
            <?php } ?>
            <?php if (count($cost_list) == 0) : ?>
                <p class="error_message">There is no selection.</p>
            <?php else: ?>

            <h3>Student Name: <?php echo $student->getFirstName(); ?> <?php echo $student->getLastName(); ?></h3> 
            <h3>Courses Selected</h3>
            <table border="1px, solid, black">
                <tr>
                    <th>Course</th>
                    <th>Title</th>
                    <th>Amount Due</th>
                </tr>
                <?php foreach ($cost_list as $cost): ?>
                <tr>
                    <td><?php echo $cost['CourseNo']; ?></td>
                    <td><?php echo $cost['Title']; ?></td>
                    <td style="text-align:right"><?php echo $cost['Cost']; ?></td>
                </tr>
                <?php $amount_due += $cost['Cost']; ?>
                <?php endforeach; ?>
                <tr>
                    <td>Total Due</td>
                    <td>&nbsp;</td>
                    <td style="text-align:right"><?php echo $amount_due; ?></td>
                </tr>   
            </table>
        
            <br>
                <form action="index.php" method="post">
                <input type="hidden" name="action" value="Charge" 
                <label >Student ID:</label>
                <input type="text" name="student_id" style="text-align:right" readonly
                       value="<?php echo $student->getStudentID(); ?>"><br>
                <label>Amount paid:</label>
                <input type="text" name="amount_paid" style="text-align:right"
                       value="<?php echo htmlspecialchars($amount_paid); ?>"><br>
                <label>Credit Card Number:</label>
                <input type="text" name="credit_card_number" style="text-align:right" readonly
                       value="<?php echo $student->getCreditCard(); ?>"><br><br>
                <label>&nbsp;</label>
                <input type="submit" value="Submit"><br>                
            </form>
        <?php endif; ?>
</section>

<?php include 'view/footer.php'; ?>



 