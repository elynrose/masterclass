<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubscriberRequest;
use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\UpdateSubscriberRequest;
use App\Models\LandingPage;
use App\Models\Subscriber;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscribersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subscriber_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscribers = Subscriber::with(['landing_page'])->get();

        return view('frontend.subscribers.index', compact('subscribers'));
    }

    public function create()
    {
        abort_if(Gate::denies('subscriber_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landing_pages = LandingPage::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.subscribers.create', compact('landing_pages'));
    }

    public function store(StoreSubscriberRequest $request)
    {
        $subscriber = Subscriber::create($request->all());

        return redirect()->route('frontend.subscribers.index');
    }

    public function edit(Subscriber $subscriber)
    {
        abort_if(Gate::denies('subscriber_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landing_pages = LandingPage::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subscriber->load('landing_page');

        return view('frontend.subscribers.edit', compact('landing_pages', 'subscriber'));
    }

    public function update(UpdateSubscriberRequest $request, Subscriber $subscriber)
    {
        $subscriber->update($request->all());

        return redirect()->route('frontend.subscribers.index');
    }

    public function show(Subscriber $subscriber)
    {
        abort_if(Gate::denies('subscriber_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriber->load('landing_page');

        return view('frontend.subscribers.show', compact('subscriber'));
    }

    public function destroy(Subscriber $subscriber)
    {
        abort_if(Gate::denies('subscriber_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriber->delete();

        return back();
    }

    public function massDestroy(MassDestroySubscriberRequest $request)
    {
        $subscribers = Subscriber::find(request('ids'));

        foreach ($subscribers as $subscriber) {
            $subscriber->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
