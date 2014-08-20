@extends('print')

@section('content')

<div class="results-container">
</div>

<div class="lightbox-loader">
    <span>
        <img src="{{ asset('images/loader.gif') }}" /><br>Generating results, please wait.<br>
        <p></p>
    </span>
</div>

@stop

@section('scripts')
<script>
var totalStudents = {{ $students->count() }};
$(function(){
   @foreach($students as $student)
   $.ajax({
        url: '{{ route('results.show', $student->id) }}}',
        type: 'get',
        data: 'academic_session={{ $academicSession->id }}&assessment={{ $assessment->id }}'
   })
   .done(function(result){
        $('.results-container').append(result);
        $('.lightbox-loader span p').append("+");
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