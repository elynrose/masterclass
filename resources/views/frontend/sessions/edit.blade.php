@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.session.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.sessions.update", [$session->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="cover_image">{{ trans('cruds.session.fields.cover_image') }}</label>
                            <div class="needsclick dropzone" id="cover_image-dropzone">
                            </div>
                            @if($errors->has('cover_image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cover_image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.cover_image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.session.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $session->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">{{ trans('cruds.session.fields.excerpt') }}</label>
                            <textarea class="form-control ckeditor" name="excerpt" id="excerpt">{!! old('excerpt', $session->excerpt) !!}</textarea>
                            @if($errors->has('excerpt'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('excerpt') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.excerpt_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="intro_video">{{ trans('cruds.session.fields.intro_video') }}</label>
                            <div class="needsclick dropzone" id="intro_video-dropzone">
                            </div>
                            @if($errors->has('intro_video'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('intro_video') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.intro_video_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="topics">{{ trans('cruds.session.fields.topics') }}</label>
                            <textarea class="form-control ckeditor" name="topics" id="topics">{!! old('topics', $session->topics) !!}</textarea>
                            @if($errors->has('topics'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('topics') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.topics_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="course_details">{{ trans('cruds.session.fields.course_details') }}</label>
                            <textarea class="form-control ckeditor" name="course_details" id="course_details">{!! old('course_details', $session->course_details) !!}</textarea>
                            @if($errors->has('course_details'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('course_details') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.course_details_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="zoom_link">{{ trans('cruds.session.fields.zoom_link') }}</label>
                            <textarea class="form-control" name="zoom_link" id="zoom_link" required>{{ old('zoom_link', $session->zoom_link) }}</textarea>
                            @if($errors->has('zoom_link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('zoom_link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.zoom_link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="date">{{ trans('cruds.session.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $session->date) }}" required>
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="time">{{ trans('cruds.session.fields.time') }}</label>
                            <input class="form-control timepicker" type="text" name="time" id="time" value="{{ old('time', $session->time) }}" required>
                            @if($errors->has('time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.session.fields.cadence') }}</label>
                            <select class="form-control" name="cadence" id="cadence" required>
                                <option value disabled {{ old('cadence', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Session::CADENCE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('cadence', $session->cadence) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cadence'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cadence') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.cadence_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.session.fields.frequency') }}</label>
                            <select class="form-control" name="frequency" id="frequency" required>
                                <option value disabled {{ old('frequency', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Session::FREQUENCY_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('frequency', $session->frequency) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('frequency'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('frequency') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.frequency_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="duration">{{ trans('cruds.session.fields.duration') }}</label>
                            <input class="form-control" type="number" name="duration" id="duration" value="{{ old('duration', $session->duration) }}" step="1">
                            @if($errors->has('duration'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('duration') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.duration_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="attachment">{{ trans('cruds.session.fields.attachment') }}</label>
                            <div class="needsclick dropzone" id="attachment-dropzone">
                            </div>
                            @if($errors->has('attachment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('attachment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.attachment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="next_session_id">{{ trans('cruds.session.fields.next_session') }}</label>
                            <select class="form-control select2" name="next_session_id" id="next_session_id">
                                @foreach($next_sessions as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('next_session_id') ? old('next_session_id') : $session->next_session->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('next_session'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('next_session') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.next_session_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="landing_page_id">{{ trans('cruds.session.fields.landing_page') }}</label>
                            <select class="form-control select2" name="landing_page_id" id="landing_page_id" required>
                                @foreach($landing_pages as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('landing_page_id') ? old('landing_page_id') : $session->landing_page->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('landing_page'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('landing_page') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.session.fields.landing_page_helper') }}</span>
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
    Dropzone.options.coverImageDropzone = {
    url: '{{ route('frontend.sessions.storeMedia') }}',
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
@if(isset($session) && $session->cover_image)
      var file = {!! json_encode($session->cover_image) !!}
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
                xhr.open('POST', '{{ route('frontend.sessions.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $session->id ?? 0 }}');
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

<script>
    Dropzone.options.introVideoDropzone = {
    url: '{{ route('frontend.sessions.storeMedia') }}',
    maxFilesize: 100, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 100
    },
    success: function (file, response) {
      $('form').find('input[name="intro_video"]').remove()
      $('form').append('<input type="hidden" name="intro_video" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="intro_video"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($session) && $session->intro_video)
      var file = {!! json_encode($session->intro_video) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="intro_video" value="' + file.file_name + '">')
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
    var uploadedAttachmentMap = {}
Dropzone.options.attachmentDropzone = {
    url: '{{ route('frontend.sessions.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachment[]" value="' + response.name + '">')
      uploadedAttachmentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentMap[file.name]
      }
      $('form').find('input[name="attachment[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($session) && $session->attachment)
          var files =
            {!! json_encode($session->attachment) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachment[]" value="' + file.file_name + '">')
            }
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
@endsection