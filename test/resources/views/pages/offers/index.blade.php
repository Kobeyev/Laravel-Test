@extends('layouts.header')

@section('title')Запросы@endsection

@section('content')

<!-- Contact -->

<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 contact_col">
                <div class="get_in_touch">
                    <div class="section_title">Связаться</div>
                    <div class="contact_form_container">
                        <form method="post" action="{{ route('offers.store') }}" class="general-form" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                            </div>
                            <div>
                                <label for="producer_name">Наименование производителя</label>
                                <select name="producer_name" class="contact_input">
                                    <option value="0">Выберите производителя</option>
                                    @foreach($producers as $producer)
                                        <option value="{{ $producer->name }}">{{ $producer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="product_name">Наименование запчасти</label>
                                <select name="product_name" class="contact_input">
                                    <option value="0">Выберите запчасти</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->name }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="price">Цена от - </label>
                                <input type="number"  name="price_from" class="contact_input">
                            </div>
                            <div>
                                <label for="price">Цена до - </label>
                                <input type="number" name="price_to"  class="contact_input">
                            </div>
                            <button type="submit" class="button contact_button"><span>Отправить заявку</span></button>
                        </form>
                </div>
            </div>
            @if($offers->isNotEmpty())
            <div class="col-lg-12">
                <p>Мои заявки</p>
                <table>
                    <tr>
                        <td>Выберите производителя</td>
                        <td>Наименование запчасти</td>
                        <td>Цена от</td>
                        <td>Цена до</td>
                    </tr>
                        @foreach($offers as $offer)
                        <tr>
                            <td>{{ $offer->producer_name }}</td>
                            <td>{{ $offer->product_name }}</td>
                            <td>{{ $offer->price_from }}</td>
                            <td>{{ $offer->price_to }}</td>
                        </tr>
                        @endforeach
                </table>
            </div>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
