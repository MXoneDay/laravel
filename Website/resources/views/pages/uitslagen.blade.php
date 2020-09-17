@extends('layouts.app')

@section('content')
    <!-- https://projects.invisionapp.com/share/STVT43I2ZFD#/screens/403288054 -->
    <section>
      <div class="container">
        <h1> Standings </h1>
        <button onclick="show1()" primary> Drivers </button>
        <button onclick="show2()" primary> Teams </button>
        <button onclick="show3()" primary> Uitgebreid </button>
      </div>
      <div class="container">
        <h1> Grafieken </h1>
        <button onclick="show4()" primary> Drivers </button>
        <button onclick="show5()" primary> Teams </button>
      </div>
    </section>

    <section>
      <div class="container" id="result-content">
        <div id="drivers-standing"> @include('components.results.drivers_standing') </div>
        <div id="constructors-standing"> @include('components.results.constructors_standing') </div>
        <div id="detailed-standing"> @include('components.results.detailed_drivers_standing') </div>
        <div id="drivers-chart"> @include('components.results.drivers_linechart') </div>
        <div id="constructors-chart"> @include('components.results.constructors_linechart') </div>
      </div>
    </section>
@endsection

<script>
  /* TMP het idee is er nu nog ff netjes */
  function show1()
  {
      document.getElementById('drivers-standing').style.display='inline-block';
      document.getElementById('constructors-standing').style.display='none';
      document.getElementById('detailed-standing').style.display='none';
      document.getElementById('drivers-chart').style.display='none';
      document.getElementById('constructors-chart').style.display='none';
  }

  function show2()
  {
      document.getElementById('drivers-standing').style.display='none';
      document.getElementById('constructors-standing').style.display='inline-block';
      document.getElementById('detailed-standing').style.display='none';
      document.getElementById('drivers-chart').style.display='none';
      document.getElementById('constructors-chart').style.display='none';
  }

  function show3()
  {
      document.getElementById('drivers-standing').style.display='none';
      document.getElementById('constructors-standing').style.display='none';
      document.getElementById('detailed-standing').style.display='inline-block';
      document.getElementById('drivers-chart').style.display='none';
      document.getElementById('constructors-chart').style.display='none';
  }

  function show4()
  {
      document.getElementById('drivers-standing').style.display='none';
      document.getElementById('constructors-standing').style.display='none';
      document.getElementById('detailed-standing').style.display='none';
      document.getElementById('drivers-chart').style.display='inline-block';
      document.getElementById('constructors-chart').style.display='none';
  }

  function show5()
  {
      document.getElementById('drivers-standing').style.display='none';
      document.getElementById('constructors-standing').style.display='none';
      document.getElementById('detailed-standing').style.display='none';
      document.getElementById('drivers-chart').style.display='none';
      document.getElementById('constructors-chart').style.display='inline-block';
  }
</script>


{{-- @if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['driver_table']))
{
  @include('components.results.constructors_standing');
}
elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['team_table']))
{
  include ('components.results.constructors_standing');
}
elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['detailed_table'])){
  include ('components.results.constructors_standing');
}
elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['driver_graph']))
{
  include ('components.results.constructors_standing');
}                        
elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['team_graph']))
{
  include ('components.results.constructors_standing');
}
else{
    include ('components.results.constructors_standing');
} --}}

