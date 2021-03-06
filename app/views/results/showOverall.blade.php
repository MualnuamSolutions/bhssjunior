    <table class="top-head">
        <tr>
            <td colspan="2" align="center">
                <h2>Overall Result</h2>
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
                <th><strong>Subjects</strong></th>
                <?php
                $schemesTotal = 0;
                $schemesDisplayFooter = [];
                $classTestMarkExists = [];
                $colSize = 0;
                ?>
                @foreach($resultConfigs as $config)
                <?php
                    $classTestMarkExists[$config->id] = \Mualnuam\ResultHelper::testMarkExists($academicSession->id, $config->assessment_id, $classRoom->id, null, $externalGroup->id);

                    if($classTestMarkExists[$config->id]) :
                        $colSize++;

                        $schemesTotal += $config->weightage;

                        $schemesDisplayFooter[] = $config->short_name . "(" . round($config->weightage) . "%)";
                ?>
                <th><b>{{ $config->short_name }}<br>{{ round($config->weightage) }}%</b></th>
                <?php endif; ?>

                @endforeach
                <th><b>Overall<br>{{ $schemesTotal }}%</b></th>
                <th><b>Total</b></th>
            </tr>
        </thead>
        <tbody>

            <?php
            $total_full_mark = [];
            $total_mark = [];
            $total_cumulated = [];
            $total_overall_mark = 0;
            $total_overall_full_mark = 0;
            $subjectOverall = 0;
            $subjectOverallTotal = 0;
            $subjectTotalTotal = 0;
            $colWidth =  52 / ($colSize+1) . "%";
            ?>

            @foreach($classRoom->subjects as $subject)
            <?php
            $subjectOverall = 0;
            $subjectTestMarkExists = [];
            ?>
            <tr>
                <td width="33%">{{ strtoupper($subject->name) }}</td>
                @foreach($resultConfigs as $config)
                <?php
                $tests = \Mualnuam\ResultHelper::studentSubjectTest($student->id, $subject->id, $classRoom->id, $config->assessment_id, $academicSession->id, $config, $externalGroup->id);
                
                $total_overall_mark += $tests['total_of_marks'];
                $total_overall_full_mark += $tests['total_of_full_marks'];

                if($classTestMarkExists[$config->id]) :

                    $mark = ($subject->type == 'Half Paper' ? $tests['cumulated']/2 : $tests['cumulated']);

                    if( isset($total_full_mark[$config->id]) )
                        $total_full_mark[$config->id] += $tests['total_of_full_marks'];
                    else
                        $total_full_mark[$config->id] = $tests['total_of_full_marks'];
                    
                    if( isset($total_mark[$config->id]) )
                        $total_mark[$config->id] += $tests['total_of_marks'];
                    else
                        $total_mark[$config->id] = $tests['total_of_marks'];
                    
                    if( isset($total_cumulated[$config->id]) )
                        $total_cumulated[$config->id] += $mark;
                    else
                        $total_cumulated[$config->id] = $mark;

                    $subjectOverall += $mark;
                ?>
                <td width="{{ $colWidth }}">{{ round($mark, 2) }}</td>
                <?php endif; ?>
                
                @endforeach
                <?php
                    $subjectTotal = $subject->type == 'Half Paper' ? 50 : 100;
                    $subjectTotalTotal += $subjectTotal;
                ?>
                <td width="{{ $colWidth }}">{{ round($subjectOverall, 2) }}</td>
                <td width="8%">{{ $subjectTotal }}</td>
            </tr>
            @endforeach

            <tr>
                <td align="right">Total</td>
                @foreach($resultConfigs as $config)
                <?php if($classTestMarkExists[$config->id]) :
                    $subjectOverallTotal += $total_cumulated[$config->id];
                ?>
                <td>{{ round($total_cumulated[$config->id], 2) }}</td>
                <?php endif; ?>
                @endforeach
                
                <td>{{ round($subjectOverallTotal, 2) }}</td>
                <td>{{ $subjectTotalTotal }}</td>
            </tr>
            <?php $overallTotal = $subjectOverallTotal; ?>
            <?php $subjectOverallTotal = 0; ?>
            <tr>
                <td align="right">Percentage</td>
                @foreach($resultConfigs as $config)
                <?php
                if($classTestMarkExists[$config->id]) :
                    $percentage = $total_full_mark[$config->id] ? round(($total_mark[$config->id] / $total_full_mark[$config->id]) * 100, 2) : 0;
                    $total = ($config->weightage / 100 ) * $percentage;
                    $subjectOverallTotal += $total;
                ?>
                <td>{{ $total }}</td>
                <?php endif; ?>
                @endforeach
                <?php $percentage = ($overallTotal / $subjectTotalTotal ) * 100; ?>
                <td>{{ round($percentage, 2) }}</td>
                <td></td>
            </tr>
            <tr>
                <td align="right">Rank</td>
                @foreach($resultConfigs as $config)
                @if($classTestMarkExists[$config->id])
                <td class="rank-{{ $config->id }}-{{ $student->id }}"></td>
                @endif
                @endforeach
                <td class="rank-{{ $student->id }}"></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <table class="footer" width="80%">
        <tbody>
            <tr>
                <th colspan="4"><b>Summary</b></th>
            </tr>
            <tr>
                <td width="25%">Percentage</td>
                <td width="25%" class="summary-percentage">{{ round($percentage, 2) }}</td>
                <td width="25%">Class Average</td>
                <td width="25%" class="class-average"></td>                
            </tr>
            <tr>
                <td width="25%">Grade</td>
                <td width="25%">{{ \Mualnuam\ResultHelper::grade( (round(($subjectOverallTotal / $schemesTotal) * 100, 2)/10), $resultConfig ) }}</td>
                <td width="25%">Class Highest</td>
                <td width="25%" class="class-highest"></td>
            </tr>
            <tr>
                <td width="25%">Rank</td>
                <td width="25%" class="rank-{{ $student->id }}"></td>
                <td width="25%">Percentile Rank</td>
                <td width="25%" class="percentile-{{ $student->id }}"></td>
            </tr>
        </tbody>
    </table>

    <table class="info">
        <tr>
            <td width="50%" align="center">
                @if($classRoom->classTeacher1)

                <div style="width:100%;height:40px">
                    @if($classRoom->classTeacher1 && $classRoom->classTeacher1->signature && file_exists(public_path($classRoom->classTeacher1->signature)))
                    {{ $classRoom->classTeacher1 && $classRoom->classTeacher1->signature ? '<img src="' . asset($classRoom->classTeacher1->signature) . '" height="40px" alt="" />' :null }}
                    @endif
                </div>

                <div>({{ $classRoom->classTeacher1 ? strtoupper($classRoom->classTeacher1->name) : null }})</div>
                <div>Class Teacher</div>
                @endif
            </td>
            <td width="50%" align="center">
                @if($classRoom->classTeacher2)

                <div style="width:100%;height:40px">
                    @if($schoolHead && $schoolHead->signature && file_exists(public_path($schoolHead->signature)))
                    {{ $schoolHead && $schoolHead->signature ? '<img src="' . asset($schoolHead->signature) . '" height="40px" alt="" />' :null }}
                    @endif
                </div>

                <div>({{ $schoolHead ? strtoupper($schoolHead->name) : null }})</div>
                <div>{{ $schoolHeadDesignation }}</div>
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="2" valign="top">
                <p>
                    <br>For detailed tests reports go to <b>http://www.bhssjr.com/parents</b>.
                    <span>WEIGHTAGE SCHEME: {{ implode(' + ', $schemesDisplayFooter) }} = OVERALL({{ $schemesTotal }}%)</span>
                </p>
            </td>
        </tr>
    </table>
