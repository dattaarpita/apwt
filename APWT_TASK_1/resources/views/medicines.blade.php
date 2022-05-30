@extends('layouts.app')
@section('content')
<br>
<h4>Medicine List</h4>
@foreach($med1 as $f1=>$fd)
<p>
{{$f1.' -> '.$fd}}
</p>
@endforeach
<br>
@foreach($med2 as $f2=>$bd)
<p>
{{$f2.'->'.$bd}}
</p>
@endforeach
<br>
@foreach($med3 as $f3=>$cd)
<p>
{{$f3.'->'.$cd}}
</p>
@endforeach
<br>
@foreach($med4 as $f4=>$a)
<p>{{$f4.'->'.$a}}</p>

@endforeach
<br>
@foreach($med5 as $f5=>$b)
<p>{{$f5.'->'.$b}}</p>
@endforeach
<br>
@foreach($med6 as $f6=>$c)
<p>{{$f6 .'->'.$c}}</p>
@endforeach

@endsection