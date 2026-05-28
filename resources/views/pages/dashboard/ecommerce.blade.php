@extends('layouts.app')

@section('content')
  <div class="grid grid-cols-12 gap-4 md:gap-6">

    


    <div class="col-span-12 ">
      <x-ecommerce.statistics-chart :monthlyData="$monthlyData"/>
    </div>

    <div class="col-span-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach($recent as $com)
            <x-ecommerce.customer-demographic :com="$com" />
        @endforeach
    </div>
</div>



  </div>
@endsection