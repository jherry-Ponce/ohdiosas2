<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Boleta</title>

		<!-- Favicon -->
		<link rel="icon" href="./images/favicon.png" type="image/x-icon" />

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(4) {
				text-align: right; 
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: rgb(211, 3, 3);
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: rgb(59, 130, 246);
				border-bottom: 1px solid #ddd;
				font-weight: bold;
				color: white;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

	<body>
	
		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title">
									<img src="./images/logo.png" alt="Company logo" style="width: 100%; max-width: 300px" />
								</td>
								
								
								<td>
									Invoice #:000{{$venta->id}}<br />
									Fecha: {{$venta->created_at->format('d/m/Y')}}<br />
									{{-- Due: February 1, 2015 --}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="4">
						<table>
							<tr>
								<td>
									Oh Diosas Swimwear<br />
									12345 Trujillo<br />
									Cel:99999999
								</td>
								<td>
									
								</td>

								<td>
									
								</td>
								
								<td>
								{{-- 	Acme Corp.<br /> --}}
									Cliente:<br>
									{{$cliente->name}}<br />
									{{$cliente->email}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				

				

				<tr class="heading">
					<td>Producto</td>
					 <td>Precio</td> 
					 <td>Cantidad</td> 
					<td>Subtotal</td>
				</tr>

					@foreach ($items as $item)
					<tr class="item">
						<td>{{ $item->name}}</td>
						<td>S/.{{ $item->price}}</td>
						 <td>{{ $item->qty}}</td> 
						<td>S/.{{ $item->subtotal}}</td>
					</tr>			
					@endforeach
				<tr class="total">
					<td></td>
					<td></td><td></td>
					<td>Total: S/.{{$DetVentas->total}}</td>
				</tr>
			</table>
		</div>
	</body>
</html>