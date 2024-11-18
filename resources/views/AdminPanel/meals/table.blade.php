<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="meals-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Price</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($meals as $meal)
                <tr>
                    <td>{{ $meal->id }}</td>
                    <td>{{ $meal->image }}</td>
                    <td>{{ $meal->price }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['meals.destroy', $meal->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('meals.show', [$meal->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('meals.edit', [$meal->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $meals])
        </div>
    </div>
</div>
