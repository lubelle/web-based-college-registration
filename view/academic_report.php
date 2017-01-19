<?php 
    /********************************************************************
     * File name: academicreport.php
     *********************************************************************/
    //set default value of variables for initial load
$totalGradePoints = 0.0;
$loopCounter = 0;

?> 

<?php include 'view/header_student.php'; ?>
<?php include 'view/column_left_student.php'; ?>

<section>
        <h3>Academic Report for <?php echo $student->getFirstName(); ?> <?php echo $student->getLastName(); ?></h3>
            
        <?php if ($transcripts == NULL) : ?>
            <p class="error_message">There is no record.</p>
        <?php else: ?>           
            <table border="1, solid, black">
            <tr>
                <th>Term</th>
                <th>Course Number</th>  
                <th>Title</th>
                <th>Instructor</th>
                <th>Days/Times</th>
                <th>Credits</th>
                <th>Grade</th>
                <th>Grade Points</th>
            </tr>
                <?php foreach ($transcripts as $transcript): ?>
                <tr>
                    <td><?php echo $transcript->getTerm(); ?></td>
                    <td><?php echo $transcript->getCourseNo(); ?></td>
                    <td><?php echo $transcript->getTitle(); ?></td>
                    <td><?php echo $transcript->getInstructor(); ?></td>
                    <td><?php echo $transcript->getDaysTimes(); ?></td>
                    <td style="text-align:right"><?php echo $transcript->getCredits(); ?></td>
                    <td style="text-align:right"><?php echo $transcript->getLetterGrade(); ?></td>
                    <td style="text-align:right"><?php echo $transcript->getGradepoints(); ?></td>
                </tr>
                <?php $totalGradePoints += $transcript->getGradepoints(); ?>
                <?php $loopCounter++ ; ?>
                <?php endforeach; ?>
 
            </table>
            <br>
            <p>Cumulative GPA: 
            <?php if($loopCounter > 0) { ?>
                <span><?php echo $totalGradePoints/$loopCounter; ?></span>
            <?php } ?>
            </p>
        <?php endif; ?>
</section>

<?php include 'view/footer.php'; ?>
