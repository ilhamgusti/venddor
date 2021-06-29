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
function transformRole($roleId) {
    switch ($roleId) {
        case 1:
            return 'Manajer Inventory';
        case 2:
            return 'Admin Inventory';
        case 3:
            return 'Kepala Gudang';
        case 4:
            return 'Staf Gudang';
        case 5:
            return 'Marketing';
        default:
            return 'Unknown';
    }
}
function transformPOStatus($poStatus) {
    switch ($poStatus) {
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
function transformStatusToComponent($status) {
    switch ($status) {
        case 1:
            return '<span class="badge badge-outline-danger">
                        <i class="fa fa-circle text-danger mr-1"></i>
                        Checking Manajer Inventory
                    </span>';
        case 2:
            return '<span class="badge badge-outline-primary">
            <i class="fa fa-circle text-primary mr-1"></i>
            Checking Admin Inventory
        </span>';
        case 3:
            return '<span class="badge badge-outline-warning">
            <i class="fa fa-circle text-warning mr-1"></i>
            Checking Kepala Gudang
        </span>';
        case 4:
            return '<span class="badge badge-outline-secondary">
            <i class="fa fa-circle text-secondary mr-1"></i>
            Checking Staff Gudang
        </span>';
        case 5:
            return '<span class="badge badge-outline-primary">
            <i class="fa fa-circle text-primary mr-1"></i>
            Pengiriman
        </span>';
        default:
            return '<span class="badge badge-outline-dark">
            <i class="fa fa-circle text-dark mr-1"></i>
            Canceled
        </span>';
    }
}
function transformCheckedStock($checkedStatus) {
    switch ($checkedStatus) {
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
function transformRoleToTitle($roleType) {
    switch ($roleType) {
        case 1:
            return '<div class="mr-auto">
            <h2 class="text-black font-w600">Approval Manager Inventory</h2>
            <p class="mb-0">Approval Manager Inventory</p>
        </div>';
        case 2:
            return '<div class="mr-auto">
            <h2 class="text-black font-w600">Check Staf Inventory</h2>
            <p class="mb-0">check staf inventory</p>
        </div>';
        case 3:
            return '<div class="mr-auto">
            <h2 class="text-black font-w600">Approval Head Warehouse</h2>
            <p class="mb-0">approval head warehouse</p>
        </div>';
        case 4:
            return '<div class="mr-auto">
            <h2 class="text-black font-w600">Prepare Items</h2>
            <p class="mb-0">prepare items</p>
        </div>';
        case 5:
            return '<div class="mr-auto">
            <h2 class="text-black font-w600">Sales Order</h2>
            <p class="mb-0">dokumen penawaran penjualan tertulis yang mengkonfirmasi penjualan atas suatu produk</p>
        </div>';
        default:
            return 'Unknown Status';
    }
}