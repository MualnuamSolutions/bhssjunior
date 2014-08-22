<div class="row">
    <div class="small-12 columns">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Test Name</th>
                    <th>Test Date</th>
                    <th>Total Mark</th>
                    <th>Mark</th>
                    <th>Teacher</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marks as $key => $mark)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $mark->test_name }}{{ $mark->name ? ' (' . $mark->name . ')' : null }}</td>
                    <td>{{ date('d/m/Y', strtotime($mark->exam_date)) }}</td>
                    <td>{{ $mark->totalmarks}}</td>
                    <td>{{ $mark->mark}}</td>
                    <td>{{ $mark->teacher_name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>