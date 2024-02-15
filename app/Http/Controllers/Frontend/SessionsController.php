<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySessionRequest;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Models\LandingPage;
use App\Models\Session;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SessionsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('session_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sessions = Session::with(['next_session', 'landing_page', 'media'])->get();

        return view('frontend.sessions.index', compact('sessions'));
    }

    public function create()
    {
        abort_if(Gate::denies('session_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $next_sessions = Session::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $landing_pages = LandingPage::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.sessions.create', compact('landing_pages', 'next_sessions'));
    }

    public function store(StoreSessionRequest $request)
    {
        $session = Session::create($request->all());

        if ($request->input('cover_image', false)) {
            $session->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_image'))))->toMediaCollection('cover_image');
        }

        if ($request->input('intro_video', false)) {
            $session->addMedia(storage_path('tmp/uploads/' . basename($request->input('intro_video'))))->toMediaCollection('intro_video');
        }

        foreach ($request->input('attachment', []) as $file) {
            $session->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $session->id]);
        }

        return redirect()->route('frontend.sessions.index');
    }

    public function edit(Session $session)
    {
        abort_if(Gate::denies('session_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $next_sessions = Session::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $landing_pages = LandingPage::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $session->load('next_session', 'landing_page');

        return view('frontend.sessions.edit', compact('landing_pages', 'next_sessions', 'session'));
    }

    public function update(UpdateSessionRequest $request, Session $session)
    {
        $session->update($request->all());

        if ($request->input('cover_image', false)) {
            if (! $session->cover_image || $request->input('cover_image') !== $session->cover_image->file_name) {
                if ($session->cover_image) {
                    $session->cover_image->delete();
                }
                $session->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_image'))))->toMediaCollection('cover_image');
            }
        } elseif ($session->cover_image) {
            $session->cover_image->delete();
        }

        if ($request->input('intro_video', false)) {
            if (! $session->intro_video || $request->input('intro_video') !== $session->intro_video->file_name) {
                if ($session->intro_video) {
                    $session->intro_video->delete();
                }
                $session->addMedia(storage_path('tmp/uploads/' . basename($request->input('intro_video'))))->toMediaCollection('intro_video');
            }
        } elseif ($session->intro_video) {
            $session->intro_video->delete();
        }

        if (count($session->attachment) > 0) {
            foreach ($session->attachment as $media) {
                if (! in_array($media->file_name, $request->input('attachment', []))) {
                    $media->delete();
                }
            }
        }
        $media = $session->attachment->pluck('file_name')->toArray();
        foreach ($request->input('attachment', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $session->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachment');
            }
        }

        return redirect()->route('frontend.sessions.index');
    }

    public function show(Session $session)
    {
        abort_if(Gate::denies('session_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $session->load('next_session', 'landing_page');

        return view('frontend.sessions.show', compact('session'));
    }

    public function destroy(Session $session)
    {
        abort_if(Gate::denies('session_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $session->delete();

        return back();
    }

    public function massDestroy(MassDestroySessionRequest $request)
    {
        $sessions = Session::find(request('ids'));

        foreach ($sessions as $session) {
            $session->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('session_create') && Gate::denies('session_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Session();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
