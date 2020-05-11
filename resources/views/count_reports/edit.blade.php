@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Count Report
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($countReport, ['route' => ['countReports.update', $countReport->id], 'method' => 'patch']) !!}

                        @include('count_reports.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection