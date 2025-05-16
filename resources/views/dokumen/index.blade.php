@extends('layouts.master')

@section('title', 'Daftar Dokumen Syarat')

@section('content')

    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">DataTables.Net</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Datatables</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Dokumen Syarat</h4>
                            <a class="btn btn-primary btn-round ms-auto" href="{{ route('dokumen.create') }}">
                                <i class="fa fa-plus"></i>
                                Tambah Dokumen
                            </a>
                        </div>
                    </div>
                    <div class="card-body"> <!-- Modal -->
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Dokumen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($dokumens as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_dokumen ?? 'Tidak Ada Nama' }}</td>
                                            <td>
                                                <a href="{{ route('dokumen.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                {{-- <form action="{{ route('dokumen.destroy', $item->id) }}" method="POST" style="display:inline;" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete">Hapus</button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Belum ada dokumen</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('js')
        <script>
             document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (e) {
                const form = this.closest('form');

                swal({
                    title: "Apakah Anda yakin?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            text: "Batal",
                            visible: true,
                            className: "btn btn-danger"
                        },
                        confirm: {
                            text: "Ya, hapus!",
                            className: "btn btn-success"
                        }
                    },
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit(); // Submit form jika dikonfirmasi
                    }
                });
            });
        });
    });
            var SweetAlert2Demo = (function () {
        //== Demos
        var initDemos = function () {
          $("#alert_demo_3_3").click(function (e) {
            swal("Good job!", "You clicked the button!", {
              icon: "success",
              buttons: {
                confirm: {
                  className: "btn btn-success",
                },
              },
            });
          });
        };

        return {
          //== Init
          init: function () {
            initDemos();
          },
        };
      })();

      //== Class Initialization
      jQuery(document).ready(function () {
        SweetAlert2Demo.init();
      });




            $(document).ready(function() {


                // Add Row
                $("#add-row").DataTable({
                    pageLength: 5,
                });


            });
        </script>
    @endpush

@endsection
