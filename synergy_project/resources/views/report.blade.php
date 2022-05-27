@extends('layouts.layout')

@section('title')Отчет@endsection

@section('content')

    <h1>Страница отчета</h1>
    <form method="POST" action="{{ route('client.report-post') }}">
        @csrf
        <div class="form-group">
            <textarea id="report" class="form-control @error('report') is-invalid @enderror" style="width: 100%; height: 350px;" name="report"></textarea>

            @error('report')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning mt-3">
            Отправить отчет
        </button><br>
    </form>

@endsection
