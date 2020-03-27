@extends('layouts.app')
@section('content')
    <div class="container-fluid app-body">
        <h3>History  </h3>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-bordered social-accounts">
                    <thead>
                    <tr>
                        <th>Group Name</th>
                        <th>Group Type</th>
                        <th>Account Name</th>
                        <th>Post Text</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($buffer_postings as $buffer_posting)
                        @if ( $buffer_posting['type'] != 'google' )
                            <tr>
								<td>{{ $buffer_posting->groupInfo->name }}</td>
								<td>{{ $buffer_posting->groupInfo->type }}</td>
                                <td width="350">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="">
                                                <span class="fa fa-{{$buffer_posting->accountInfo['type']}}"></span>
                                                <img width="50" class="media-object img-circle"
                                                     src="{{$buffer_posting->accountInfo['avatar']}}" alt="">
                                            </a>
                                        </div>
                                        <div class="media-body media-middle" style="width: 180px;">
                                            <h4 class="media-heading">{{$buffer_posting->accountInfo['name']}}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>{!! $buffer_posting->post_text !!}</td>
                                <td>{!! \Carbon\Carbon::parse($buffer_posting->created_at)->format('d M, Y H:i:a') !!}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
