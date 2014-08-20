<div class="assessment-result">
    <table class="top-head">
        <tr>
            <td colspan="2" align="center">
                <h2>{{ strtoupper($assessment->name) }}</h2>
                <h4>{{ $academicSession->start . ' - ' . $academicSession->end }}</h4>
            </td>
        </tr>
    </table>

    <table class="header">
        <tr>
            <th width="25%" align="right"><b>Name:</b></th>
            <td>{{ $student->name }}</td>
            <th align="right"><b>Class:</b></th>
            <td>{{ $classRoom->name }}</td>
        </tr>
        <tr>
            <th align="right"><b>Registration No:</b></th>
            <td>{{ $student->regno }}</td>
            <th align="right"><b>Roll No:</b></th>
            <td>{{ $enrollment->roll_no }}</td>
        </tr>
    </table>

    <table class="data">
        <thead>
            <tr>
              <th><strong>SUBJECTS</strong></th>
              <th class="head1 verticalTableHeader"><b>No of Tests</b></th>
              <th class="head2 verticalTableHeader"><b>Total of Full Marks</b></th>
              <th class="head3 verticalTableHeader"><b>Total Marks</b></th>
              <th class="head4 verticalTableHeader"><b>Percentage of Marks</b></th>
              <th class="head5 verticalTableHeader"><b>Grade</b></th>
              <th class="head6 verticalTableHeader"><b>FA1 (25%)</b></th>
              <th class="head7 verticalTableHeader"><b>Subject Teacher</b></th>
            </tr>
        </thead>
        <tbody>

            <?php
            $total_tests = 0;
            $total_full_mark = 0;
            $total_mark = 0;
            ?>

            @foreach($classRoom->subjects as $subject)

            <?php
            $tests = \Mualnuam\ResultHelper::studentSubjectTest($student->id, $subject->id, $classRoom->id, $assessment->id, $academicSession->id, $resultConfig);
            $total_tests += $tests['count'];
            $total_full_mark += $tests['total_of_full_marks'];
            $total_mark += $tests['total_of_marks'];
            ?>

            <tr>
                <td width="35%">{{ strtoupper($subject->name) }}</td>
                <td width="7%">{{ $tests['count'] }}</td>
                <td width="7%">{{ $tests['total_of_full_marks'] }}</td>
                <td width="7%">{{ $tests['total_of_marks'] }}</td>
                <td width="7%">{{ $tests['percentage'] }}</td>
                <td width="7%">{{ $tests['grade'] }}</td>
                <td width="7%">{{ $tests['cumulated'] }}</td>
                <td width="23%">{{ $tests['teacher_name'] }}</td>
            </tr>

            @endforeach

            <tr>
                <td align="right">TOTAL</td>
                <td>{{ $total_tests }}</td>
                <td>{{ $total_full_mark }}</td>
                <td>{{ $total_mark }}</td>
                <td>{{ $percentage = round(($total_mark / $total_full_mark) * 100, 2) }}</td>
                <td>{{ \Mualnuam\ResultHelper::grade( ($total_mark/$total_tests), $resultConfig ) }}</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <table class="footer">
        <tbody>
            <tr>
                <th colspan="4">Class At Glance</th>
                <th colspan="4">{{ $student->name }}</th>
            </tr>
            <tr>
                <td colspan="3">Average %</td>
                <td>xx%</td>
                <td colspan="3">Overall %</td>
                <td>xx%</td>
            </tr>
            <tr>
                <td colspan="3">Highest in the Class</td>
                <td>xx%</td>
                <td colspan="3">Rank in the class</td>
                <td>x<sup>th</sup></td>
            </tr>
        </tbody>
    </table>

    <table class="info">
        <tr>
            <td width="60%">
                <span>{{ $assessment->short_name }} result is the product of number of class tests and assignments given throughout the year.
                For detailed tests reports go to <b>http://bhssjunior.mizobaptist.org/parents</b></span>
            </td>
            <td width="40%" align="center">
            ({{ $classRoom->classMaster ? strtoupper($classRoom->classMaster->name) : null }})<br>
            <br>
            Class Master
            </td>
        </tr>
    </table>
</div>