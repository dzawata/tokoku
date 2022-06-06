@extends('layouts.admin')

@section('title', 'Dashboard - Your Best Marketplace')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Dashboard</h2>
      <p class="dashboard-subtitle">
        Store Panel
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-2">
            <div class="card-body">
              <div class="dashboard-card-title">
                Customer
              </div>
              <div class="dashboard-card-subtitle">
                {{ $customer }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-2">
            <div class="card-body">
              <div class="dashboard-card-title">
                Revenue
              </div>
              <div class="dashboard-card-subtitle">
                ${{ $revenue }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-2">
            <div class="card-body">
              <div class="dashboard-card-title">
                Transaction
              </div>
              <div class="dashboard-card-subtitle">
                {{ $transactions }}
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>
@endsection