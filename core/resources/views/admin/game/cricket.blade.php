@extends('admin.layouts.app')
@section('panel')
    <div class="col-12">
        <div class="card">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    betting
                </div>
                <div class="col-lg-6">
                    upcoming
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('admin.game.index') }}" />
@endpush
