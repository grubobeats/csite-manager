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
                                    <input type="checkbox" name="workers[]" class="worker-checkbox" data-id="{{ $worker->id }}" data-from="12:00" data-to="00:00"> {{ $worker->name }} {{ $worker->last_name }} - {{ $worker->position }}
                                </label>
                            </div>
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </span>
                                    <input data-wid="{{ $worker->id }}" type="time" name="started_at" class="form-control started_at_child" value="" placeholder="From" aria-describedby="sizing-addon2">
                                    <input data-wid="{{ $worker->id }}" type="time" name="finished_at" class="form-control finished_at_child" value="" placeholder="To" aria-describedby="sizing-addon2">
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add_to_hours">Add to working hours</button>
            </div>
        </div>
    </div>
</div>

<br>


@section('scripts')
    <script>

        $(document).ready(function(){
            var started_at = $('#started_at');
            var finished_at = $('#finished_at');
            var started_at_child = $('.started_at_child');
            var finished_at_child = $('.finished_at_child');
            var worker_check = $('.worker-checkbox');

            started_at_child.val(started_at.val());
            finished_at_child.val(finished_at.val());
            worker_check.data('from', started_at.val());
            worker_check.data('to', finished_at.val());

            started_at.change(function () {
                started_at_child.val($(this).val());
            });

            finished_at.change(function () {
                finished_at_child.val($(this).val());
            });


            $(started_at_child).change(function(){
                $(this)
                    .parent()
                    .parent()
                    .parent()
                    .find('.worker-checkbox')
                    .data('from', $(this).val());

                console.log( $(this)
                    .parent()
                    .parent()
                    .parent()
                    .find('.worker-checkbox')
                    .data('from')
                );
            });

            $(finished_at_child).change(function(){
                $(this)
                    .parent()
                    .parent()
                    .parent()
                    .find('.worker-checkbox')
                    .data('to', $(this).val());

                console.log( $(this)
                    .parent()
                    .parent()
                    .parent()
                    .find('.worker-checkbox')
                    .data('to')
                );
            });


            $('#add_to_hours').click(function () {

                var workers = [];
                var started_at = [];
                var finished_at = [];

                $('input:checked').each(function(){
                    workers.push($(this).data('id'));
                    started_at.push($(this).data('from'));
                    finished_at.push($(this).data('to'));
                });


                var date = $('#date').val();

                $(this).text('Adding...');

                $.ajax({
                    url: "{{ route('add-workers-from-diary') }}",
                    method: 'post',
                    data: {
                        workers: workers,
                        date: date,
                        started_at: started_at,
                        finished_at: finished_at,
                        test: "fuck",
                        _token: Laravel.csrfToken
                    },
                    success: function(){
                        console.log('success');
                        $('#add_to_hours').text('Added.');
                    },
                    error: function(message){
                        console.log('error');
                        console.log(message);
                    }
                });
            });
        });
    </script>
@endsection