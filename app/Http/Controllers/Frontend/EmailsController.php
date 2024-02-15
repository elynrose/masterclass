<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEmailRequest;
use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Models\Email;
use App\Models\LandingPage;
use App\Models\Session;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class EmailsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('email_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emails = Email::with(['session', 'landing_page', 'created_by'])->get();

        return view('frontend.emails.index', compact('emails'));
    }

    public function create()
    {
        abort_if(Gate::denies('email_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sessions = Session::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $landing_pages = LandingPage::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.emails.create', compact('landing_pages', 'sessions'));
    }

    public function store(StoreEmailRequest $request)
    {
        $email = Email::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $email->id]);
        }

        return redirect()->route('frontend.emails.index');
    }

    public function edit(Email $email)
    {
        abort_if(Gate::denies('email_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sessions = Session::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $landing_pages = LandingPage::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $email->load('session', 'landing_page', 'created_by');

        return view('frontend.emails.edit', compact('email', 'landing_pages', 'sessions'));
    }

    public function update(UpdateEmailRequest $request, Email $email)
    {
        $email->update($request->all());

        return redirect()->route('frontend.emails.index');
    }

    public function show(Email $email)
    {
        abort_if(Gate::denies('email_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $email->load('session', 'landing_page', 'created_by');

        return view('frontend.emails.show', compact('email'));
    }

    public function destroy(Email $email)
    {
        abort_if(Gate::denies('email_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $email->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmailRequest $request)
    {
        $emails = Email::find(request('ids'));

        foreach ($emails as $email) {
            $email->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('email_create') && Gate::denies('email_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Email();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
