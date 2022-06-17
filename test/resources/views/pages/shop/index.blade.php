@extends('layouts.header')

@section('title')Магазин@endsection

@section('content')

    <!-- Contact -->

    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br><br><br><br>
                @if($producers->isNotEmpty())
                    @foreach($producers as $producer)
                    <p >Производства : {{ $producer->name }} </p>
                        @if($producer->offers->isNotEmpty())
                            <table>
                                <tr>
                                    <td>Выберите производителя</td>
                                    <td>Наименование запчасти</td>
                                    <td>Цена от</td>
                                    <td>Цена до</td>
                                </tr>
                                @foreach($producer->offers as $offer)
                                    <tr>
                                        <td>{{ $offer->producer_name }}</td>
                                        <td>{{ $offer->product_name }}</td>
                                        <td>{{ $offer->price_from }}</td>
                                        <td>{{ $offer->price_to }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                                <br><span> заявок нет</span>
                        @endif
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
