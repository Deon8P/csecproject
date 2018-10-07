<h1 class="text-center mb-4" style="color: #71b346">Applications For Leave</h1>

<input  id="myInput" class="form-control text-center ml-2 mt-5 mb-3" type="text" placeholder="Search for a username..." onkeyup="searchUsername()" style="width: 30%">

<table id="myTable" class="table table-hover">
                        <thead >
                        <tr class="">
                            <th onclick="sortTable(0)" style="cursor: pointer">Employee Username</th>
                            <th onclick="sortTable(1)" style="cursor: pointer">Leave Type</th>
                            <th onclick="sortTable(2)" style="cursor: pointer">Start Date</th>
                            <th onclick="sortTable(3)" style="cursor: pointer">End Date</th>
                            <th onclick="sortTable(4)" style="cursor: pointer">Period</th>
                            <th onclick="sortTable(5)" style="cursor: pointer">Status</th>
                            <th onclick="sortTable(6)" style="cursor: pointer">Commit</th>
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
                        <form action="/updateApplication/{{ $application->id }}/{{ $application->emp_username }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <td>
                                <select class="float-left custom-select" id="status{{ $application->emp_username }}" name="status" style="width: 50%" required>
                                    <option value="pending" name="pending" id="pending" selected>Pending</option>
                                    <option value="approved" name="approved" id="approved">Approved</option>
                                    <option value="rejected" name="rejected" id="rejected">Rejected</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-outline-success " type="submit">Update</button>
                            </td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
                </table>
