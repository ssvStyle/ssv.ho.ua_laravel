<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Time;
use App\Models\Servises;
use Illuminate\View\View;
use App\Models\Record as RecordModel;

class Record extends Controller
{
    /**
     * @var RepositoryInterface
     */
    protected $recordRepository;

    /**
     * Record constructor.
     * @param RepositoryInterface $recordRepository
     */
    public function __construct( RepositoryInterface $recordRepository )
    {

        $this->recordRepository = $recordRepository;

    }

    /**
     * @param $dateTimestamp
     * @param $error
     * @return View Record
     */

    public function showTime($dateTimestamp, $error)
    {

        $error = \Session::get('error') ?? $error;

        $dateTimestamp = Date::toTimestamp( Date::getEvenNumber( $dateTimestamp ) );

        return view('record')
            ->with('day' , $this->recordRepository->getRecordTimeByDate($dateTimestamp))
            ->with('servises', Servises::all())
            ->with('date', Date::getRusMonth($dateTimestamp))
            ->with('error', $error)
            ->with('dateTimestamp', $dateTimestamp);
    }


    public function store( Request $request )
    {

        if ( $request->input('time') && $request->input('servise' ) ) {

            $data = [
                'date' => $request->input('date'),
                'time' => $request->input('time'),
                'user_id' => 1,
                'servise_id' => $request->input('servise'),
                'add_servise_id' => $request->input('addServise'),
                'status_id' => 5,

            ];

            RecordModel::create($data);

            return redirect('record')
                ->with('error', 'Запись добавленна! Отредактировать или удалить можно в личном кабинете');

        }

        return redirect('record/' . date('j-F-Y', $request->input('date' )) )
                ->with( 'error', 'Не выбранно время и (или) услуга !!!' );

    }
}
