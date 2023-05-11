{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
            
</head>
<body>
    <div class="container" style="margin-top: 30px;">
        <a href="" class="btn btn-outline-success">Cart<i class="bi bi-cart"></i></a>
        <a href="/" class="btn btn-outline-warning">Back</a>
        </div>

    <div class="container mt-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Product</th>
            <th scope="col"></th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Mark</td>
            <td>Seblak</td>
            <td>Rp 5.000</td>
            <td>
                <input type="number" min="1" max="5">
            </td>
            <td>Rp 10.000</td>
            <td>
                <a href="" class="btn btn-danger mb-3 mt-4">Delete</a>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="cointainer" style="margin-left: 900px">
        <h5><b>Total Rp. 10.000</b></h5>
        <a href="" class="btn btn-danger"><i class="bi bi-arrow-left-short"></i>Continue Shopping</a>
        <a href="" class="btn btn-success"><i class="bi bi-cash"></i>Checkout</a>
      </div>
    </div>
</body>
</html> --}}

@extends('layouts')

@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <form action="{{ route('checkout') }}" method="post">
        @csrf
        <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            @php $total += $details['price'] * $details['quantity'] @endphp
            <tr data-id="{{ $id }}">
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100"
                                class="img-responsive" /></div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                            <input type="text" name="id_product[]" value="{{$id}}">
                        </div>
                    </div>
                </td>
                <td data-th="Price">${{ $details['price'] }}</td>
                <td data-th="Quantity">
                    <input type="number" value="{{ $details['quantity'] }}" name="total_pesanan[]"
                        class="form-control quantity cart_update" min="1" />
                </td>
                <td data-th="Subtotal" class="text-center">
                    <input type="hidden" name="totalPrice[]" value="{{ $details['price'] * $details['quantity'] }}">
                    ${{ $details['price'] * $details['quantity'] }}
                </td>
                <td class="actions" data-th="">
                    <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <h3><strong>Total ${{ $total }}</strong></h3>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ route('checkout') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue
                        Shopping</a>

                    <button class="btn btn-success"><i class="fa fa-money"></i> Checkout</button>


                </td>
            </tr>
        </tfoot>
    </form>
</table>
@endsection

@section('scripts')
<script type="text/javascript">
    $(".cart_update").change(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });

    $(".cart_remove").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection
