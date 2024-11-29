<!--begin::Table-->
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <!--begin::Thead-->
    <thead>
        <tr class="fw-6 fw-semibold text-gray-600">
            <th class="min-w-250px">{{ __('lang.email') }}</th>
            <th class="min-w-250px">{{ __('lang.suggestion') }}</th>
            <th class="min-w-150px">{{ __('lang.actions') }}</th>
        </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody>
        @foreach ( $suggestions as $suggestion )
            <tr>
                <td>
                    <span class="badge badge-light-success fs-7 fw-bold">{{ $suggestion->email }}</span>
                </td>
                <td>
                    <span class="badge badge-light-success fs-7 fw-bold">{{ $suggestion->suggestion }}</span>
                </td>
                <td>
                    @if (auth()->user()->can('Delete Suggestion'))
                        <form method="POST" action="{{ route('suggestions.destroy', $suggestion->id) }}"
                            style="display: inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger me-2">
                                <i class="bi bi-file-x-fill"></i>
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
    <!--end::Tbody-->
</table>
<!--end::Table-->

<script>
    $(document).ready(function() {
        $('#kt_datatable_dom_positioning').dataTable({
            "searching": true,
            "ordering": true,
            responsive: true,
        });
    });
</script>
