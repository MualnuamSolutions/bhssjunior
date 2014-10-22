@extends('print')

@section('content')

<p class="center"><button onclick="window.print();" class="print-button">PRINT</button></p>

<div style="margin: 0 auto;width:148mm;">
    <div class="results-container">
    </div>
</div>

<div class="lightbox-loader">
    <span>
        Generating Results, Please Wait.<br>
        <p></p>
    </span>
</div>

@stop

@section('scripts')
<script>
var totalStudents = {{ $students->count() }};
$(function(){
   @foreach($students as $student)
   jQuery.ajaxQueue({
        url: '{{ route('results.show', $student->id) }}',
        type: 'get',
        data: 'academic_session={{ $academicSession->id }}&assessment={{ $assessment->id }}'
   })
   .done(function(result){
        $('.results-container').append(result);
        $('.lightbox-loader span p').append('<img height="12px" src="{{ asset('images/heart.png') }}" />');
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
            data: "academic_session={{ $academicSession->id }}&assessment={{ $assessment->id }}"
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

            @if(Input::get('action') == 'print')
            window.print();
            setTimeout("window.close()", 1);
            @endif
        });
    }
}

</script>
@stop