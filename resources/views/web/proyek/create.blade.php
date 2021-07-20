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
                    @slot('title') Create Proyek @endslot
                    @slot('item1') Home @endslot
                    {{-- @slot('item2')  @endslot --}}
                @endcomponent

            </div>
            <!--end col-->
        </div>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Proyek</h4>

                        <form action="{{ route('proyek.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-right">Nama
                                            Proyek</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="nama_proyek" type="text"
                                                value="{{-- $data->nama_proyek --}}" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-sm-2 col-form-label text-right">Tanggal
                                            Pengerjaan</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="tanggal_pengerjaan" type="date"
                                                value="{{-- $data->tanggal_pengerjaan --}}" id="example-email-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="estimasi" class="col-sm-2 col-form-label text-right">Estimasi</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input id="estimasi" type="number" name="estimasi"
                                                    value="{{-- $data->estimasi --}}" class="form-control"
                                                    placeholder="Estimasi hari" aria-label="Estimasi...">
                                                <span class="input-group-append">
                                                    <button disabled
                                                        class=" disabled btn btn-sm btn-secondary pointer-event-none shadow-none"
                                                        type="button">Hari</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row d-none">
                                        <label for="example-password-input"
                                            class="col-sm-2 col-form-label text-right">Status</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="hunter2"
                                                id="example-password-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="timeline" class="col-sm-2 col-form-label text-right">File Timesheet</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file"><input class="custom-file-input" type="file"
                                                    value="{{-- $data->file_url --}}" name="file_url" id="timeline"><label
                                                    class="custom-file-label shadow-none border-none">{{-- $data->file_url --}}
                                                    Choose File</label></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right">Select Vendor</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="vendor_id">
                                                <option>Select</option>
                                                @foreach ($vendors as $vendor)
                                                    <option value="{{ $vendor->id }}">{{ $vendor->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-right">Remarks
                                        </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="remarks" type="text"
                                                value="{{-- $data->nama_proyek --}}" id="example-text-input"> </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit"
                                    class="btn btn-success waves-effect waves-light shadow-none">Save</button>
                                <button class="btn btn-error waves-effect waves-light shadow-none">Cancel</button>
                            </div>
                    </div>
                    <!--end card-body-->
                    </form>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <!--end row-->

        <!--end row-->
        <!--end row-->
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
