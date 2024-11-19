<!--begin::Table-->
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <!--begin::Thead-->
    <thead>
        <tr class="fw-6 fw-semibold text-gray-600">
            <th class="min-w-250px">{{ __('lang.title') }}</th>
            <th class="min-w-250px">{{ __('lang.photo') }}</th>
            <th class="min-w-250px">{{ __('lang.price') }}</th>
            <th class="min-w-150px">{{ __('lang.actions') }}</th>
        </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody>
        @foreach ( $meals as $meal )
            <tr>
                <td>
                    <span class="badge badge-light-success fs-7 fw-bold">{{ $meal->name }}</span>
                </td>
                <td>
                    <span class="fs-7 fw-bold d-inline"><img src="{{ $meal->image }}"
                            style="width: 50px; height: 50px; border-radius: 50% display: inline"> </span>
                </td>
                <td>
                    <span class="badge badge-light-success fs-7 fw-bold">{{ $meal->price }}</span>
                </td>
                <td>
                    @if (auth()->user()->can('Update Meal'))
                        <a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-sm btn-light me-2">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    @endif
                    @if (auth()->user()->can('Delete Meal'))
                        <form method="POST" action="{{ route('meals.destroy', $meal->id) }}"
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
