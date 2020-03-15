
          @extends('layouts.app')

          @section('main')

          @if (isset($orders))

          @section('title', 'Заказы')

          <ul class="nav nav-tabs col-sm-10">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#past_due">Просроченные</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#current">Текущие</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-toggle="tab" href="#new">Новые</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-toggle="tab" href="#completed">Выполненные</a>
            </li>
          </ul>

          <!-- Блоки с контентом -->
          <div class="tab-content  col-sm-10">
            <!-- Просроченные -->
            <div class="tab-pane fade in active" id="past_due">

                        <table class="table table-hover table-bordered col-sm-8">
                          <thead>
                            <tr>
                              <th scope="col">id</th>
                              <th scope="col">partner</th>
                              <th scope="col">summ</th>
                              <th scope="col">наименование_состав_заказа</th>
                              <th scope="col">дата доставки</th>
                              <th scope="col">статус</th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach ($past_due as $key=>$order)
                            <tr>
                              <th scope="col">{{$key}}</th>
                              <th scope="col">{{$order['partner_name']}}</th>
                              <th scope="col">{{$order['summ']}}</th>
                              <th scope="col" align="left">
                              <ol>
                              @foreach ($order['composition'] as $item)
                                <li>{{$item->prod_name}} ({{$item->vnd_name}}) :: {{$item->quantity}} x {{$item->price}} = {{$item->quantity*$item->price}}</li>
                              @endforeach
                              </ol>
                              </th>
                              <th>{{$order['delivery_dt']}}</th>
                              <th>{{$order['status']}}</th>
                              <td><a href='/order/show?order_id={{$key}}' target="_blank" >Edit</a></td>
                            </tr>
                          @endforeach
                          </tbody>
                        </table>

            </div>
            <!-- Текущие -->
            <div class="tab-pane fade in" id="current">

                                    <table class="table table-hover table-bordered col-sm-8">
                                      <thead>
                                        <tr>
                                          <th scope="col">id</th>
                                          <th scope="col">partner</th>
                                          <th scope="col">summ</th>
                                          <th scope="col">наименование_состав_заказа</th>
                                          <th scope="col">дата доставки</th>
                                          <th scope="col">статус</th>
                                          <th scope="col"></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      @foreach ($current as $key=>$order)
                                        <tr>
                                          <th scope="col">{{$key}}</th>
                                          <th scope="col">{{$order['partner_name']}}</th>
                                          <th scope="col">{{$order['summ']}}</th>
                                          <th scope="col" align="left">
                                          <ol>
                                          @foreach ($order['composition'] as $item)
                                            <li>{{$item->prod_name}} ({{$item->vnd_name}}) :: {{$item->quantity}} x {{$item->price}} = {{$item->quantity*$item->price}}</li>
                                          @endforeach
                                          </ol>
                                          </th>
                                          <th>{{$order['delivery_dt']}}</th>
                                          <th>{{$order['status']}}</th>
                                          <td><a href='/order/show?order_id={{$key}}' target="_blank" >Edit</a></td>
                                        </tr>
                                      @endforeach
                                      </tbody>
                                    </table>

            </div>
            <!-- Новые -->
            <div class="tab-pane fade in" id="new">
                                                <table class="table table-hover table-bordered col-sm-8">
                                                  <thead>
                                                    <tr>
                                                      <th scope="col">id</th>
                                                      <th scope="col">partner</th>
                                                      <th scope="col">summ</th>
                                                      <th scope="col">наименование_состав_заказа</th>
                                                      <th scope="col">дата доставки</th>
                                                      <th scope="col">статус</th>
                                                      <th scope="col"></th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                  @foreach ($new as $key=>$order)
                                                    <tr>
                                                      <th scope="col">{{$key}}</th>
                                                      <th scope="col">{{$order['partner_name']}}</th>
                                                      <th scope="col">{{$order['summ']}}</th>
                                                      <th scope="col" align="left">
                                                      <ol>
                                                      @foreach ($order['composition'] as $item)
                                                        <li>{{$item->prod_name}} ({{$item->vnd_name}}) :: {{$item->quantity}} x {{$item->price}} = {{$item->quantity*$item->price}}</li>
                                                      @endforeach
                                                      </ol>
                                                      </th>
                                                      <th>{{$order['delivery_dt']}}</th>
                                                      <th>{{$order['status']}}</th>
                                                      <td><a href='/order/show?order_id={{$key}}' target="_blank" >Edit</a></td>
                                                    </tr>
                                                  @endforeach
                                                  </tbody>
                                                </table>
            </div>
            <!-- Выполненные -->
            <div class="tab-pane fade in" id="completed">

                                                            <table class="table table-hover table-bordered col-sm-8">
                                                              <thead>
                                                                <tr>
                                                                  <th scope="col">id</th>
                                                                  <th scope="col">partner</th>
                                                                  <th scope="col">summ</th>
                                                                  <th scope="col">наименование_состав_заказа</th>
                                                                  <th scope="col">дата доставки</th>
                                                                  <th scope="col">статус</th>
                                                                  <th scope="col"></th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                              @foreach ($completed as $key=>$order)
                                                                <tr>
                                                                  <th scope="col">{{$key}}</th>
                                                                  <th scope="col">{{$order['partner_name']}}</th>
                                                                  <th scope="col">{{$order['summ']}}</th>
                                                                  <th scope="col" align="left">
                                                                  <ol>
                                                                  @foreach ($order['composition'] as $item)
                                                                    <li>{{$item->prod_name}} ({{$item->vnd_name}}) :: {{$item->quantity}} x {{$item->price}} = {{$item->quantity*$item->price}}</li>
                                                                  @endforeach
                                                                  </ol>
                                                                  </th>
                                                                  <th>{{$order['delivery_dt']}}</th>
                                                                  <th>{{$order['status']}}</th>
                                                                  <td><a href='/order/show?order_id={{$key}}' target="_blank" >Edit</a></td>
                                                                </tr>
                                                              @endforeach
                                                              </tbody>
                                                            </table>


            </div>
          </div>

        @elseif (isset($order))

        @section('title', 'Редактирование заказа')

        <h1>Редактируем заказ № {{key($order)}}</h1>

        {{ Form::open(array('url' => 'order/show?order_id='.key($order), 'class' => ''))}}

        <div class="col-sm-6 panel" >

        <div class="form-group">
        {{Form::label('email', 'E-mail', $attributes = array('class' => 'col-sm-2 col-form-label') )}}
        {{Form::email('email', $order[key($order)]['email'], $attributes = array('class' => 'form-control','required' => 'required' ) )}}
        </div>

        <div class="form-group">
        {{Form::label('partner', 'Партнёр', $attributes = array('class' => 'col-sm-2 col-form-label') )}}
        {{Form::select('partner', $partners, $order[key($order)]['partner_id'], $attributes = array('class' => 'form-control' ) )}}
        </div>

        <h4>Состав заказа</h4>

         <table class="table" >
                       <thead>
                         <tr>
                           <th scope="col"></th>
                           <th scope="col">продукт (вендор)</th>
                           <th scope="col">количество х цена</th>
                           <th scope="col">сумма</th>
                         </tr>
                       </thead>
         <tbody>
         @foreach ($order[key($order)]['composition'] as $item)
            <tr align="left" >
            <td>{{$loop->iteration}}</td>
            <td  >{{$item->prod_name}} ({{$item->vnd_name}})</td>
            <td> {{$item->quantity}} x {{$item->price}}</td>
            <td>{{$item->quantity*$item->price}}</td>
            </tr>
         @endforeach
         <tr align="left" >
         <td></td>
         <td></td>
         <td>Общая стоимость заказа:</td>
         <td>{{$order[key($order)]['summ']}}</td>
         </tr>
         </tbody>
         </table>

         <div class="form-group">
         {{Form::label('status', 'Статус', $attributes = array('class' => 'col-sm-2 col-form-label') )}}
         {{Form::select('status', array('0' => 'новый', '10' => 'подтвержден','20' => 'завершен'), $order[key($order)]['status'], $attributes = array('class' => 'form-control' ) )}}
         </div>

         <div class="form-group">
         {{  Form::submit('Сохранить', $attributes = array('class' => 'btn btn-primary col-sm-2'))}}
         </div>

         </div>

         {{  Form::close() }}
        @elseif (isset($data))

        @section('title', 'Тестирование')

        <pre style="text-align: left;" >{{$data}}</pre>
        @else
          Здесь нет записей!
        @endif
          @endsection
