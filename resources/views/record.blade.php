@extends('layouts.main')

@section('title', 'test')


@section('content')

	@if ($error !== '')

		<div class="container">
			<div class="row pt-5 mt-3">
				<div class="col-12 text-center">
					<div class="alert alert-info" role="alert">
						{{$error}}
					</div>
				</div>
			</div>
		</div>

	@endif

		<div class="container pt-5 mt-2">
<div class="row  text-center">
            <div class="col-md-6">
            <p>Для того чтобы записатся выберите удобную для вас дату и время</p>

                    <div id="calendar">
                        <img src="{{ asset('img/prev.png')}}" alt="Предыдущий месяц" title="Предыдущий месяц" id="prevMonth" onclick="prevMonth()"  style="cursor: pointer;"><span id="monthJS"></span><img src="{{ asset('img/next.png') }}" alt="Следующий месяц" title="Следующий месяц" id="nextMonth" onclick="nextMonth()" style="cursor: pointer;">
                        <div id="month"></div>
                        <div id="week">Пн</div><div id="week">Вт</div><div id="week">Ср</div><div id="week">Чт</div><div id="week">Пт</div><div id="week">Сб</div><div id="week">Вс</div>
                        <span id="days"></span>
			</div>
            </div>
				<div class="col-md-6">
                    <h4>Дата: <b class="text-info">{{ $date }}</b> </h4>
                <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                Время
                            </div>
                            <div class="col-md-2">
                                Имя
                            </div>
                            <div class="col-md-3">
                                Услуга
                            </div>
                            <div class="col-md-3">
                                Доп. услуга
                            </div>
                            <div class="col-md-2">
                                Статус
                            </div>
                    </div>
                    <hr>
                </div>
                    <form action="/record" method="post">
                        <input type="hidden" name="date" value="{{ $dateTimestamp }}">
                        {{ csrf_field() }}
                        <div class="row mb-2">

                                @foreach ($day as $time)

                                    @if ($time->status == NULL)

                                            <div class="col-md-2 text-left">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="time" id="exampleRadios1" value="{{$time->id}}">
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        {{$time->time}}
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                Свободно
                                            </div>
                                    @else


                                            <div class="col-md-2 text-left">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" disabled>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        {{$time->time}}
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-10 text-muted">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        {{$time->userName}}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{$time->servise}}
                                                    </div>
                                                    <div class="col-md-4">
                                                        {{$time->addServise}}
                                                    </div>
                                                    <div class="col-md-2">
                                                        {{$time->status}}
                                                    </div>
                                                </div>
                                            </div>

                                    @endif

                                @endforeach

                        </div>

                            <select name="servise" class="form-control form-control-lg">
                                <option value="" selected>Что делаем?</option>
                        @foreach ($servises as $servise)

                            @if ( $servise->id == 6)
                                @continue
                            @endif
                                    <option value="{{ $servise->id }}">{{ $servise->name }}</option>
                        @endforeach
                            </select>


                            <select name="addServise" class="form-control form-control-lg mt-2">
                                <option  value="6" selected>Что нибуть ещё? (не обязательно)</option>

                        @foreach ( $servises as $servise )

                            @if ( $servise->id == 6)
                                @continue
                            @endif

                                <option value="{{ $servise->id }}">{{ $servise->name }}</option>

                        @endforeach

                            </select>

                        <button type="submit" class="btn btn-primary mt-2">Добавить запись</button>

                    </form>

                    <!--<div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Second default radio
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
                        <label class="form-check-label" for="exampleRadios3">
                            Disabled radio
                        </label>-->
                    </div>
			</div>
		</div>

@endsection