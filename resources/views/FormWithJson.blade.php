<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>



    </style>

</head>

<body>

<form action="" name="JsonForm" id="JsonForm">
    {{ csrf_field() }}

    Product name : <input type="text" name="ProductName">
    Quantity in stock : <input type="text" name="Quantity">
    Price per item : <input type="text" name="PricePerItem">

    <button type="button" class="FormSubmit">Submit</button>

</form>

<table class="table" id="tblData">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Product name</th>
        <th scope="col">Quantity in stock</th>
        <th scope="col">Price per item</th>
        <th scope="col">Date Time Created</th>
        <th scope="col">Total value number</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody class="TblBody">
    @foreach($AllTheData as $result)
    <tr>
        <form action="" name="UpdateForm" class="UpdateForm">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$result->id}}" class="id UpdateInputs">
        <td><input type="text" name="ProductNameWithVal" value="{{$result->product_name}}" class="ProductNameWithVal UpdateInputs" disabled></td>
                <td><input type="text" name="QuantityWithVal" value="{{$result->quantity_in_stock}}" class="QuantityWithVal UpdateInputs" disabled></td>
                <td><input type="text" name="PricePerItemWithVal" value="{{$result->price_per_item}}" class="PricePerItemWithVal UpdateInputs" disabled></td>
                <td>{{$result->created_at}}</td>
                <td>{{$result->total_value_number}}</td>
                <td><button type="button" class="EditBtn">Edit</button></td>
                <td><button type="button" class="SaveBtn">Save</button></td>
                <td><button type="button" class="DeleteBtn">Delete</button></td>
        </form>
    </tr>
        @endforeach
    </tbody>
</table>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $(".FormSubmit").click(function(){

            var FormSerialized = $("#JsonForm").serialize();

            $.ajax({
                url: "{{route('GetFormData')}}",
                data: FormSerialized,
                method: 'POST',

                success: function (data) {
                    //console.log(data);
                }
            });
        });

        $(".SaveBtn").hide();
        $(".EditBtn").click(function(){
            $(this).closest("tr").find(".UpdateInputs").prop('disabled',false);
            $(this).closest("tr").find(".EditBtn").hide();
            $(this).closest("tr").find(".SaveBtn").show();
        });

        $(".SaveBtn").click(function(){

            var ThisSaveBtn = $(this).closest("tr");

            var UpdateFormSerialized = $(this).closest("tr").find(".UpdateForm").serialize();

            $.ajax({
                url: "{{route('UpdateData')}}",
                data: UpdateFormSerialized,
                method: 'POST',

                success: function (data) {
                    ThisSaveBtn.find(".UpdateInputs").prop('disabled',true);
                    ThisSaveBtn.find(".EditBtn").show();
                    ThisSaveBtn.find(".SaveBtn").hide();
                }
            });
        });

        $(".DeleteBtn").click(function(){

            var ThisSaveBtn = $(this).closest("tr");

            $.ajax({
                url: "{{route('DeleteData')}}",
                data: {
                    id: $(this).closest("tr").find(".id").val(),
                    _token: '{{csrf_token()}}'
                },
                method: 'POST',

                success: function (data) {
                    ThisSaveBtn.remove();
                }
            });
        });


    });
</script>

</body>
</html>