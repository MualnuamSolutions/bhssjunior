@extends('print')

@section('content')

<p class="center">
    @if($logged_user->hasAccess('printResult'))
    <button onclick="window.print();" class="print-button">PRINT</button>
    @endif
    <button onclick="window.close();" class="close-button">CLOSE</button>
</p>

<div style="margin: 0 auto;width:148mm;">
    <div class="results-container {{ !$logged_user->hasAccess('printResult') ? 'print-hide':'' }}">
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
    var numberofStudents = {{ $students->count() }};
    var counter = 0;
    @foreach($students as $student)
    
    jQuery.ajax({
        url: '{{ route('results.overall', $student->id) }}',
        type: 'get',
        data: 'action=overall&academic_session={{ $academicSession->id }}'
    })
    .done(function(result){
        counter++;
        $('.results-container').append(result);
        meterLength = (counter/totalStudents) * 100;
        $('.lightbox-loader .progress .notice b').text(Math.floor(meterLength) + '%');
        $('.lightbox-loader .progress .meter').stop().animate({width: meterLength + '%'}, 1000, 'swing');
        if(counter == numberofStudents)
            closeLightbox();
    });
    @endforeach
});

function closeLightbox()
{
    var completed = $('.results-container .assessment-result').size();
    if(totalStudents == completed) {

        @foreach($resultConfigs as $config)
        @if(\Mualnuam\ResultHelper::testMarkExists($academicSession->id, $config->assessment_id, $class->id, null, $externalGroup->id))
            $.ajaxQueue({
                url: "{{ route('results.overview', $class->id) }}",
                type: 'get',
                dataType: 'json',
                data: "assessment={{ $config->assessment_id }}&academic_session={{ $academicSession->id }}"
            })
            .done(function(result){
                $('.class-highest-{{ $config->assessment_id }}').text(result.classHighest + '%');
                $('.class-average-{{ $config->assessment_id }}').text(result.classAverage + '%');

                $.each(result.topTen, function(key, data){
                    $.each(data, function(subkey, item) {
                        $('.rank-{{ $config->assessment_id }}-' + item['student_id']).html(rank(parseInt(key)));
                    });
                });
            });
        @endif
        @endforeach

        $.ajaxQueue({
            url: "{{ route('results.overview', $class->id) }}",
            type: 'get',
            dataType: 'json',
            data: "academic_session={{ $academicSession->id }}"
        })
        .done(function(result){
            $('.class-highest').text(result.classHighest + '%');
            $('.class-average').text(result.classAverage + '%');
            
            $.each(result.topTen, function(key, data){
                $.each(data, function(subkey, item) {
                    $('.rank-' + item['student_id']).html(rank(parseInt(key)));
                });
            });
            
            $.each(result.percentileRanks, function(key, data){
                $('.percentile-' + key).html(data);
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

</script>
@stop