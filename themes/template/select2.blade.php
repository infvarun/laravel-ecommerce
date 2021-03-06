<?php
if(!isset($attributes)) {
    $attributes = ['class' => 'form-control select2'];
    $attributes['multiple'] = true;
}
?>
<div class="form-group col-md-12 {{ $errors->has($key) ? ' has-error' : '' }}">
    {!! Form::label($key, $label) !!}

    {!! Form::select($key,$options,NULL,$attributes) !!}

    @if ($errors->has($key))
        <span class="help-block">
                <strong>{{ $errors->first($key) }}</strong>
            </span>
    @endif
</div>
<script>
jQuery(document).ready(function() {
      $(".select2").select2();
}); 
</script>