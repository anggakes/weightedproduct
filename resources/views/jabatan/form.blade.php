		<div class="form-group">
			{!! Form::label('nama','Nama :') !!}
			{!! Form::text('nama',@$jabatan->nama,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('nama','Divisi :') !!}
			{!! Form::select('divisi[]',$divisi,@$selected,['class'=>'form-control multiple','multiple'=>'multiple']) !!}
		</div>
<br>
		<div class="form-group">
			{!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
		</div>

