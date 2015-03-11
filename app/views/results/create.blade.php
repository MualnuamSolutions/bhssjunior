@extends('print')

@section('content')

<p class="center print-button-wrapper">
    @if($logged_user->hasAccess('printResult'))
    <button onclick="window.print();" class="print-button">PRINT</button>
    @endif
    <button onclick="window.close();" class="close-button">CLOSE</button>
</p>

<div style="margin: 0 auto;width:148mm;">
    <div class="results-container {{ !$logged_user->hasAccess('printResult') ? 'print-hide':'' }}">
        @foreach($students as $student)
        <div class="assessment-result" id="row-{{ $student->id }}"></div>
        @endforeach
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
        data: 'academic_session={{ $academicSession->id }}&assessment={{ $assessment->id }}'
   })
   .done(function(result){
        counter++;
        $('.results-container #row-{{ $student->id }}').append(result);
        meterLength = (counter/totalStudents) * 100;
        $('.lightbox-loader .progress .notice b').text(Math.floor(meterLength) + '%');
        $('.lightbox-loader .progress .meter').stop().animate({width: meterLength + '%'}, 1000, 'swing');
        closeLightbox();
   });
   @endforeach
});

function closeLightbox()
{
    var completed = $('.results-container .assessment-result').size();
    if(totalStudents == completed) {

        $.ajaxQueue({
            url: "{{ route('results.overview', $class->id) }}",
            type: 'get',
            dataType: 'json',
            data: "action=overall&academic_session={{ $academicSession->id }}&assessment={{ $assessment->id }}"
        })
        .done(function(result){
            $('.class-highest').text(result.classHighest + '%');
            $('.class-average').text(result.classAverage + '%');

            $.each(result.topTen, function(key, data){
                $.each(data, function(subkey, item) {
                    $('.rank_' + item['student_id']).html(rank(parseInt(key)));
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

</script>
@stop