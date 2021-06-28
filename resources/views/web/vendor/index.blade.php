@extends('layouts.vertical-2-master')

@section('title', 'Proyek Monitoring')
@section('headerStyle')
     <!-- DataTables -->
        <link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('sidebarPortion')
      <li class="leftbar-menu-item">
                    <a href="javascript: void(0);" >
                        <i data-feather="monitor" class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
                        <span>Dashboard</span>
                        {{-- <span class="menu-arrow">
                            <i class="mdi mdi-chevron-right"></i>
                        </span> --}}
                    </a>
                    {{-- <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="/vertical-2/analytics-index"><i class="ti-control-record"></i>Analytics</a></li>
                        <li class="nav-item"><a class="nav-link" href="/vertical-2/crypto-index"><i class="ti-control-record"></i>Crypto</a></li>
                        <li class="nav-item"><a class="nav-link" href="/vertical-2/crm-index"><i class="ti-control-record"></i>CRM</a></li>
                        <li class="nav-item"><a class="nav-link" href="/vertical-2/projects-index"><i class="ti-control-record"></i>Project</a></li>
                        <li class="nav-item"><a class="nav-link" href="/vertical-2/ecommerce-index"><i class="ti-control-record"></i>Ecommerce</a></li>
                        <li class="nav-item"><a class="nav-link" href="/vertical-2/helpdesk-index"><i class="ti-control-record"></i>Helpdesk</a></li>
                        <li class="nav-item"><a class="nav-link" href="/vertical-2/hospital-index"><i class="ti-control-record"></i>Hospital</a></li> 
                    </ul> --}}
                </li>
@stop

@section('content')
   <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                             @component('common-components.breadcrumb')
                                 @slot('title') List Vendor @endslot
                                 @slot('item1') Home @endslot
                                 @slot('item2')  @endslot
                                 @endcomponent

                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">    
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Kode Vendor</th>
                                            <th>Alamat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $item)
                                            <tr>
                                                <td>{{$item->nama}}</td>
                                                <td>{{$item->kode_vendor}}</td>
                                                <td>{{$item->alamat}}</td>
                                            </tr>
                                            @empty
                                                
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div><!-- container -->
@stop
@section('footerScript')
  <!-- Required datatable js -->
         <script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
         <script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
         <!-- Buttons examples -->
         <script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js')}}"></script>
         <script src="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
         <script src="{{ URL::asset('plugins/datatables/jszip.min.js')}}"></script>
         <script src="{{ URL::asset('plugins/datatables/pdfmake.min.js')}}"></script>
         <script src="{{ URL::asset('plugins/datatables/vfs_fonts.js')}}"></script>
         <script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js')}}"></script>
         <script src="{{ URL::asset('plugins/datatables/buttons.print.min.js')}}"></script>
         <script src="{{ URL::asset('plugins/datatables/buttons.colVis.min.js')}}"></script>
         <!-- Responsive examples -->
         <script src="{{ URL::asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
         <script src="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
         <script src="{{ URL::asset('assets/pages/jquery.datatable.init.js')}}"></script>      
@stop