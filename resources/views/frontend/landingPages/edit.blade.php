@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.landingPage.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.landing-pages.update", [$landingPage->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.landingPage.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $landingPage->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.landingPage.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="logo">{{ trans('cruds.landingPage.fields.logo') }}</label>
                            <div class="needsclick dropzone" id="logo-dropzone">
                            </div>
                            @if($errors->has('logo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('logo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.landingPage.fields.logo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.landingPage.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $landingPage->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.landingPage.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sub_title">{{ trans('cruds.landingPage.fields.sub_title') }}</label>
                            <input class="form-control" type="text" name="sub_title" id="sub_title" value="{{ old('sub_title', $landingPage->sub_title) }}">
                            @if($errors->has('sub_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sub_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.landingPage.fields.sub_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="cover_image">{{ trans('cruds.landingPage.fields.cover_image') }}</label>
                            <div class="needsclick dropzone" id="cover_image-dropzone">
                            </div>
                            @if($errors->has('cover_image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cover_image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.landingPage.fields.cover_image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="register_label">{{ trans('cruds.landingPage.fields.register_label') }}</label>
                            <input class="form-control" type="text" name="register_label" id="register_label" value="{{ old('register_label', $landingPage->register_label) }}" required>
                            @if($errors->has('register_label'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('register_label') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.landingPage.fields.register_label_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="teacher_photo">{{ trans('cruds.landingPage.fields.teacher_photo') }}</label>
                            <div class="needsclick dropzone" id="teacher_photo-dropzone">
                            </div>
                            @if($errors->has('teacher_photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('teacher_photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.landingPage.fields.teacher_photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="teacher_name">{{ trans('cruds.landingPage.fields.teacher_name') }}</label>
                            <input class="form-control" type="text" name="teacher_name" id="teacher_name" value="{{ old('teacher_name', $landingPage->teacher_name) }}" required>
                            @if($errors->has('teacher_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('teacher_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.landingPage.fields.teacher_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="stripe_code">{{ trans('cruds.landingPage.fields.stripe_code') }}</label>
                            <textarea class="form-control" name="stripe_code" id="stripe_code">{{ old('stripe_code', $landingPage->stripe_code) }}</textarea>
                            @if($errors->has('stripe_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('stripe_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.landingPage.fields.stripe_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="teacher_bio">{{ trans('cruds.landingPage.fields.teacher_bio') }}</label>
                            <textarea class="form-control ckeditor" name="teacher_bio" id="teacher_bio">{!! old('teacher_bio', $landingPage->teacher_bio) !!}</textarea>
                            @if($errors->has('teacher_bio'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('teacher_bio') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.landingPage.fields.teacher_bio_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="primary_color">{{ trans('cruds.landingPage.fields.primary_color') }}</label>
                            <input class="form-control" type="text" name="primary_color" id="primary_color" value="{{ old('primary_color', $landingPage->primary_color) }}">
                            @if($errors->has('primary_color'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('primary_color') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.landingPage.fields.primary_color_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="secondary_color">{{ trans('cruds.landingPage.fields.secondary_color') }}</label>
                            <input class="form-control" type="text" name="secondary_color" id="secondary_color" value="{{ old('secondary_color', $landingPage->secondary_color) }}">
                            @if($errors->has('secondary_color'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('secondary_color') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.landingPage.fields.secondary_color_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('frontend.landing-pages.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($landingPage) && $landingPage->logo)
      var file = {!! json_encode($landingPage->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.coverImageDropzone = {
    url: '{{ route('frontend.landing-pages.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="cover_image"]').remove()
      $('form').append('<input type="hidden" name="cover_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cover_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($landingPage) && $landingPage->cover_image)
      var file = {!! json_encode($landingPage->cover_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cover_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.teacherPhotoDropzone = {
    url: '{{ route('frontend.landing-pages.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="teacher_photo"]').remove()
      $('form').append('<input type="hidden" name="teacher_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="teacher_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($landingPage) && $landingPage->teacher_photo)
      var file = {!! json_encode($landingPage->teacher_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="teacher_photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('frontend.landing-pages.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $landingPage->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection