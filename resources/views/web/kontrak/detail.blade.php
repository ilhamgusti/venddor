@extends('layouts.vertical-2-master')

@section('title', 'Proyek Monitoring')
@section('headerStyle')
    <!-- DataTables -->
    <link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('sidebarPortion')
    <li class="leftbar-menu-item">
        <a href="javascript: void(0);">
            <i data-feather="monitor" class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
            <span>Dashboard</span>
        </a>
    </li>
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

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Nama
                                        Proyek</label>
                                    <div class="col-sm-10">
                                        <input disabled class="form-control disabled" type="text"
                                            value="{{ $proyek->nama_proyek }}" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label text-right">Status</label>
                                    <div class="col-sm-10">
                                        {!! transformKontrakStatus($data->status) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label text-right">Tanggal
                                        Pengerjaan</label>
                                    <div class="col-sm-10">
                                        <input disabled class="form-control disabled" type="date"
                                            value="{{ $proyek->tanggal_pengerjaan }}" id="example-email-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="estimasi" class="col-sm-2 col-form-label text-right">Estimasi</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input disabled id="estimasi" type="number" value="{{ $proyek->estimasi }}"
                                                class="form-control disabled" placeholder="Estimasi hari"
                                                aria-label="Estimasi...">
                                            <span class="input-group-append">
                                                <button disabled
                                                    class=" disabled btn btn-sm btn-secondary pointer-event-none shadow-none"
                                                    type="button">Hari</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="timeline" class="col-sm-2 col-form-label text-right">File Timeline</label>
                                    <div class="col-sm-10">
                                        <a href="{{ $proyek->file_url }}"
                                            class="btn btn-primary waves-effect waves-light shadow-none">Lihat File
                                            Timeline</a>
                                    </div>
                                </div>
</div>
</div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Kontrak</h4>

                        <form action="{{ route('kontrak.update-status', ['kontrak' => $data->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if ($data->status > -1)
                                <div class="form-group row">
                                    <label for="timeline" class="col-sm-2 col-form-label text-right">File Kontrak</label>
                                    <div class="col-sm-10">
                                        <a href="{{ $data->file_url }}"
                                            class="btn btn-primary waves-effect waves-light shadow-none">Lihat File
                                            Kontrak</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label text-right">Remarks</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="remarks" type="text"
                                            id="example-text-input"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-right" x-data="{status:{{ Auth::user()->role }}}">
                            <input type="hidden" name="status" x-bind:value="status">
                            <button type="submit" x-on:mouseenter="status = {{ Auth::user()->role }}"
                                x-on:focus="status = {{ Auth::user()->role }}"
                                class="btn btn-success waves-effect waves-light shadow-none">Approve</button>
                            <button type="submit" x-on:mouseenter="status = 99" x-on:focus="status = 99"
                                class="btn btn-danger waves-effect waves-light shadow-none">Reject</button>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label for="timeline" class="col-sm-2 col-form-label text-right">File
                                        Kontrak</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file"><input class="custom-file-input" type="file"
                                                value="<?php echo $data->file_url; ?>" name="file_url" id="timeline"><label
                                                class="custom-file-label shadow-none border-none">{{-- $data->file_url --}}
                                                Choose File Kontrak</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-right" x-data="{status:4}">
                            <input type="hidden" name="status" x-bind:value="status">
                            <button type="submit" x-on:mouseenter="status = 4"
                                x-on:focus="status = 4"
                                class="btn btn-success waves-effect waves-light shadow-none">Save</button>
                            <button class="btn btn-error waves-effect waves-light shadow-none">Cancel</button>
                        </div>
                    @endif
                        </form>
                        <br>
                        <hr>
                        <table class="table table-bordered mb-0 table-centered">
                            <thead>
                                <tr>
                                    <th>Remarks</th>
                                    <th>Date</th>
                                    <th>By</th>
                                    {{-- <th>Status</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyek->remarks as $remarks)
                                    <tr>
                                        <td>{{ $remarks->remarks }}</td>
                                        <td>{{ $remarks->created_at }}</td>
                                        <td>{{ $remarks->user->name }}</td>
                                        {{-- <td>{{ $remarks->status }}<span class="badge badge-soft-success">Approved</span> --}}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
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
