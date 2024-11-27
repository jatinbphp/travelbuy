<div class="alert alert-success" id="alert-success" role="alert"></div>

<div class="mb-1">
    {!! Form::open(['id' => 'couponPaymentForm', 'class' => 'form-horizontal', 'files' => true]) !!}
    <input type="hidden" name="paymentData" id="paymentData" class="form-control" value="{{json_encode($Payment_Data)}}">
    <input type="hidden" name="coupon_code" id="coupon_code" class="form-control" value="{{$coupon_code}}">
    <button type="button" class="btn btn-primary apply-coupon-payment" data-url="{{ route('productList.apply-payment') }}">Complete Order</button>
    {!! Form::close() !!}
</div>

<div class="payment-error"></div>

<table class="table table-bordered">
    <tbody>
        <tr>
            <td><strong>Merchant ID :</strong> {{$Merchant_ID}}</td>
            <td><strong>PLU Code :</strong> {{$PLU_Code}}</td>
            <td><strong>Quantity :</strong> {{$Quantity}}</td>
            <td><strong>Voucher Amount :</strong> R {{$Voucher_Amount}}</td>
        </tr>
        <tr>
            <td><strong>Notification Method :</strong> {{$Notification_Method}}</td>
            <td><strong>Email Address / Phone Number :</strong> {{$Email_Address_Or_Phone_Number}}</td>
        </tr>
        <tr>
            <td colspan="4"><strong>Additional Data :</strong></td>
        </tr>
        <tr>
            <td><strong>Molecule :</strong> {{$Molecule}}</td>
            <td><strong>Nappi Code :</strong> {{$Nappi_Code}}</td>
            <td><strong>Dosage :</strong> {{$Dosage}}</td>
            <td><strong>Patient Name :</strong> {{$Patient_Name}}</td>
        </tr>
        <tr>
            <td><strong>Patient Surname :</strong> {{$Patient_Surname}}</td>
            <td><strong>Patient ID :</strong> {{$Patient_ID}}</td>
            <td><strong>Patient Medical Scheme Name :</strong> {{$Patient_Medical_Scheme_Name}}</td>
            <td><strong>Patient Medical Scheme Membership Number :</strong> {{$Patient_Medical_Scheme_Membership_Number}}</td>
        </tr>
        <tr>
            <td><strong>Pharmacy Name (service point) :</strong> {{$Pharmacy_Name}}</td>
            <td><strong>ICD10 (Medical Classification) :</strong> {{$ICD10}}</td>
            <td><strong>CPT4 (Medical Service/Procedures) :</strong> {{$CPT4}}</td>
            <td colspan="1"></td>
        </tr>
        <tr>
            <td colspan="4"><strong>Delivery Address :</strong></td>
        </tr>
        <tr>
            <td><strong>Address 1 :</strong> {{$Address_1}}</td>
            <td><strong>Address 2 :</strong> {{$Address_2}}</td>
            <td><strong>Suburb :</strong> {{$Suburb}}</td>
            <td><strong>City :</strong> {{$City}}</td>
        </tr>
        <tr>
            <td><strong>Region :</strong> {{$Region}}</td>
            <td><strong>Country Code :</strong> {{$Country_Code}}</td>
            <td><strong>Postal Code :</strong> {{$Postal_Code}}</td>
            <td></td>
        </tr>
    </tbody>
</table>