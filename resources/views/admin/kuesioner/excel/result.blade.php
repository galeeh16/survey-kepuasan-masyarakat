{{-- <table>
    <thead>
        <tr>
            <th colspan="1">Jenis Pelayanan</th>
            <th colspan="9">{{ $nama_layanan }}</th>
        </tr>
        <tr>
            <th colspan="1">Periode</th>
            <th colspan="9">{{ $date_from }} s/d {{ $date_to }}</th>
        </tr>
        <tr>
            <th colspan="10"></th>
        </tr>
        <tr>
            <th align="center" style="vertical-align: middle;" rowspan="2">NO URUT <br/>RESPONDEN</th>
            <th align="center" colspan="9">NILAI PER UNSUR PELAYANAN</th>
        </tr>
        <tr>
            <th align="center" width="50px">U1</th>
            <th align="center" width="50px">U2</th>
            <th align="center" width="50px">U3</th>
            <th align="center" width="50px">U4</th>
            <th align="center" width="50px">U5</th>
            <th align="center" width="50px">U6</th>
            <th align="center" width="50px">U7</th>
            <th align="center" width="50px">U8</th>
            <th align="center" width="50px">U9</th>
        </tr>
    </thead>
    <tbody>
        @php
            $total_u1 = 0;
            $total_u2 = 0;
            $total_u3 = 0;
            $total_u4 = 0;
            $total_u5 = 0;
            $total_u6 = 0;
            $total_u7 = 0;
            $total_u8 = 0;
            $total_u9 = 0;
        @endphp
        @foreach ($respondens as $i => $responden)
            @php
                $total_u1 += $responden[0]->nilai;
                $total_u2 += $responden[1]->nilai;
                $total_u3 += $responden[2]->nilai;
                $total_u4 += $responden[3]->nilai;
                $total_u5 += $responden[4]->nilai;
                $total_u6 += $responden[5]->nilai;
                $total_u7 += $responden[6]->nilai;
                $total_u8 += $responden[7]->nilai;
                $total_u9 += $responden[8]->nilai;
            @endphp
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                @foreach ($responden as $row)
                    <td align="center">{{ $row->nilai }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr style="border: 1px solid #999;">
            <th align="left" style="vertical-align: middle;">Jumlah Nilai <br/> Per Unsur</th>
            <th align="center" style="vertical-align: middle;">{{ $total_u1 }}</th>
            <th align="center" style="vertical-align: middle;">{{ $total_u2 }}</th>
            <th align="center" style="vertical-align: middle;">{{ $total_u3 }}</th>
            <th align="center" style="vertical-align: middle;">{{ $total_u4 }}</th>
            <th align="center" style="vertical-align: middle;">{{ $total_u5 }}</th>
            <th align="center" style="vertical-align: middle;">{{ $total_u6 }}</th>
            <th align="center" style="vertical-align: middle;">{{ $total_u7 }}</th>
            <th align="center" style="vertical-align: middle;">{{ $total_u8 }}</th>
            <th align="center" style="vertical-align: middle;">{{ $total_u9 }}</th>
        </tr>
        <tr>
            <th align="left" style="vertical-align: middle;">
                NRR Per Unsur = <br/> 
                Jml nilai per unsur : <br/>
                Jml Kuesioner yg terisi
            </th>
            <th align="center" style="vertical-align: middle;">{{ round($total_u1 / 150, 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round($total_u2 / 150, 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round($total_u3 / 150, 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round($total_u4 / 150, 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round($total_u5 / 150, 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round($total_u6 / 150, 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round($total_u7 / 150, 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round($total_u8 / 150, 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round($total_u9 / 150, 4) }}</th>
        </tr>
        <tr>
            <th align="left" style="vertical-align: middle;">
                NRR terimbang per<br/> 
                unsur <br/>
                = NRR per unsur x 0.11
            </th>
            <th align="center" style="vertical-align: middle;">{{ round(($total_u1 / 150 * 0.11), 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round(($total_u2 / 150 * 0.11), 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round(($total_u3 / 150 * 0.11), 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round(($total_u4 / 150 * 0.11), 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round(($total_u5 / 150 * 0.11), 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round(($total_u6 / 150 * 0.11), 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round(($total_u7 / 150 * 0.11), 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round(($total_u8 / 150 * 0.11), 4) }}</th>
            <th align="center" style="vertical-align: middle;">{{ round(($total_u9 / 150 * 0.11), 4) }}</th>
        </tr>
        <tr>
            <th align="left" style="vertical-align: middle;">
                Nilai SKM = &#8721; NRR <br/>
                Tertimbang per unsur <br/>
                x 25
            </th>
            <th align="center" colspan="9" style="vertical-align: middle;">
                {{
                    round((
                        ($total_u1 / 150 * 0.11) + 
                        ($total_u2 / 150 * 0.11) + 
                        ($total_u3 / 150 * 0.11) + 
                        ($total_u4 / 150 * 0.11) + 
                        ($total_u5 / 150 * 0.11) + 
                        ($total_u6 / 150 * 0.11) + 
                        ($total_u7 / 150 * 0.11) + 
                        ($total_u8 / 150 * 0.11) + 
                        ($total_u9 / 150 * 0.11) 
                    ) * 25, 4)
                }}
            </th>
        </tr>
    </tfoot>
</table> --}}

<table>
    <tr>
        <td>tes</td>
    </tr>
</table>