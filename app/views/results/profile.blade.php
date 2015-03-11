    <table class="top-head">
        <tr>
            <td colspan="2" align="center">
                <h2>PERSONAL PROFILE</h2>
                <p>
                    @if(isset($student->path) && $student->path)
                    <img src="http://www.bhssjr.com/{{ $student->path }}" height="100px" width="auto" alt="{{ $student->name }}" style="height:130px;" />
                    @endif
                </p>
            </td>
        </tr>
    </table>

    <table class="data profile">
        <tbody>
            <tr>
                <th>NAME</th>
                <td>{{ strtoupper($student->name) }}</td>
            </tr>
            <tr>
                <th>REGISTRATION NO</th>
                <td>{{ $student->regno }}</td>
            </tr>
            <tr>
                <th>GENDER</th>
                <td>{{ $student->gender }}</td>
            </tr>
            <tr>
                <th>DATE OF BIRTH</th>
                <td>{{ date('d M Y', strtotime($student->dob)) }}</td>
            </tr>
            <tr>
                <th>CLASS</th>
                <td>{{ $student->class_room_name }}</td>
            </tr>
            <tr>
                <th>ROLL NO</th>
                <td>{{ $student->roll_no }}</td>
            </tr>
            <tr>
                <th>FATHER'S NAME</th>
                <td>{{ $student->father }}</td>
            </tr>
            <tr>
                <th>MOTHER'S NAME</th>
                <td>{{ $student->mother }}</td>
            </tr>
            <tr>
                <th>CONTACT</th>
                <td>{{ $student->contact1 }}</td>
            </tr>
            <tr>
                <th>ADDRESS</th>
                <td>{{ $student->address }}</td>
            </tr>
            <tr>
                <th>PHYSICAL MEASUREMENTS</th>
                <td>
                    <table>
                        <thead>
                            <tr>
                                <th>DATE</th>
                                <th>HEIGHT</th>
                                <th>WEIGHT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($measurements as $measurement)
                            <tr>
                                <td>{{ date('d/m/Y', strtotime($measurement->created_at)) }}</td>
                                <td>{{ $measurement->height }}</td>
                                <td>{{ $measurement->weight }} Kg</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <th>HOUSE</th>
                <td>{{ $student->house }}</td>
            </tr>
            <tr>
                <th>SESSION</th>
                <td>{{ $student->start . ' - ' . $student->end }}</td>
            </tr>
        </tbody>
    </table>

    <table class="info">
        <tr>
           <td width="50%"></td>
            <td width="50%">
                <div class="center" style="margin-top:5mm">
                    <img height="40px" src="http://www.bhssjr.com/{{ $schoolHead->signature }}">
                </div>
                <div class="center">{{ strtoupper($schoolHead->name) }}</div>
                <div class="center">({{ $schoolHeadDesignation }})</div>
           </td>
        </tr>
    </table>
