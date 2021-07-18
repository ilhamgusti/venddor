@extends('layouts.vertical-2-master')

@section('title', 'Proyek Monitoring')
@section('headerStyle')
    <!-- DataTables -->
    <link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                @component('common-components.breadcrumb')
                    @slot('title') Tahapan @endslot
                    @slot('item1') Home @endslot
                    {{-- @slot('item2')  @endslot --}}
                @endcomponent

            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nama Proyek</th>
                                    <th>Tanggal Pengerjaan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td>{!! getProyekName($item->proyek_id) !!}</td>
                                        <td>{!! getProyekDate($item->proyek_id) !!}</td>
                                        <td>{!! transformTahapanStatus($item->status) !!}</td>
                                        <td><a class="btn btn-primary waves-effect waves-light shadow-none"
                                                href={{ route('tahapan.show', ['tahapan' => $item->id]) }}>Detail</a></td>
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
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/pages/jquery.datatable.init.js') }}"></script>
@stop
