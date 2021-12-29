@extends('layouts.application')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0">Data Atasan</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item">
                                    <i class="bx bx-user"></i>
                                </li>
                                <li class="breadcrumb-item active">Data Atasan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
            {{--                <div class="row">--}}
            {{--                    <div class="col-12">--}}
            {{--                        <p>--}}
            {{--                            Read full documnetation--}}
            {{--                            <a href="https://datatables.net/" target="_blank">here</a>--}}
            {{--                        </p>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Atasan</h4>
                                </div>
                                <div class="card-body card-dashboard">
                                    <p class="card-text">
                                        Data Atasan
                                    </p>
                                    <button id="addSubordinate" class="btn btn-primary">Tambah Data Atasan dan Bawahan</button>
                                    <div class="table-responsive">
                                        <table class="table" id="table-subordinate">
                                            <thead>
                                            <tr>
                                                <th>No Karyawan</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Atasan</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>No Karyawan</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Atasan</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!--section modal-->
    <div class="modal fade text-left" id="modalInput" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160">Karyawan</h5>
                </div>
                <div class="modal-body">
                    <form class="form form-vertical" method="POST" id="formSubordinate">
                        <input type="hidden" name="_method" value="POST" id="method">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-icon">Atasan</label>
                                        <div class="position-relative has-icon-left">
                                            <select class="form-control" name="head" id="head">
                                                @foreach($data as $head)
                                                    <option id="headValue" value="{{ $head->employee_id }}">{{ $head->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="form-control-position">
                                                <i class="bx bx-id-card"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-icon">Bawahan</label>
                                        <div class="position-relative has-icon-left">
                                            <select class="form-control" name="subordinate" id="subordinate">
                                                @foreach($data as $subordinate)
                                                    <option value="{{ $subordinate->employee_id }}">{{ $subordinate->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="form-control-position">
                                                <i class="bx bx-id-card"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="reset" class="btn btn-light-secondary mr-1" id="close-button">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript" src="{{ asset('js/subordinate.js') }}"></script>
    {{--    <script src="{{ url('admin/app-assets/js/scripts/datatables/datatable.js') }}"></script>--}}
@endpush
