@extends('layouts/main')

@section('title', 'test')


@section('content')



	<section class="banner-area">
		<div class="container pt-5 mt-2">
			<div class="row fullscreen align-items-center justify-content-center text-center">

				<p>Для того чтобы записатся выберите удобную для вас дату</p>
				<div class="col-auto col-md-auto col-lg-auto col-sm-auto text-center">

					<div id="calendar">
						<img src="img/prev.png" alt="Предыдущий месяц" title="Предыдущий месяц" id="prevMonth" onclick="prevMonth()"  style="cursor: pointer;"><span id="monthJS"></span><img src="img/next.png" alt="Следующий месяц" title="Следующий месяц" id="nextMonth" onclick="nextMonth()" style="cursor: pointer;">
						<div id="month"></div>
						<div id="week">Пн</div><div id="week">Вт</div><div id="week">Ср</div><div id="week">Чт</div><div id="week">Пт</div><div id="week">Сб</div><div id="week">Вс</div>
						<span id="days"></span>



					</div>

			</div>






				<div class="col-lg-6 col-md-6 banner-right d-flex align-self-end">

				</div>
			</div>
		</div>
	</section>

@endsection