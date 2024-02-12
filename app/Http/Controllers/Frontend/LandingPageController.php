<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLandingPageRequest;
use App\Http\Requests\StoreLandingPageRequest;
use App\Http\Requests\UpdateLandingPageRequest;
use App\Models\LandingPage;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class LandingPageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('landing_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landingPages = LandingPage::with(['created_by', 'media'])->get();

        return view('frontend.landingPages.index', compact('landingPages'));
    }

    public function create()
    {
        abort_if(Gate::denies('landing_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.landingPages.create');
    }

    public function store(StoreLandingPageRequest $request)
    {
        $landingPage = LandingPage::create($request->all());

        if ($request->input('logo', false)) {
            $landingPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('cover_image', false)) {
            $landingPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_image'))))->toMediaCollection('cover_image');
        }

        if ($request->input('teacher_photo', false)) {
            $landingPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('teacher_photo'))))->toMediaCollection('teacher_photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $landingPage->id]);
        }

        return redirect()->route('frontend.landing-pages.index');
    }

    public function edit(LandingPage $landingPage)
    {
        abort_if(Gate::denies('landing_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landingPage->load('created_by');

        return view('frontend.landingPages.edit', compact('landingPage'));
    }

    public function update(UpdateLandingPageRequest $request, LandingPage $landingPage)
    {
        $landingPage->update($request->all());

        if ($request->input('logo', false)) {
            if (! $landingPage->logo || $request->input('logo') !== $landingPage->logo->file_name) {
                if ($landingPage->logo) {
                    $landingPage->logo->delete();
                }
                $landingPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($landingPage->logo) {
            $landingPage->logo->delete();
        }

        if ($request->input('cover_image', false)) {
            if (! $landingPage->cover_image || $request->input('cover_image') !== $landingPage->cover_image->file_name) {
                if ($landingPage->cover_image) {
                    $landingPage->cover_image->delete();
                }
                $landingPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_image'))))->toMediaCollection('cover_image');
            }
        } elseif ($landingPage->cover_image) {
            $landingPage->cover_image->delete();
        }

        if ($request->input('teacher_photo', false)) {
            if (! $landingPage->teacher_photo || $request->input('teacher_photo') !== $landingPage->teacher_photo->file_name) {
                if ($landingPage->teacher_photo) {
                    $landingPage->teacher_photo->delete();
                }
                $landingPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('teacher_photo'))))->toMediaCollection('teacher_photo');
            }
        } elseif ($landingPage->teacher_photo) {
            $landingPage->teacher_photo->delete();
        }

        return redirect()->route('frontend.landing-pages.index');
    }

    public function show(LandingPage $landingPage)
    {
        abort_if(Gate::denies('landing_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landingPage->load('created_by');

        return view('frontend.landingPages.show', compact('landingPage'));
    }

    public function destroy(LandingPage $landingPage)
    {
        abort_if(Gate::denies('landing_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landingPage->delete();

        return back();
    }

    public function massDestroy(MassDestroyLandingPageRequest $request)
    {
        $landingPages = LandingPage::find(request('ids'));

        foreach ($landingPages as $landingPage) {
            $landingPage->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('landing_page_create') && Gate::denies('landing_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new LandingPage();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
