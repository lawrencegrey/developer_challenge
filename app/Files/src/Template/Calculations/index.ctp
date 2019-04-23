<h1> Calculations </h1>

<table>
    <tr>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Calculation</th>
        <th>Results (# Of Days)</th>
        
    </tr>
  

    <?php foreach ($calculations as $calculation): ?>
    <tr>
        <td>
            <?= $calculation->startdate ?>
        </td>
        <td>
            <?= $calculation->enddate ?>
        </td>
        <td>
            <?= $calculation->calculation ?>
        </td>
        <td>
            <?= $calculation->days ?>
        </td>
       
    </tr>
    <?php endforeach; ?>
</table>