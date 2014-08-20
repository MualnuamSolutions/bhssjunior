@extends('print')

@section('content')

<div class="results-container">
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
        url: '{{ route('results.show', $student->id) }}}',
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
        $('.lightbox-loader').hide();
        window.print();
        setTimeout("window.close()", 1);
    }
}
</script>
@stop