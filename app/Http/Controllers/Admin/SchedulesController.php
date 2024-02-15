<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyScheduleRequest;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;
use App\Models\Session;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SchedulesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('schedule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedules = Schedule::with(['session'])->get();

        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        abort_if(Gate::denies('schedule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sessions = Session::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.schedules.create', compact('sessions'));
    }

    public function store(StoreScheduleRequest $request)
    {
        $schedule = Schedule::create($request->all());

        return redirect()->route('admin.schedules.index');
    }

    public function edit(Schedule $schedule)
    {
        abort_if(Gate::denies('schedule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sessions = Session::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $schedule->load('session');

        return view('admin.schedules.edit', compact('schedule', 'sessions'));
    }

    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $schedule->update($request->all());

        return redirect()->route('admin.schedules.index');
    }

    public function show(Schedule $schedule)
    {
        abort_if(Gate::denies('schedule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule->load('session');

        return view('admin.schedules.show', compact('schedule'));
    }

    public function destroy(Schedule $schedule)
    {
        abort_if(Gate::denies('schedule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule->delete();

        return back();
    }

    public function massDestroy(MassDestroyScheduleRequest $request)
    {
        $schedules = Schedule::find(request('ids'));

        foreach ($schedules as $schedule) {
            $schedule->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
