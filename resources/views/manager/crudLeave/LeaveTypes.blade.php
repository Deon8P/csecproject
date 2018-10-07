
    @if(! $leaveTypes->isEmpty())
    <table class="table table-hover" style="position: absolute; top:15%; left:0%; right:0%">
        <thead>
        <tr class="">
            <th scope="row">Leave Type</th>
            <th scope="row">Status</th>
            <th scope="row">Commit</th>
            <th scope="row">Delete</th>
        </tr>
        </thead>
        <tbody id="ContentBody">
    @foreach($leaveTypes as $leaveType)
    <tr>
    <form action="/updateLeaveType/{{ $leaveType->leave_type }}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
    <td><input class="form-control" type="text" id="leave_type{{ $leaveType->leave_type }}" name="leave_type" placeholder="{{ $leaveType->leave_type }}" ></td>
        <td>
            <select class="custom-select" id="status{{ $leaveType->leave_type }}" name="status" required>
                @if($leaveType->status == 'active')
                <option value="active" name="active" id="active" selected>Active</option>
                <option value="suspended" name="suspended" id="suspended">Suspended</option>
                @else
                <option value="active" name="active" id="active">Active</option>
                <option value="suspended" name="suspended" id="suspended" selected>Suspended</option>
                @endif
            </select>
        </td>
    <td>

    <button type="submit" id="edit{{ $leaveType->leave_type }}" name="edit{{ $leaveType->leave_type }}" class="btn edit btn-outline-warning">Edit</button>
    </td>
    <td>
            <a href="/deleteLeaveType/{{ $leaveType->leave_type }}" role="button" id="delete{{ $leaveType->leave_type }}" data-value="{{ $leaveType->leave_type }}" name="delete{{ $leaveType->leave_type }}" class="btn delete btn-outline-danger">Delete</a>
        </td>

    </form>
    </tr>
    @endforeach

</tbody>

</table>
    @else
    <h1 class="text-center" style="color: #c5c5c5">There are no leave types to update, <br><a href="/manager/createLeaveType">perhaps add a new leave type?</a></h1>
    @endif
