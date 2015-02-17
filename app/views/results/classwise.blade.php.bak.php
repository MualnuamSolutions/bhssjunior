@extends('print')

@section('content')

<p class="center">
    <button onclick="window.print();" class="print-button">PRINT</button>
    <button onclick="window.close();" class="close-button">CLOSE</button>
</p>

<div class="test-result classwise-result">
    <table class="logo-head">
        <tr>
            <td colspan="2" align="center">
                <img src="{{ asset('images/logo.jpg') }}" alt=""/>
                <h3>BAPTIST HIGHER SECONDARY SCHOOL JUNIOR SECTION</h3>
                <h1>CLASS RESULTS OVERVIEW</h1>
            </td>
        </tr>
        <tr>
            <td><hr/></td>
        </tr>
    </table>

    <table class="header">
        <tr>
            <td width="60%"><b>Academic Session</b>: {{ $academicSession->start . ' - ' . $academicSession->end }}</td>
            <td width="45%"><b>Class</b>: {{ $class->name }}</td>
        </tr>
        <tr>
            <td><b>Assessment</b>: {{ $assessment->short_name }}</td>
            <td><b>Weightage</b>: {{ $resultConfig->weightage }}%</td>
        </tr>
    </table>

    <div class="row">
        <div class="data-head">
            <table>
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="30%">Name</th>
                        <th width="15%">Mark</th>
                        <th width="15%">Percentage</th>
                        <th width="10%">Grade</th>
                        <th width="10%">{{ $assessment->short_name }}</b></th>
                        <th width="10%">Rank</th>                    
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="row classwise-data">
        @foreach($students as $student)
        <div class="data-row" id="row-{{$student->id}}"></div>
        @endforeach
    </div>

    <div class="signature">
        <p>({{ strtoupper($class->classTeacher1->name) }})</p>
    </div>
</div>

<div class="lightbox-loader">
    <p class="progress">
        <span class="meter"></span>
        <span class="notice">Generating Results. Please Wait - <b></b></span>
    </p>
</div>

@stop

@section('scripts')
<script>
var totalStudents = {{ $students->count() }};
var counter = 0;
$(function(){
    @foreach($students as $student)
    jQuery.ajax({
        url: '{{ route('results.show', $student->id) }}',
        type: 'get',
        data: 'action=classwise&academic_session={{ $academicSession->id }}&assessment={{ $assessment->id }}'
    })
    .done(function(result){
        counter++;
        $('.classwise-data #row-{{$student->id}}').append(result);
        meterLength = (counter/totalStudents) * 100;
        $('.lightbox-loader .progress .notice b').text(Math.floor(meterLength) + '%');
        $('.lightbox-loader .progress .meter').stop().animate({width: meterLength + '%'}, 1000, 'swing');
        closeLightbox();
    });
    @endforeach
});

function closeLightbox()
{
    var completed = $('.classwise-data .data-row').size();
    if(totalStudents == completed) {

        $.ajaxQueue({
            url: "{{ route('results.overview', $class->id) }}",
            type: 'get',
            dataType: 'json',
            data: "academic_session={{ $academicSession->id }}&assessment={{ $assessment->id }}"
        })
        .done(function(result){
            // $('.class-highest').text(result.classHighest + '%');
            // $('.class-average').text(result.classAverage + '%');

            $.each(result.topTen, function(key, data){
                $.each(data, function(subkey, item) {
                    $('#student_' + item['student_id'] + ' .rank').html(rank(parseInt(key)));
                });
            });

            $('.lightbox-loader').hide();
            $('.print-button, .close-button').show();

            @if(Input::get('action') == 'print')
            window.print();
            setTimeout("window.close()", 1);
            @endif
        });
    }
}

function rank(rank)
{
    if(rank >= 4)
        return rank + "<sup>th</sup>";
    else if(rank == 3)
        return rank + "<sup>rd</sup>";
    else if(rank == 2)
        return rank + "<sup>nd</sup>";
    else if(rank == 1)
        return rank + "<sup>st</sup>";
}

</script>
@stop