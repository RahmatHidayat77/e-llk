@extends('layouts.app')

@section('sub_header')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Analytics Dashboard
                {{-- <div class="page-title-subheading">This is an example dashboard created using
                    build-in elements and components.
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Pegawai</div>
                    <div class="widget-subheading">Total user pegawai</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>{{ $totalPegawai }}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">KasuBag</div>
                    <div class="widget-subheading">Total kepala sub bagian</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>{{ $totalKasubag }}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Sekretaris</div>
                    <div class="widget-subheading">Total Sekretaris</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>{{ $totalSekre }}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-premium-dark">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Products Sold</div>
                    <div class="widget-subheading">Revenue streams</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-warning"><span>$14M</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card-shadow-success mb-3 widget-chart widget-chart2 text-left card">
            <div class="widget-content">
                <div class="widget-content-outer">
                    <div>Sudah diverifikasi oleh atasan :</div>
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left pr-2 fsize-1">
                            <div class="widget-numbers mt-0 fsize-3 text-success">{{$getPercentProgress}}%</div>
                        </div>
                        <div class="widget-content-right w-100">
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-success " role="progressbar"
                                    aria-valuemin="0" aria-valuemax="100" style="width: {{$getPercentProgress}}%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content-left fsize-1">
                        <div class="text-muted opacity-6">Verified Progress : {{$lksCountVerified}} / {{$lksCount}}</div>
                    </div>
                </div>
            </div>
        </div>

        @if (Auth::user()->jabatan == 'kasubag')
        <div class="main-card mb-3 card">
            <div class="card-header">Activity Users
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-center">Submitted At</th>
                            <th class="text-center">Status Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lks as $item)
                            <tr>
                                <td class="text-center text-muted">#{{ $loop->iteration }}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img src="{{ $item->foto }}" class="img-usr" alt="Cinque Terre">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ $item->name }}</div>
                                                <div class="widget-subheading opacity-7">{{ $item->jabatan }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <b>{{ date('d-m-Y', strtotime($item->created_at)) }}</b>
                                </td>
                                <td class="text-center">
                                    @if($item->verified == 0)
                                        <div class="badge badge-warning">Unverified</div>
                                    @else
                                        <div class="badge badge-success">Verified</div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        
    </div>
</div>
@endsection
