<style>
    .alert {
        margin-bottom: 0px !important;
        margin-top: 10px !important;
    }
</style>
<div class="col-sm-9">
    @if(isset($success)&& $success)
        <div class="alert alert-success alert-dismissable messages">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
            <i class="icon fa fa-check"></i>
            {{$message}}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@section('javascript')
    @parent
@endsection