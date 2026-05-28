@extends('layouts.app')

@section('content')
  <div class="grid grid-cols-12 gap-4 md:gap-6">

    
    <div class="col-span-12">
     <x-ecommerce.ecommerce-metrics 
    :total="$total" 
    :pending="$pending" 
    :inProgress="$inProgress" 
    :resolved="$resolved" 
/>
    </div>






    <div class="col-span-12 ">
     
<x-ecommerce.recent-orders :recent="$recent" />
    </div>

  </div>
@endsection