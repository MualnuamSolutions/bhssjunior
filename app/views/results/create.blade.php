@extends('print')

@section('content')

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
            console.log(result.classHighest);
            $('.class-highest').text(result.classHighest + '%');
            $('.class-average').text(result.classAverage + '%');

            $.each(result.topTen, function(key, data){
                $('.rank_' + data['student_id']).html(rank(parseInt(key+1)));
            });

            $('.lightbox-loader').hide();

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