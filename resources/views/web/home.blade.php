@extends('layouts.vertical-2-master')

@section('title', 'Proyek Monitoring')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                 @component('common-components.breadcrumb')
                     @slot('title') Dashboard @endslot
                     @slot('item1')  @endslot
                     @slot('item2') @endslot
                     @endcomponent

            </div><!--end col-->
        </div>
        <!--end row-->
        <!-- end page title end breadcrumb -->

        {{-- content --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="jumbotron mb-0 bg-light">
                            <h1 class="display-4">Selamat Datang!</h1>
                            {{-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> --}}
                            <hr class="my-4">
                            {{-- <p>It uses utility classes for typography and spacing to space content out within the larger container.</p> --}}
                            {{-- <a class="btn btn-gradient-primary btn-lg" href="#" role="button">Learn more</a> --}}
                        </div>
                    </div><!--end card-body-->    
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!-- container -->
@stop
