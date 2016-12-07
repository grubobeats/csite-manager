<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Add workers?
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach($workers as $worker)
                        <li class="list-group-item add-workers-modal">
                            <div class="col-sm-7">
                                <label>
                                    <input type="checkbox" name="workers[]"> {{ $worker->name }} {{ $worker->last_name }} - {{ $worker->position }}
                                </label>
                            </div>
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </span>
                                    <input type="time" name="started_at" class="form-control started_at_child" value="" placeholder="From" aria-describedby="sizing-addon2">
                                    <input type="time" name="finished_at" class="form-control finished_at_child" value="" placeholder="To" aria-describedby="sizing-addon2">
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<br>


@section('scripts')
    <script>

        $(document).ready(function(){

            $('.started_at_child').val($('#started_at').val());
            $('.finished_at_child').val($('#finished_at').val());


            $('#started_at').change(function () {
                $('.started_at_child').val($(this).val());
            });

            $('#finished_at').change(function () {
                $('.finished_at_child').val($(this).val());
            });
        });



    </script>
@endsection