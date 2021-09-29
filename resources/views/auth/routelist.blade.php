@extends('layouts.app')

@section('content')

<div class="container">    
    <div class="row justify-content-center">
        <h2>Route List for API</h2>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Method</th>
                            <th scope="col">Route</th>
                            <th scope="col">Required Forms</th>
                            <th scope="col">Description</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">GET</th>
                            <td style="font-family: consolas">/api/getallusers</td>
                            <td>Null</td>
                            <td>Get all users info</td>
                          </tr>
                          <tr>
                            <th scope="row">GET</th>
                            <td style="font-family: consolas">/api/getuserbyemail/{email}</td>
                            <td>Null</td>
                            <td>Get user info by email</td>
                          </tr>
                          <tr>
                            <th scope="row">GET</th>
                            <td style="font-family: consolas">/api/getallhistory</td>
                            <td>Null</td>
                            <td>Get all users history payment</td>
                          </tr>
                          <tr>
                            <th scope="row">GET</th>
                            <td style="font-family: consolas">/api/gethistorybyemail/{email}</td>
                            <td>Null</td>
                            <td>Get user history payment by email</td>
                          </tr>
                          <tr>
                            <th scope="row">PUT</th>
                            <td style="font-family: consolas">/api/transaction/{email}</td>
                            <td style="font-family: consolas">
                                <ul>
                                    <li><span style="color: red">money</span> = amount of money</li>
                                    <li><span style="color: red">status</span> = tambah or kurang (tambah = add, kurang = subsctract)</li>
                                    <li><span style="color: red">description</span> = transaction process description</li>
                                </ul>
                            </td>
                            <td>Do transaction (ex: add or substract the money)</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
