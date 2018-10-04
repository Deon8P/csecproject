<input  id="myInput" class="form-control mr-sm-2 float-right text-center mt-0" type="text" placeholder="Search for a username..." onkeyup="searchFunction()" >

<h1 class="text-center mt-5">Leave Applications</h1>
<table id="myTable" class="table table-hovertable-sm mt-1">
                        <thead >
                        <tr class="table-dark">
                            <th>Employee Username</th>
                            <th>Leave Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Period</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->emp_username }}</td>
                        <td>{{ $application->leave_type }}</td>
                        <td>{{ $application->startDate }}</td>
                        <td>{{ $application->endDate }}</td>
                        <td>{{ $application->period }}</td>
                        <form action="/updateApplication/{{ $application->id }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <td>
                                <select class="float-left custom-select" id="status{{ $application->emp_username }}" name="status" style="width: 50%" required>
                                    <option value="pending" name="pending" id="pending" selected>Pending</option>
                                    <option value="approved" name="approved" id="approved">Approved</option>
                                    <option value="rejected" name="rejected" id="rejected">Rejected</option>
                                </select>
                                <button class="btn btn-outline-success float-right" type="submit">Update</button>
                            </td>
                        </form>
                    </tr>

                    @endforeach
                </tbody>
                </table>
