{!! Form::open(['route' => 'mail','method' => 'POST']) !!}

@guest
<div class="form-group">
    {{ Form::label('name', 'Nama') }}
    {{ Form::text('name', '', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', '', ['class' => 'form-control']) }}
</div>
@endguest

<div class="form-group">
    {{ Form::label('subject', 'Subject') }}
    {{ Form::text('subject', '', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('message', 'Pesan') }}
    {{ Form::textarea('message', '', ['class' => 'form-control']) }}
</div>

<div class="form-row">
    <div class="col">
        {{ Form::submit('Submit', ['class' => 'btn btn-primary btn-block'])}}
    </div>
    <div class="col">
        {{ Form::reset('Reset', ['class' => 'btn btn-danger btn-block'])}}
    </div>
</div>

{!! Form::close() !!}
