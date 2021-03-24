@extends('layouts.master')

@section('page_title', 'Simple Calculator')
@section('page_description', 'A very simple 4 function calculator with memory storage')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Simple Calculator</div>
                    <div class="card-body">

                    <!-- Simple Calculator User Input -->
                        <form action="/simplecalculator" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="input1">Integer 1</label>
                                <input type="text" class="form-control{{ $errors->has('input1') ? ' border-danger' : '' }}" id="input1" name="input1" value="{{ old('input1') }}">
                                <small class='form-text text-danger'>{!! $errors->first('input1') !!}</small>
                            </div>
                            <div class="form-group">
                                <select id="operand" name="operand">
                                    <option value="+" @if (old('operand') === '+') selected="selected" @endif>+</option>
                                    <option value="-" @if (old('operand') === '-') selected="selected" @endif>-</option>
                                    <option value="*" @if (old('operand') === '*') selected="selected" @endif>*</option>
                                    <option value="/" @if (old('operand') === '/') selected="selected" @endif>/</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="input2">Integer 2</label>
                                <input type="text" class="form-control{{ $errors->has('input2') ? ' border-danger' : '' }}" id="input2" name="input2" value="{{ old('input2') }}">
                                <small class='form-text text-danger'>{!! $errors->first('input2') !!}</small>
                            </div>
                            <input class="btn btn-primary mt-4" type="submit" value="Submit">
                        </form>

                        <!-- History of calculations (up to 10) -->
                        @isset($calculations)
                        <div>
                            <ul class="list-group">
                                @foreach($calculations as $calculation)
                                    <li class="list-group-item">
                                        {{ $calculation->Input1 . " " . $calculation->Operand . " " . $calculation->Input2 . " = " . $calculation->Result }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endisset
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
