@extends('admin/layout')
@section('title', 'Manage Category')

@section('content')
<h1>Manage Category</h1>
<div class="mt-4">
    <a type="button" class="btn btn-primary" href="category">Back</a>
</div>

<div class="card mt-2">
    <div class="card-header">Credit Card</div>
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center title-2">Pay Invoice</h3>
        </div>
        <hr>
        <form action="" method="post" novalidate="novalidate">
            <div class="form-group">
                <label for="category" class="control-label mb-1">Category</label>
                <input id="category" name="category" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            <div class="form-group">
                <label for="category_slug" class="control-label mb-1">Category Slug</label>
                <input id="category_slug" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            <div class="form-group">
                <label for="cc-number" class="control-label mb-1">Card number</label>
                <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                    autocomplete="cc-number">
                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="cc-exp" class="control-label mb-1">Expiration</label>
                        <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                            data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                            autocomplete="cc-exp">
                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="col-6">
                    <label for="x_card_code" class="control-label mb-1">Security code</label>
                    <div class="input-group">
                        <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                    </div>
                </div>
            </div>
            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">Pay $100.00</span>
                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                </button>
            </div>
        </form>
    </div>
</div>


@endsection()