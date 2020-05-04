<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\RepositoryInterface;

class Test extends Controller
{

    protected $recordRepository;

    public function __construct( RepositoryInterface $recordRepository )
    {
        $this->recordRepository = $recordRepository;
    }

    public function run()
    {
        echo '<pre>';
        var_dump($this->recordRepository->getRecordTimeByDate(''));
        echo '</pre>';
    }
}
