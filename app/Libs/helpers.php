<?php
  
function active_class($path, $active = 'active') {
  return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function is_active_route($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}

//1. control unit,2. spv proyek,3.manager proyek, 4.direktur proyek, 5.vendor, 6.keuangan
function transformRole($roleId) {
    switch ($roleId) {
        case 1:
            return 'Control Unit';
        case 2:
            return 'SPV Proyek';
        case 3:
            return 'Manager Proyek';
        case 4:
            return 'Direktur Proyek';
        case 5:
            return 'Vendor';
        case 6:
            return 'Keuangan';
        default:
            return 'Unknown';
    }
}
function transformProyekStatus($status) {
    switch ($status) {
        case 1:
            return 'New';
        case 1:
            return 'Waiting Approval';
        case 2:
            return 'Approved';
        case 3:
            return 'Rejected';
        default:
            return 'Unknown';
    }
}
function transformKontrakStatus($status) {
    switch ($status) {
        case 1:
            return 'Melakukan Permintaan Barang';
        case 2:
            return 'Barang Sudah Dikirim';
        case 3:
            return 'Barang Tidak Tersedia';
        case 4:
            return 'Barang Terkonfirmasi';
        case 4:
            return 'Barang Terkonfirmasi Sebagian';
        default:
            return 'Unknown Status';
    }
}
function transformTahapanStatus($status) {
    switch ($status) {
        case 1:
            return 'Melakukan Permintaan Barang';
        case 2:
            return 'Barang Sudah Dikirim';
        case 3:
            return 'Barang Tidak Tersedia';
        case 4:
            return 'Barang Terkonfirmasi';
        case 4:
            return 'Barang Terkonfirmasi Sebagian';
        default:
            return 'Unknown Status';
    }
}
function transformInvoiceStatus($status) {
    switch ($status) {
        case 1:
            return 'Melakukan Permintaan Barang';
        case 2:
            return 'Barang Sudah Dikirim';
        case 3:
            return 'Barang Tidak Tersedia';
        case 4:
            return 'Barang Terkonfirmasi';
        case 4:
            return 'Barang Terkonfirmasi Sebagian';
        default:
            return 'Unknown Status';
    }
}

function transformStatusToComponent($status) {
    switch ($status) {
        case 1:
            return '<span class="badge badge-outline-danger">
                        <i class="fa fa-circle text-danger mr-1"></i>
                        Checking SPV Proyek
                    </span>';
        case 2:
            return '<span class="badge badge-outline-primary">
            <i class="fa fa-circle text-primary mr-1"></i>
            Checking SPV Proyek
        </span>';
        case 3:
            return '<span class="badge badge-outline-warning">
            <i class="fa fa-circle text-warning mr-1"></i>
            Checking Manager Proyek
        </span>';
        case 4:
            return '<span class="badge badge-outline-secondary">
            <i class="fa fa-circle text-secondary mr-1"></i>
            Checking Direktur Proyek
        </span>';
        case 5:
            return '<span class="badge badge-outline-primary">
            <i class="fa fa-circle text-primary mr-1"></i>
            Checking Vendor
        </span>';
        case 6:
            return '<span class="badge badge-outline-primary">
            <i class="fa fa-circle text-primary mr-1"></i>
            Submit Kontrak
        </span>';
        case 99:
            return '<span class="badge badge-outline-dark">
            <i class="fa fa-circle text-dark mr-1"></i>
            Rejected
        </span>';
        default:
            return '<span class="badge badge-outline-dark">
            <i class="fa fa-circle text-dark mr-1"></i>
            Unknown
        </span>';
    }
}

function transformRoleToTitleProyek($roleType) {
    switch ($roleType) {
        case 1:
            return '<div class="mr-auto">
            <h2 class="text-black font-w600">Proyek</h2>
            <p class="mb-0">Proyek</p>
        </div>';
        case 2:
            return '<div class="mr-auto">
            <h2 class="text-black font-w600">Approval SPV Proyek</h2>
            <p class="mb-0">Approval SPV Proyek</p>
        </div>';
        case 3:
            return '<div class="mr-auto">
            <h2 class="text-black font-w600">Approval Manager Proyek</h2>
            <p class="mb-0">Approval Manager Proyek</p>
        </div>';
        case 4:
            return '<div class="mr-auto">
            <h2 class="text-black font-w600">Approval Direktur Proyek</h2>
            <p class="mb-0">Approval Direktur Proyek</p>
        </div>';
        case 5:
            return '<div class="mr-auto">
            <h2 class="text-black font-w600">Proyek</h2>
            <p class="mb-0">Proyek</p>
        </div>';
        default:
            return 'Unknown';
    }
}