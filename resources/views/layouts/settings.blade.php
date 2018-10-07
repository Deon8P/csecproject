<!-- Settings Modal -->
<div id="settingsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>

      <ul class=" nav nav-pills mb-3 container form-sr" id="pills-tab" role="tablist">

        <li class="nav-item">
          <a class="nav-link btn-outline-success active mr-1" id="pills-admin-tab" data-toggle="pill" href="#pills-admin" role="tab" aria-controls="pills-admin" aria-selected="false">Admin</a>
        </li>

        <li class="nav-item">
          <a class="nav-link btn-secondary btn-outline-success mr-1" id="pills-manager-tab" data-toggle="pill" href="#pills-manager" role="tab" aria-controls="pills-manager" aria-selected="true">Manager</a>
        </li>

        <li class="nav-item">
          <a class="nav-link btn-secondary btn-outline-success" id="pills-employee-tab" data-toggle="pill" href="#pills-employee" role="tab" aria-controls="pills-employee" aria-selected="false">Employee</a>
        </li>

    </ul>

        @include('layouts.errors')

      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-admin" role="tabpanel" aria-labelledby="pills-admin-tab">@include('layouts.changeUsername')</div>
        <div class="tab-pane fade show" id="pills-manager" role="tabpanel" aria-labelledby="pills-manager-tab">@include('layouts.changeEmail')</div>
        <div class="tab-pane fade" id="pills-employee" role="tabpanel" aria-labelledby="pills-employee-tab">@include('layouts.changePassword')</div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
