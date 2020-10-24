<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container m-5">
        <div class="row justify-content-md-center">
            <div class="container m-3">
                <center>
                    <div class="row">
                    <h1>Kwitansi Pembelian Tahu Kuwalik</h1>
                </div>
                </center>
            </div>
            <table>
                <tr>
                    <td>
                        Tanggal Pembelian
                    </td>
                    <td>&nbsp;:&nbsp;</td>
                <td>
                    @php
                    $tanggal=strtotime($pesan->created_at);
                    $date=date("d-m-Y",$tanggal);
                @endphp
                {{$date}}
                </td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>{{$pesan->email}}</td>
                </tr>
                <tr>
                    <td>
                        Nama Pembeli
                    </td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>{{$pesan->nama}}</td>
                </tr>
                <tr>
                    <td>
                        Alamat
                    </td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>{{$pesan->alamat}}</td>
                </tr>
                <tr>
                    <td>
                        Varian
                    </td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>
                        @php
                        $varian=json_decode($pesan->varian);
                    @endphp
                    @if ($varian->varian1!=null)
                        {{$varian->varian1}},
                        
                    @else
                        
                    @endif
                    @if ($varian->varian2!=null)
                        {{$varian->varian2}},
                        
                    @else
                        
                    @endif
                    @if ($varian->varian3!=null)
                        {{$varian->varian3}},
                        
                    @else
                        
                    @endif
                    @if ($varian->varian4!=null)
                        {{$varian->varian4}},
                        
                    @else
                        
                    @endif
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        Jumlah
                    </td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>{{$pesan->jumlah}}</td>
                </tr>
                <tr>
                    <td>
                        Detail Pesanan
                    </td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>{{$pesan->catatan}}</td>
                </tr>
                <tr>
                    <td>
                        Total
                    </td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>Rp{{$pesan->total}}</td>
                </tr>
                <tr>
                    <td>
                        Status Pembayaran
                    </td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>{{$pesan->status}}</td>
                </tr>
            </table>

        </div>
    </div>
    <div class="container">
        <div class="row" style="text-align: right">
                    <span style="text-align: center">TTD</span>
                <br>
                <br>
                <span style="text-align: center">Tahu Kuwalik</span>

        </div>
    </div>
</body>
</html>