<div class="row">
    <div class="alert alert-danger">
        <h3><i class="fa fa-ban fa-x5" aria-hidden="true"></i> {{ $message }}</h3>
        <table class="table table-condensed">
            @foreach($errors->all() as $error)
                <tr>
                    <td class="danger">- {{ $error }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>