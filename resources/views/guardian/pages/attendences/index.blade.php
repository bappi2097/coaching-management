@extends("guardian.layouts.app")
@section('breadcrumbs', Breadcrumbs::render('guardian.attendences'))
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="table-responsive py-4">
                    <table class="table table-flush">
                        <thead class="thead-light">
                            <tr class="bg-light">
                                <th class="border-top-0 d-flex align-items-center justify-items-center">
                                    Present
                                </th>
                                <th class="border-top-0">SL</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Course</th>
                                <th class="border-top-0">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($attedences))
                                @foreach ($attedences as $index => $attedence)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="present"
                                                name="present[{{ $attedence->student->id }}]" disabled
                                                {{ selected($attedence->is_present, 1, 'checked') }}>
                                        </td>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $attedence->student->fullName() }}</td>
                                        <td>{{ $attedence->course->title }}</td>
                                        <td>{{ date('F j, Y, g:i a', strtotime($attedence->attendence_date)) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            var customCheck = $("#customCheck");
            var listCheckItems = $(".present");
            customCheck.on("click", function() {
                var isMasterChecked = $(this).is(":checked");
                listCheckItems.prop("checked", isMasterChecked);
                getSelectedItems();
            });
            listCheckItems.on("change", function() {
                var totalItems = listCheckItems.length;
                var checkedItems = listCheckItems.filter(":checked").length;
                if (totalItems == checkedItems) {
                    customCheck.prop("indeterminate", false);
                    customCheck.prop("checked", true);
                } else if (checkedItems > 0 && checkedItems < totalItems) {
                    customCheck.prop("indeterminate", true);
                } else {
                    customCheck.prop("indeterminate", false);
                    customCheck.prop("checked", false);
                }
                getSelectedItems();
            });

            function getSelectedItems() {
                var getCheckedValues = [];
                getCheckedValues = [];
                listCheckItems.filter(":checked").each(function() {
                    getCheckedValues.push($(this).val());
                });
                $("#selected-values").html(JSON.stringify(getCheckedValues));
            }
        });
    </script>
@endpush
