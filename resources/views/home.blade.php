@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Account Status') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }}  --}}

                    <table class="table">
                        <tbody>
                          <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                          </tr>
                          <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                          </tr>
                          <tr>
                            <th>Money</th>
                            <td>Rp {{ number_format($user->money) }}</td>
                          </tr>
                          {{-- <tr>
                              <th>Add Money</th>
                              <form action="{{ route('add_money', ['id' => Auth::user()->id]) }}" method="post">
                                  @csrf
                                  <td>
                                    <div class="row">
                                        <div class="col-8">
                                            <input type="text" name="money" class="form-control" id="exampleFormControlInput1" placeholder="69.000">
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-success">Add + </button>
                                        </div>
                                    </div>                                                                
                                  </td>
                              </form>
                          </tr> --}}
                        </tbody>
                    </table>


                </div>
            </div>

            <br><br>

            <div class="card">
                <div class="card-header">{{ __('Currency') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }}  --}}

                    <table class="table">
                        <tbody>
                          <tr>
                              <th>Top Up</th>
                              <form action="{{ route('add_money', ['email' => Auth::user()->email]) }}" method="post">
                                  @csrf
                                  <td>
                                    <div class="row">
                                        <div class="col-8">
                                            <input type="text" name="money" class="form-control" id="exampleFormControlInput1" placeholder="69.000">
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-success">Add + </button>
                                        </div>
                                    </div>                                                                
                                  </td>
                              </form>
                          </tr>
                        </tbody>
                    </table>


                </div>
            </div>

            <br><br>

            <div class="card">
                <div class="card-header">{{ __('History') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }}  --}}

                    @php
                        $i = 0;
                    @endphp

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Money</th>
                            <th scope="col">Description</th>
                            <th scope="col">Transaction Created</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $history)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>                                        
                                        @if ($history->status == "tambah")
                                            <span style="color: green">+ Rp {{ number_format($history->money) }}</span>
                                        @elseif ($history->status == "kurang")
                                            <span style="color: red">- Rp {{ number_format($history->money) }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $history->description }}</td>
                                    <td>{{ $history->created_at }}</td>
                                </tr>                                
                            @endforeach
                        </tbody>
                      </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
