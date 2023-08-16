@extends('app')
@section("head")
@include('layouts.head')
@endsection
@section("script")
@include('layouts.script')
@endsection
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<div class="card ml-3 mt-3 mr-3 mb-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card card-info card-outline">
                </div>
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h1>History Pencarian Kata</h1>
                    </div>
                </div>
                <div class="card-body">
                    @if ($history->isEmpty())
                    <p>Belum ada kata favorit.</p>
                    @else
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr class="bg-info">
                                    <th class="text-center" style="vertical-align: middle;">No</th>
                                    <th class="text-center" style="vertical-align: middle;">Kata</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history as $item)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}} </td>
                                    <td class="text-center"><a
                                            href="{{ route('favorite.meaning', ['kata' => $item->kata]) }}">{{ $item->kata }}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script_tambahan')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        // DataTable
        var table = $('#myTable').DataTable({

            initComplete: function () {
                var r = $('#myTable tfoot tr');
                r.find('th').each(function () {
                    $(this).css('padding', 8);
                });
                $('#myTable thead').append(r);
                $('#search_0').css('text-align', 'center');
                // Apply the search
                this.api()
                    .columns()
                    .every(function () {
                        var that = this;

                        $('input', this.footer()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
            },
        });
    });

</script>
