<div class="row">
    <div class="small-12 medium-3 columns">
        <div class="photo">
            {{ $student->photo ? '<img src="{{ asset($student->photo->path) }}" />' : null }}
        </div>
    </div>

    <div class="small-12 medium-9 columns">
        <div class="row">
            <div class="small-12 medium-12 large-6 columns">
                <table class="profile">
                    <tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <th>Registration No</th>
                            <td>{{ $student->regno }}</td>
                        </tr>
                        <tr>
                            <th>Class</th>
                            <td>{{ $student->class }}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>{{ date('d M Y', strtotime($student->dob)) }}</td>
                        </tr>
                        <tr>
                            <th>Height</th>
                            <td>{{ print_r($student->measurement->height) }}</td>
                        </tr>
                        <tr>
                            <th>Weight</th>
                            <td>{{ print_r($student->measurement->weight) }} {{ ucfirst(Option::data('weight_unit', 'kg')) }}</td>
                        </tr>
                    </tr>
                </table>
            </div>
            <div class="small-12 medium-12 large-6 columns">
                <table class="profile">
                    <tr>
                        <tr>
                            <th>Father</th>
                            <td>{{ $student->father }}</td>
                        </tr>
                        <tr>
                            <th>Mother</th>
                            <td>{{ $student->mother }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $student->address }}</td>
                        </tr>
                        <tr>
                            <th>Primary Contact</th>
                            <td>{{ $student->contact1 }}</td>
                        </tr>
                        <tr>
                            <th>Alternate Contact</th>
                            <td>{{ $student->contact2 }}</td>
                        </tr>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>