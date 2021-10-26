@section('content')

    <div class="wraper container-fluid">
        <div class="page-title">
            <h3 class="title">Users</h3>
        </div>
        <div class="row">
            <div class="col-md-8">
                <!-- third div start -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-bordered table-striped datatable-editable">
                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($users->isEmpty())
                                    <div class="alert alert-info">
                                        No user registered yet. Please wait
                                        for a
                                        while for new user or create a new user.
                                    </div>
                            @else
                            @foreach($users as $getUser)
                                <tr class="gradeX">
                                    <td>
                                        <strong>
                                            <a href="{{ route('ListOfUsers', $getUser->id) }}"
                                               class="text-info">
                                                {{ $getUser->name }}
                                                {{ $getUser->email }}
                                            </a>
                                        </strong>
                                    </td>
                                    <td class="actions">
                                        <form
                                            action="{{ route('DeleteUser') }}"
                                            method="POST">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="user_id"
                                                   value={{ $getUser->id }} />
                                            <a
                                               href="{{ route('EditUser', ['id' => $getUser->id]) }}"
                                               class="on-default text-info edit-row"
                                               title="Edit">&nbsp;&nbsp;
                                                <i class="fa fa-edit"></i>&nbsp;&nbsp;</a>
                                            <a href="#"
                                               class="on-default text-danger remove-row sa-confirmation"
                                               title="Delete"><i
                                                    class="fa fa-trash-o"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div><!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col-->
        </div>

    </div> <!-- End row -->

    <script type="text/javascript">
        ! function($) {
            "use strict";

            var SweetAlert = function() {};

            SweetAlert.prototype.init = function() {
                //Warning Message
                $('.sa-confirmation').click(function(e) {
                    swal({
                        title: "Are you sure?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, Remove this user!",
                        closeOnConfirm: false,
                    }, function() {
                        $(e.target).closest("form").submit();
                    });
                });
            },
                //init
                $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
        }(window.jQuery),

            //initializing
            function($) {
                "use strict";
                $.SweetAlert.init()
            }(window.jQuery);

    </script>
@stop
