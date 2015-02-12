@extends('print')

@section('content')

<p class="center">
    @if($logged_user->hasAccess('idcards.print'))
    <button onclick="window.print();" class="print-button" style="display:inline-block">PRINT</button>
    @endif
    <button onclick="window.close();" class="close-button" style="display:inline-block">CLOSE</button>
</p>

<div class="idcard-container">
    @foreach($students as $student)
    <div class="card">
        <div class="front">
            <div class="header">
                <img src="{{ asset('images/logo.jpg') }}" height="50px" width="auto" alt="" class="logo fr"/>
                <p class="school">{{ Option::data('school_name', 'SCHOOL NAME') }}</p>
            </div>
            <div class="title">IDENTITY CARD</div>
            <div class="content">
                @if($student->path)
                <img src="http://www.bhssjr.com/{{ $student->path }}" height="100px" width="auto" alt="" class="fl"/>
                @endif
                <table>
                    <tbody>
                        <tr>
                            <th>Name:</th>
                            <td><b>{{ $student->name }}</b></td>
                        </tr>
                        <tr>
                            <th>Reg. No:</th>
                            <td>{{ $student->regno }}</td>
                        </tr>
                        <tr>
                            <th>DOB:</th>
                            <td>{{ date('d/m/Y', strtotime($student->dob)) }}</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>{{ $student->address}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="back">
            <div class="terms">
                <ol>
                    <li>This card is the property of {{ ucwords(strtolower(strip_tags(Option::data('school_name', 'SCHOOL NAME')))) }}</li>
                    <li>Transfer of this card to another person is a not permitted.</li>
                    <li>Loss will be reported immediately to authority.</li>
                </ol>
            </div>
            <div class="parents">
                <p>Father's Name: {{ $student->father }}</p>
                <p>Contact: {{ $student->contact1 }}</p>
            </div>

            <div class="signature">Signature of issuing authority</div>
        </div>
    </div>
    @endforeach
</div>

@stop

@section('scripts')
<script>
$(function(){
    @if($action == 'print')
    window.print();
    setTimeout("window.close()", 1);
    @endif
});
</script>
@stop