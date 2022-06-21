@extends('template.navbar')
@section('content')
<div class="row">
<div class="col-md-8 col-lg-8 col-sm-12 col-xs-8 col-12">
<table>
    <tr>
        <th colspan="2">ID</th>
    <th>Vorname</th>

    <th colspan="2">Personen&nbsp;</th>
    <th>Kam Aus</th>

    </tr>
@foreach($datesforconversation as $l)

<tr>
    <td>{{$l->id}}<td>
    <td>{{$l->name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>{{$l->count}}&nbsp;<td>
        <td>@if($l->campaign != null){{$l->campaign->name}}
        @else Eingetragen @endif</td>
        @php
            $leadss = $l->id * 1244;
            $leadId = \Illuminate\Support\Facades\Crypt::encrypt($leadss);
        @endphp

       <td><a href="{{route('alead',$leadId)}}" class="btn text-light" style="background-color: #4D3FD3;">Join</a><td>

</tr>
@endforeach
</table>
@if($datesforconversation->count() > 1)
    <div class="d-flex justify-content-center mt-4"><nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        @if($datesforconversation->currentPage() > 1)
        <span> <a href="{{route('dates',['page' => $datesforconversation->currentPage() -1])}}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"></span>
        « Vorherige
            @endif

                </span> <a href="{{route('dates',['page' => $datesforconversation->currentPage() +1 ,])}}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Nächste »
                </a></div> <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"><div><p class="text-sm text-gray-700 leading-5">

                </p></div> <div></div></div></nav>
                @endif
</div>
</div>
@endsection
