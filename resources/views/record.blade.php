@extends('layouts.main')

@section('title', 'test')


@section('content')

	@if (isset($error))

		<div class="container">
			<div class="row pt-5 mt-4">
				<div class="col-12 text-center">
					<div class="alert alert-info" role="alert">
						{{$error}}
					</div>
				</div>
			</div>
		</div>

	@endif

	<section class="banner-area">
		<div class="container pt-5 mt-2">
			<div class="row fullscreen align-items-center justify-content-center text-center">

				<p>Для того чтобы записатся выберите удобную для вас дату</p>
				<div class="col-auto col-md-6 col-lg-auto col-sm-auto text-center">

                    <div id="calendar">
                        <img src="{{ asset('img/prev.png')}}" alt="Предыдущий месяц" title="Предыдущий месяц" id="prevMonth" onclick="prevMonth()"  style="cursor: pointer;"><span id="monthJS"></span><img src="{{ asset('img/next.png') }}" alt="Следующий месяц" title="Следующий месяц" id="nextMonth" onclick="nextMonth()" style="cursor: pointer;">
                        <div id="month"></div>
                        <div id="week">Пн</div><div id="week">Вт</div><div id="week">Ср</div><div id="week">Чт</div><div id="week">Пт</div><div id="week">Сб</div><div id="week">Вс</div>
                        <span id="days"></span>



                    </div>
			</div>






				<div class="col-md-6">
                    <h4>Выбранна дата: <p class="text-danger">{{ $date }}</p> </h4>
                    <h3>Выберите подходящее время</h3>
                    <form method="post" action="">
                        @foreach ($day as $time)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="{{$time->id}}">
                                <label class="form-check-label" for="exampleRadios1">
                                    {{$time->time}}
                                </label>
                            </div>
                        @endforeach

                            <select class="form-control form-control-lg">
                                <option selected>Выберите услугу</option>
                        @foreach ($servises as $servise)
                                    <option value="{{ $servise->id }}">{{ $servise->name }}</option>
                        @endforeach
                            </select>


                            <select class="form-control form-control-lg mt-3">
                                <option  selected>Дополнительная услуга</option>
                        @foreach ($servises as $servise)
                                <option value="{{ $servise->id }}">{{ $servise->name }}"></option>
                        @endforeach
                            </select>

                        <button type="submit" class="btn btn-primary mt-3">Добавить запись</button>
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
	</section>

@endsection