
    @if($leaveTypes != null)
    @foreach($leaveTypes as $leaveType)
    <tr>
    <form action="/updateLeaveType/{{ $leaveType->leave_type }}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
    <td><input type="text" id="leave_type{{ $leaveType->leave_type }}" name="leave_type" contenteditable="true" placeholder="{{ $leaveType->leave_type }}" ></td>
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

    <button type="submit" id="edit{{ $leaveType->leave_type }}" data-value="{{ $leaveType->leave_type }}" name="edit{{ $leaveType->leave_type }}" class="btn edit btn-outline-warning">Edit</button>
    </td>
    <td>
            <button onclick="window.location.href='/deleteLeaveType/{{ $leaveType->leave_type }}'" type="button" id="delete{{ $leaveType->leave_type }}" data-value="{{ $leaveType->leave_type }}" name="delete{{ $leaveType->leave_type }}" class="btn delete btn-outline-danger">Delete</button>
        </td>

    </form>
    </tr>
    @endforeach
    @endif
