
          @extends('layouts.app')

          @section('main')

          @if (isset($products))

          @section('title', 'Продукты')
            {{$products->links()}}
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">продукт</th>
                  <th scope="col">вендор</th>
                  <th scope="col">цена</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($products as $key=>$order)
                <tr>
                  <th>{{$order->id}}</th>
                  <th>{{$order->name}}</th>
                  <th>{{$order->vnd_name}}</th>
                  <th>{{$order->price}}</th>
                </tr>
              @endforeach
              </tbody>
            </table>
        @else
          Здесь нет записей!
          <pre>{{print_r($data,true)}}</pre>
        @endif

          @endsection
