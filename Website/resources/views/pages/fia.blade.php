@php 
use App\Http\Controllers\RacesController;
use App\Penalty; 
@endphp

@extends('layouts.app')

@section('content')
    <!-- Introduction-->
    @include('components.FIA.FIA_introduction')
    <!-- FIA Table -->
    @include('components.FIA.FIA_Table')
    <!-- Footer TODO -->

@endsection

<script>
    /* TMP het idee is er nu nog ff netjes */
    function show1()
    {
        document.getElementById('page-content').style.display='inline-block';
        document.getElementById('constructors-standing').style.display='none';

    }
  
    function show2()
    {
        document.getElementById('page-content').style.display='none';
        document.getElementById('constructors-standing').style.display='inline-block';
    }
</script>