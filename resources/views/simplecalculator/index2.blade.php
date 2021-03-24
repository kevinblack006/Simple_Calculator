<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple Calculator</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="css/app.css">
        <script src="js/app.js"></script>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Simple Calculator</div>
                            <div class="card-body">
                                @isset($lastcalc)
                                <p class='flashMessage'>{{ $lastcalc }}</p>
                                @endisset
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
    </body>
</html>
