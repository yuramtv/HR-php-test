
          @extends('layouts.app')

          @section('main')

          @if (isset($products))

          @section('title', 'Продукты')
          <div class="col-sm-10">
            {{$products->links()}}
            <table class="table table-hover table-bordered  col-sm-8">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">продукт</th>
                  <th scope="col">вендор</th>
                  <th scope="col">цена<br/>(введите новое значение для изменения)</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($products as $key=>$order)
                <tr>
                  <th>{{$order->id}}</th>
                  <th>{{$order->name}}</th>
                  <th>{{$order->vnd_name}}</th>
                  <th><input class="form-control" id="price_{{$order->id}}" type="text" value="{{$order->price}}" onchange="savePrice(this.id,this.value);" /></th>
                </tr>
              @endforeach
              </tbody>
            </table>
        @else
          Здесь нет записей!
          <pre>{{print_r($data,true)}}</pre>
        @endif
        </div>
          @endsection
