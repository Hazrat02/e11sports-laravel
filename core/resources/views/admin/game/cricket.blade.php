@extends('admin.layouts.app')
@section('panel')
    <div class="col-12">
        <div class="">
            <div class="row justify-content-between gap-2">
                <div class="col-md-6 col-12 card">
                    betting
                </div>
                <div class="col-md-5 col-12 card">
                    upcoming
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('admin.game.index') }}" />
@endpush
