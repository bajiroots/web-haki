<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Jenis Permohonan</title>
    <style>
                @page {
            size: A4 landscape;
            margin-bottom: 60px;
            margin: 1.25cm 0cm 1.5cm 0cm;
        }

		.break-word{
			max-width: 200px !important;
			word-wrap: break-word !important;
			white-space: inherit !important;
		}
		
		td{
			vertical-align: middle !important;
			text-align: center !important;
		}
		th{
			vertical-align: middle !important;
			text-align: center !important;
		}

		/*! CSS Used from: http://localhost/laravel/excel/public/assets/css/argon.min-v=1.0.0.css */
		*,::after,::before{box-sizing:border-box;}
		body{font-family:Open Sans,sans-serif;font-size:1rem;font-weight:400;line-height:1.5;margin:0;text-align:left;color:#525f7f;background-color:#f8f9fe;}
		h3{margin-top:0;margin-bottom:.5rem;}
		table{border-collapse:collapse;}
		th{text-align:inherit;}
		h3{font-family:inherit;font-weight:600;line-height:1.5;margin-bottom:.5rem;color:#32325d;}
		h3{font-size:1.0625rem;}
		.row{display:flex;margin-right:-15px;margin-left:-15px;flex-wrap:wrap;}
		.col-10,.col-md-12{position:relative;width:100%;min-height:1px;padding-right:15px;padding-left:15px;}
		.col-10{max-width:83.33333%;flex:0 0 83.33333%;}
		@media (min-width:768px){
		.col-md-12{max-width:100%;flex:0 0 100%;}
		}
		.table{width:100%;margin-bottom:1rem;background-color:transparent;}
		.table td,.table th{padding:1rem;vertical-align:top;border-top:1px solid #e9ecef;}
		.table thead th{vertical-align:bottom;border-bottom:2px solid #e9ecef;}
		.table-dark{background-color:#c1c2c3;}
		.table-dark{color:#f8f9fe;background-color:#172b4d;}
		.table-dark th{border-color:#1f3a68;}
		.table-responsive{display:block;overflow-x:auto;width:100%;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar;}
		.card{position:relative;display:flex;flex-direction:column;min-width:0;word-wrap:break-word;border:1px solid rgba(0,0,0,.05);border-radius:.375rem;background-color:#fff;background-clip:border-box;}
		.card-body{padding:1.5rem;flex:1 1 auto;}
		.card-header{margin-bottom:0;padding:1.25rem 1.5rem;border-bottom:1px solid rgba(0, 0, 0, 0.05);background-color:#fff;}
		.card-header:first-child{border-radius:calc(.375rem - 1px) calc(.375rem - 1px) 0 0;}
		.border-0{border:0!important;}
		.mb-0{margin-bottom:0!important;}
		.text-center{text-align:center!important;}
		@media print{
		*,::after,::before{box-shadow:none!important;text-shadow:none!important;}
		thead{display:table-header-group;}
		tr{page-break-inside:avoid;}
		h3{orphans:3;widows:3;}
		h3{page-break-after:avoid;}
		body{min-width:992px!important;}
		.table{border-collapse:collapse!important;}
		.table td,.table th{background-color:#fff!important;}
		.table-dark{color:inherit;}
		.table-dark th{border-color:#ffffff;}
		}
		.card{margin-bottom:30px;border:0;box-shadow:0 0 2rem 0 rgba(0, 0, 0, 0.15);}
		.table thead th{font-size:.65rem;padding-top:.75rem;padding-bottom:.75rem;letter-spacing:1px;text-transform:uppercase;border-bottom:1px solid #e9ecef;}
		.table th{font-weight:600;}
		.table td,.table th{font-size:.8125rem;white-space:nowrap;}
		.table-flush td,.table-flush th{border-right:0;border-left:0;}
		.table-flush tbody tr:first-child td{border-top:0;}
		.table-flush tbody tr:last-child td{border-bottom:0;}
		.card .table{margin-bottom:0;}
		.card .table td,.card .table th{padding-right:1.5rem;padding-left:1.5rem;}
    </style>    
</head>
<body>
    <table id="myTable" class="table mt-3">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Nama Jenis Permohonan</th>
                <th scope="col">Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->nama_jenis_ciptaan}}</td>
				<td>{{"Rp. ". number_format($ttl_biaya[$i], 0)}}</td>
            </tr>

            @php
                $i++;
            @endphp
            @endforeach
        </tbody>
    </table> 
    
    
</body>
</html>