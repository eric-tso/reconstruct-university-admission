<?php

use App\Models\AppliedProgramme;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AppliedProgrammeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficerAppliedProgrammeController;
use App\Http\Controllers\InterviewPeriodController;
use App\Http\Controllers\InterviewController;

Route::get('/', fn()=>view('index'))->middleware(['auth','verified']);

Route::middleware(['can:user','verified'])->group(function () {
    Route::get('applications/create', [ApplicationController::class, 'create']);
    Route::post('applications', [ApplicationController::class, 'store']);
    Route::get('applications/{application}/edit', [ApplicationController::class, 'edit']);
    Route::patch('applications/{application}', [ApplicationController::class, 'update']);

    Route::get('appliedProgrammes', [AppliedProgrammeController::class, 'index']);
    Route::get('appliedProgrammes/create', [AppliedProgrammeController::class, 'create']);
    Route::post('appliedProgrammes', [AppliedProgrammeController::class, 'store']);
    Route::patch('appliedProgrammes/{appliedProgramme}', [AppliedProgrammeController::class, 'update']);

    Route::get('files',[FileController::class, 'index']);
    Route::get('files/create',[FileController::class, 'create']);
    Route::post('files',[FileController::class, 'store']);
    Route::get('files/{file}/edit', [FileController::class, 'edit']);
    Route::patch('files/{file}', [FileController::class, 'update']);
    Route::delete('files/{file}', [FileController::class, 'destroy']);
});

Route::middleware('can:officer')->group(function () {
    Route::get('officer/appliedProgrammes',[OfficerAppliedProgrammeController::class, 'index']);
    Route::patch('officer/appliedProgrammes/{appliedProgramme}', [OfficerAppliedProgrammeController::class, 'update']);

    Route::get('applications/{application}', [ApplicationController::class, 'show']);

    Route::get('files/{file:user_id}', [FileController::class, 'show']);

    Route::get('interviewPeriods',[InterviewPeriodController::class, 'index']);
    Route::get('interviewPeriods/create',[InterviewPeriodController::class, 'create']);
    Route::post('interviewPeriods',[InterviewPeriodController::class, 'store']);
    Route::get('interviewPeriods/{interviewPeriod}', [InterviewPeriodController::class, 'show']);

    Route::get('interviews/{interview}/edit', [InterviewController::class, 'edit']);
    Route::get('/getEmptyTime/{timePeriodId}', [InterviewController::class, 'getEmptyTime']);

    Route::get('waitingArrange', fn() => view('waitingArrange',['requireInterviews' => DB::table('applied_programmes')
                                                                                        ->select('programmes.name as name', DB::raw('count(*) as total'))
                                                                                        ->leftJoin('programmes', 'applied_programmes.programme_id', '=', 'programmes.id')
                                                                                        ->where('status','Approved')->where('autoAssigned', 'false')->where('changingTime', 'false')
                                                                                        ->groupBy('programme_id')
                                                                                        ->get()]));

    Route::get('changingTimeRequest', fn() => view('changingTimeRequest',['appliedProgrammes' => AppliedProgramme::where('changingTime','true')->where('autoAssigned','false')->get()]));
});

Route::middleware('can:admin')->group(function () {
    Route::get('programmes',[ProgrammeController::class, 'index']);
    Route::get('programmes/create',[ProgrammeController::class, 'create']);
    Route::post('programmes',[ProgrammeController::class, 'store']);
    Route::get('programmes/{programme}/edit', [ProgrammeController::class, 'edit']);
    Route::patch('programmes/{programme}', [ProgrammeController::class, 'update']);
    Route::delete('programmes/{programme}', [ProgrammeController::class, 'destroy']);

    Route::get('users',[UserController::class, 'index']);
    Route::get('users/create',[UserController::class, 'create']);
    Route::post('users',[UserController::class, 'store']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);
});

Route::middleware('userOrOfficer')->group(function () {
    Route::patch('interviews/{interview}', [InterviewController::class, 'update']);

    Route::get('document', fn() => Storage::download(request()->path,request()->originalName));
});



require __DIR__.'/auth.php';
