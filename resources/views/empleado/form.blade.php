<div class="box box-info padding-1">
    <div class="box-body">

        {{-- <div class="form-group">
                <label for="nombre">Nombre</label>
                <input class="form-control" placeholder="Nombre" pattern="[a-zA-Z]*" name="nombre" type="text" value="{{$empleado->nombre}}" id="nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $empleado->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::email('email', $empleado->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sexo') }}
            <input type="radio" name="sexo" value="F" {{$empleado->sexo == 'F' ? 'checked' : ''}}>
            <label for="dewey">Femenino</label>
            <input type="radio" name="sexo" value="M" {{$empleado->sexo == 'M' ? 'checked' : ''}}>
            <label for="dewey">Masculino</label>
            {!! $errors->first('sexo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        {{-- <div class="form-group">

            {{ Form::label('sexo') }}
            {{ Form::text('sexo', $empleado->sexo, ['class' => 'form-control' . ($errors->has('sexo') ? ' is-invalid' : ''), 'placeholder' => 'Sexo']) }}
            {!! $errors->first('sexo', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}
        {{-- <div class="form-group">
            {{ Form::label('sexo') }}
            {{ Form::text('sexo', $empleado->sexo, ['class' => 'form-control' . ($errors->has('sexo') ? ' is-invalid' : ''), 'placeholder' => 'Sexo']) }}
            {!! $errors->first('sexo', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}
        <div class="form-group">
            {{ Form::label('Area') }}
            <select class="form-control" name="area_id">
                @foreach($empleado->areas as $area)
                <option value="{{$area->id}}" {{$empleado->area_id == $area->id ? 'selected' : ''}}>{{$area->nombre}}</option>
                @endforeach
            </select>
            {!! $errors->first('area_id', '<div class="invalid-feedback">:message</p>') !!}

            {{-- {{ Form::label('area_id') }}
            {{ Form::text('area_id', $empleado->area_id, ['class' => 'form-control' . ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Area Id']) }}
            {!! $errors->first('area_id', '<div class="invalid-feedback">:message</p>') !!} --}}
        </div>
        <div class="form-group">
            {{ Form::label('boletin') }}
            {{ Form::Checkbox('boletin', $empleado->boletin, ['class' => 'form-control' . ($errors->has('boletin') ? ' is-invalid' : ''), 'placeholder' => 'Boletin']) }}
            {!! $errors->first('boletin', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Roles') }}
            @foreach($empleado->roles as $rol)
            <br>
            <input type="checkbox" name="rol[]" value="{{$rol->id}}" {{$rol->empleado_id != null ? "checked" : ""}}>
            <label for="vehicle1">{{$rol->nombre}}</label>
            @endforeach
            {{-- {{ Form::label('area_id') }}
            {{ Form::text('area_id', $empleado->area_id, ['class' => 'form-control' . ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Area Id']) }}
            {!! $errors->first('area_id', '<div class="invalid-feedback">:message</p>') !!} --}}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::Textarea('descripcion', $empleado->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="http://localhost:8000/empleado"><button type="button" class="btn btn-danger">Cancel</button></a>
    </div>
</div>


<script scr="public/js/formulario.js"></script>
